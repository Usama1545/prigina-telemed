<?php

namespace App\Services;

use Carbon\Carbon;
use Google\Cloud\Firestore\Timestamp;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ReportService
{
    protected int $maxFetch = 3000;

    public function __construct(protected FirestoreService $firestore) {}

    // ─── Public API ───────────────────────────────────────────────────────────

    public function overviewStats(): array
    {
        return Cache::remember('admin:report:overview', 300, function () {
            $all  = $this->allAppointments();
            $paid = $this->paid($all);

            $totalRevenue = $this->sumAmount($paid);
            $avgValue     = $paid->count() > 0 ? round($totalRevenue / $paid->count(), 2) : 0.0;

            return [
                'totalRevenue'      => $totalRevenue,
                'totalAppointments' => $all->count(),
                'completed'         => $this->countByStatus($all, ['completed', 'completedPaid']),
                'pending'           => $this->countByStatus($all, ['pending']),
                'cancelled'         => $this->countByStatus($all, ['cancelled']),
                'avgValue'          => $avgValue,
                'revenueByMonth'    => $this->revenueByMonth(6, $paid),
                'appointmentsByDay' => $this->appointmentsByDay(7, $all),
            ];
        });
    }

    public function transactions(int $limit = 50): array
    {
        return Cache::remember("admin:report:transactions:{$limit}", 300, function () use ($limit) {
            $all  = $this->allAppointments();
            $paid = $this->paid($all)
                ->sortByDesc(fn ($a) => $a['paymentCompletedAt'] ?? $a['createdAt'] ?? '')
                ->take($limit)
                ->values();

            $commissionRate  = 0.15;
            $totalRevenue    = $this->sumAmount($paid);
            $totalCommission = round($totalRevenue * $commissionRate, 2);

            $docs = $paid->map(function ($a) use ($commissionRate) {
                $amount     = (float) ($a['amount'] ?? 0);
                $commission = round($amount * $commissionRate, 2);
                return array_merge($a, [
                    'platformCommission' => $commission,
                    'doctorAmount'       => round($amount - $commission, 2),
                ]);
            })->all();

            $pendingPayouts = $this->paid($all)
                ->filter(fn ($a) => ! in_array($a['payoutStatus'] ?? 'pending', ['completed', 'released']))
                ->count();

            return [
                'documents'       => $docs,
                'totalRevenue'    => $totalRevenue,
                'totalCommission' => $totalCommission,
                'totalDoctor'     => round($totalRevenue - $totalCommission, 2),
                'pendingPayouts'  => $pendingPayouts,
                'avgTxn'          => $paid->count() > 0
                    ? round($totalRevenue / $paid->count(), 2)
                    : 0.0,
            ];
        });
    }

    public function revenueStats(int $months = 12): array
    {
        return Cache::remember("admin:report:revenue:{$months}", 300, function () use ($months) {
            $all  = $this->allAppointments();
            $paid = $this->paid($all);

            $totalRevenue = $this->sumAmount($paid);

            return [
                'totalRevenue'   => $totalRevenue,
                'avgRevenue'     => $paid->count() > 0
                    ? round($totalRevenue / $paid->count(), 2)
                    : 0.0,
                'completedCount' => $paid->count(),
                'monthly'        => $this->revenueByMonth($months, $paid),
            ];
        });
    }

    public function appointmentStats(): array
    {
        return Cache::remember('admin:report:appointments', 300, function () {
            $all   = $this->allAppointments();
            $total = $all->count();
            $paid  = $this->paid($all);

            $counts = [
                'completed' => $this->countByStatus($all, ['completed', 'completedPaid']),
                'confirmed' => $this->countByStatus($all, ['confirmed']),
                'pending'   => $this->countByStatus($all, ['pending']),
                'cancelled' => $this->countByStatus($all, ['cancelled']),
            ];

            $revenue  = $this->sumAmount($paid);
            $pct      = fn (int $n) => $total > 0 ? round($n / $total * 100, 1) : 0.0;

            return array_merge($counts, [
                'total'             => $total,
                'completedPct'      => $pct($counts['completed']),
                'confirmedPct'      => $pct($counts['confirmed']),
                'pendingPct'        => $pct($counts['pending']),
                'cancelledPct'      => $pct($counts['cancelled']),
                'revenue'           => $revenue,
                'avgValue'          => $paid->count() > 0
                    ? round($revenue / $paid->count(), 2)
                    : 0.0,
                'appointmentsByDay' => $this->appointmentsByDay(30, $all),
            ]);
        });
    }

    public static function clearCaches(): void
    {
        Cache::forget('admin:report:overview');
        Cache::forget('admin:report:appointments');
        foreach ([50, 100] as $l) {
            Cache::forget("admin:report:transactions:{$l}");
        }
        foreach ([6, 12] as $m) {
            Cache::forget("admin:report:revenue:{$m}");
        }
    }

    // ─── Calculation helpers ──────────────────────────────────────────────────

    protected function paid(Collection $all): Collection
    {
        return $all->filter(fn ($a) => ($a['paymentStatus'] ?? '') === 'completed')->values();
    }

    protected function countByStatus(Collection $all, array $statuses): int
    {
        return $all->filter(fn ($a) => in_array($a['status'] ?? '', $statuses))->count();
    }

    protected function sumAmount(Collection $docs): float
    {
        return round($docs->sum(fn ($a) => (float) ($a['amount'] ?? 0)), 2);
    }

    protected function revenueByMonth(int $months, Collection $paid): array
    {
        $map = collect(range($months - 1, 0))->mapWithKeys(function (int $offset) {
            $d = Carbon::now()->subMonthsNoOverflow($offset);
            return [$d->format('Y-m') => ['label' => $d->format('M Y'), 'revenue' => 0.0]];
        });

        foreach ($paid as $a) {
            $raw = $a['paymentCompletedAt'] ?? $a['createdAt'] ?? $a['date'] ?? null;
            if (! $raw) continue;
            try {
                $key = Carbon::parse($raw)->format('Y-m');
            } catch (\Throwable) {
                continue;
            }
            if ($map->has($key)) {
                $row             = $map->get($key);
                $row['revenue'] += (float) ($a['amount'] ?? 0);
                $map->put($key, $row);
            }
        }

        return $map->values()->all();
    }

    protected function appointmentsByDay(int $days, Collection $all): array
    {
        $map = collect(range($days - 1, 0))->mapWithKeys(function (int $offset) {
            $d = Carbon::today()->subDays($offset);
            return [$d->toDateString() => ['label' => $d->format('d M'), 'count' => 0]];
        });

        foreach ($all as $a) {
            $raw = $a['date'] ?? $a['appointmentDate'] ?? $a['createdAt'] ?? null;
            if (! $raw) continue;
            try {
                $key = Carbon::parse($raw)->toDateString();
            } catch (\Throwable) {
                continue;
            }
            if ($map->has($key)) {
                $row = $map->get($key);
                $row['count']++;
                $map->put($key, $row);
            }
        }

        return $map->values()->all();
    }

    // ─── Data fetching ────────────────────────────────────────────────────────

    protected function allAppointments(): Collection
    {
        // Static per-request cache: all four public methods call this but
        // Firestore is only queried once per request.
        static $cache = null;
        if ($cache !== null) {
            return $cache;
        }

        $chunkSize = 500;
        $all       = collect();
        $cursor    = null;
        $fetched   = 0;

        while ($fetched < $this->maxFetch) {
            $result   = $this->firestore->getCursorPage(
                'appointments', $chunkSize, $cursor, 'createdAt', 'DESC'
            );
            $chunk    = collect($result['documents'])->map(fn ($doc) => $this->normalizeDoc($doc));
            $all      = $all->merge($chunk);
            $fetched += count($result['documents']);

            if (! $result['hasMore']) {
                break;
            }
            $cursor = $result['nextCursor'];
        }

        return $cache = $all;
    }

    protected function normalizeDoc(array $doc): array
    {
        foreach ($doc as $key => $value) {
            if ($value instanceof Timestamp) {
                $doc[$key] = $value->get()->format('Y-m-d H:i:s');
            }
        }
        return $doc;
    }
}
