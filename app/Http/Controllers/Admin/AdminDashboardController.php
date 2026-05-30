<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ReviewRequest;
use App\Models\Firestore\Appointment;
use App\Models\Firestore\Doctor;
use App\Models\Firestore\Patient;
use App\Services\FirestoreService;
use Carbon\Carbon;
use Google\Cloud\Firestore\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Kreait\Firebase\Contract\Storage;

class AdminDashboardController extends Controller
{
    protected $firestore;

    protected $doctorModel;

    protected $patientModel;

    protected $appointmentModel;

    public function __construct(
        FirestoreService $firestore,
        Doctor $doctor,
        Patient $patient,
        Appointment $appointment
    ) {
        $this->firestore = $firestore;
        $this->doctorModel = $doctor;
        $this->patientModel = $patient;
        $this->appointmentModel = $appointment;
    }

    public function index()
    {
        $stats = $this->getStats();
        $doctors = $this->listDocuments('doctors', 5);
        $patients = $this->listDocuments('patients', 5);
        $appointments = $this->listDocuments('appointments', 5);
        $chartData = $this->dashboardChartData();

        return view('admin.index', compact('stats', 'doctors', 'patients', 'appointments', 'chartData'));
    }

    public function doctors(Request $request)
    {
        $filters = [];

        if ($request->query('status') === 'active') {
            $filters[] = ['field' => 'isActive', 'op' => '=', 'value' => true];
        } elseif ($request->query('status') === 'inactive') {
            $filters[] = ['field' => 'isActive', 'op' => '=', 'value' => false];
        }

        $doctors = $this->listDocuments('doctors', 50, $filters);

        return view('admin.doctor-list', compact('doctors'));
    }

    public function patients()
    {
        $patients = $this->listDocuments('patients', 50);

        return view('admin.patient-list', compact('patients'));
    }

    public function appointments()
    {
        $result = $this->appointmentsPage();

        return view('admin.appointment-list', [
            'appointments' => $result['documents'],
            'nextCursor' => $result['nextCursor'],
            'hasMore' => $result['hasMore'],
            'stats' => $this->appointmentStats(),
        ]);
    }

    public function appointmentData(Request $request)
    {
        return response()->json(
            $this->appointmentsPage(
                $request->query('date', ''),
                $request->query('cursor'),
                $request->query('status', ''),
                $request->query('payment', '')
            )
        );
    }

    public function appointmentsPage(
        string $date = '',
        ?string $cursorDocId = null,
        string $status = '',
        string $payment = ''
    ): array {
        $filters = [];

        if ($date) {

            $start = Carbon::parse($date)
                ->startOfDay();

            $end = Carbon::parse($date)
                ->addDay()
                ->startOfDay();

            $filters[] = [
                'field' => 'date',
                'op' => '>=',
                'value' => $start,
            ];

            $filters[] = [
                'field' => 'date',
                'op' => '<',
                'value' => $end,
            ];
        }
        if ($status) {
            $filters[] = ['field' => 'status',        'op' => '=', 'value' => $status];
        }
        if ($payment) {
            $filters[] = ['field' => 'paymentStatus', 'op' => '=', 'value' => $payment];
        }

        return $this->firestore->paginatedQuery(
            collection: 'appointments',
            filters: $filters,
            limit: 10,
            cursorDocId: $cursorDocId,
            orderByField: 'date',
            orderByDirection: 'DESC'
        );
    }

    protected function appointmentStats(): array
    {
        return Cache::remember('admin:appointment-stats', 300, function () {
            // Count both 'completed' and 'completedPaid' as completed
            $completed = $this->firestore->count('appointments', [['field' => 'status', 'op' => '=', 'value' => 'completed']])
                       + $this->firestore->count('appointments', [['field' => 'status', 'op' => '=', 'value' => 'completedPaid']]);

            return [
                'total' => $this->firestore->count('appointments'),
                'completed' => $completed,
                'pending' => $this->firestore->count('appointments', [['field' => 'status',        'op' => '=', 'value' => 'pending']]),
                'confirmed' => $this->firestore->count('appointments', [['field' => 'status',        'op' => '=', 'value' => 'confirmed']]),
                'paid' => $this->firestore->count('appointments', [['field' => 'paymentStatus', 'op' => '=', 'value' => 'completed']]),
            ];
        });
    }

    public function settings()
    {
        $settings = $this->firestore->find('app_settings', 'payment') ?? [];

        return view('admin.settings', compact('settings'));
    }

    public function specialities()
    {
        $result = $this->specialitiesPage();
        $specialities = $result['documents'];
        $nextCursor = $result['nextCursor'];
        $hasMore = $result['hasMore'];

        return view('admin.specialities', compact('specialities', 'nextCursor', 'hasMore'));
    }

    public function specialityData(Request $request)
    {
        return response()->json(
            $this->specialitiesPage(
                $request->query('search', ''),
                $request->query('cursor')
            )
        );
    }

    public function reviews()
    {
        $reviews = $this->listDocuments('reviews', 100);

        return view('admin.reviews', compact('reviews'));
    }

    /**
     * Get dashboard statistics
     */
    public function getStats()
    {
        return Cache::remember('admin:stats', 300, function () {
            $totalDoctors = $this->firestore->count('doctors');
            $activeDoctors = $this->firestore->count('doctors', [
                ['field' => 'isActive', 'op' => '=', 'value' => true],
            ]);
            $verifiedDoctors = $this->firestore->count('doctors', [
                ['field' => 'isVerified', 'op' => '=', 'value' => true],
            ]);
            $pendingDoctors = $this->firestore->count('doctors', [
                ['field' => 'isVerified', 'op' => '=', 'value' => false],
            ]);

            $totalPatients = $this->firestore->count('patients');
            $verifiedPatients = $this->firestore->count('patients', [
                ['field' => 'isVerified', 'op' => '=', 'value' => true],
            ]);

            $totalAppointments = $this->firestore->count('appointments');
            $completedAppointments = $this->firestore->count('appointments', [
                ['field' => 'status', 'op' => '=', 'value' => 'completed'],
            ]);
            $pendingAppointments = $this->firestore->count('appointments', [
                ['field' => 'status', 'op' => '=', 'value' => 'pending'],
            ]);
            $recentAppointments = $this->firestore->query('appointments', [], 500, null, null)['documents'] ?? [];
            $totalRevenue = collect($recentAppointments)->sum(fn ($appointment) => (float) ($appointment['amount'] ?? 0));

            return [
                'doctors' => [
                    'total' => $totalDoctors,
                    'active' => $activeDoctors,
                    'verified' => $verifiedDoctors,
                    'pending' => $pendingDoctors,
                ],
                'patients' => [
                    'total' => $totalPatients,
                    'verified' => $verifiedPatients,
                ],
                'appointments' => [
                    'total' => $totalAppointments,
                    'completed' => $completedAppointments,
                    'pending' => $pendingAppointments,
                ],
                'revenue' => [
                    'total' => $totalRevenue,
                ],
            ];
        });
    }

    public function toggleDoctorStatus(Request $request, string $doctorId)
    {
        $data = $request->validate([
            'isActive' => 'required|boolean',
        ]);

        $doctor = $this->firestore->find('doctors', $doctorId);

        if (! $doctor) {
            abort(404, 'Doctor not found');
        }

        $this->firestore->update('doctors', $doctorId, [
            'isActive' => $data['isActive'],
            'updatedAt' => now()->toDateTimeString(),
            'updatedBy' => session('auth_uid'),
        ]);

        Cache::forget('admin:stats');

        return back()->with('success', 'Doctor status updated.');
    }

    public function updateAppointmentStatus(Request $request, string $appointmentId)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,completedPaid,cancelled',
        ]);

        $appointment = $this->firestore->find('appointments', $appointmentId);

        if (! $appointment) {
            abort(404, 'Appointment not found');
        }

        $previousStatus = $appointment['status'] ?? '';
        $newStatus      = $data['status'];

        $this->firestore->update('appointments', $appointmentId, [
            'status'    => $newStatus,
            'updatedAt' => now()->toDateTimeString(),
            'updatedBy' => session('auth_uid'),
        ]);

        Cache::forget('admin:stats');
        Cache::forget('admin:dashboard-charts');
        Cache::forget('admin:appointment-stats');

        // Send 1st review-request email when appointment transitions to completed
        $completedStatuses = ['completed', 'completedPaid'];
        $wasNotCompleted   = ! \in_array($previousStatus, $completedStatuses, true);
        $isNowCompleted    = \in_array($newStatus, $completedStatuses, true);

        if ($wasNotCompleted && $isNowCompleted) {
            $now          = now()->toDateTimeString();
            $patientEmail = $appointment['patientEmail'] ?? null;

            // Stamp completion time so the follow-up command can find this doc
            $this->firestore->update('appointments', $appointmentId, [
                'completedAt' => $now,
            ]);

            if ($patientEmail && empty($appointment['reviewSubmitted'])) {
                $appointment['id'] = $appointmentId;
                try {
                    Mail::to($patientEmail)->send(new ReviewRequest($appointment));

                    // Mark that reminder #1 was sent so the command tracks follow-ups
                    $this->firestore->update('appointments', $appointmentId, [
                        'reviewReminderCount' => 1,
                        'lastReviewEmailAt'   => $now,
                    ]);
                } catch (\Throwable $e) {
                    Log::error('review-request-mail-failed', [
                        'appointment' => $appointmentId,
                        'error'       => $e->getMessage(),
                    ]);
                }
            }
        }

        return back()->with('success', 'Appointment status updated.');
    }

    public function storeSpeciality(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'isActive' => 'nullable|boolean',
        ]);

        $id = Str::slug($data['name']) ?: Str::uuid()->toString();

        if ($this->firestore->find('categories', $id)) {
            $id .= '-'.Str::lower(Str::random(6));
        }
        $updateData = [
            'name' => $data['name'],
            'isActive' => (bool) ($data['isActive'] ?? false),
            'updatedAt' => now()->toDateTimeString(),
            'updatedBy' => session('auth_uid'),
        ];

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $fileName = time().'_'.$image->getClientOriginalName();

            $filePath = "categories/{$id}/{$fileName}";

            /** @var Storage $storage */
            $storage = app('firebase.storage');

            $bucket = $storage->getBucket();

            $bucket->upload(
                fopen($image->getRealPath(), 'r'),
                [
                    'name' => $filePath,
                    'predefinedAcl' => 'publicRead',
                ]
            );

            $imageUrl = 'https://storage.googleapis.com/'.$bucket->name().'/'.$filePath;

            $data['imageUrl'] = $imageUrl;
        }

        $this->firestore->createWithId('categories', $id, [
            'id' => $id,
            'name' => $data['name'],
            'imageUrl' => $data['imageUrl'] ?? null,
            'isActive' => (bool) ($data['isActive'] ?? true),
            'createdAt' => now()->toDateTimeString(),
            'createdBy' => session('auth_uid'),
        ]);

        $this->clearAdminCaches();

        return back()->with('success', 'Speciality added successfully.');
    }

    public function updateSpeciality(Request $request, string $specialityId)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'isActive' => 'nullable|boolean',
        ]);

        if (! $this->firestore->find('categories', $specialityId)) {
            abort(404, 'Speciality not found');
        }
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $fileName = time().'_'.$image->getClientOriginalName();

            $filePath = "categories/{$specialityId}/{$fileName}";

            /** @var Storage $storage */
            $storage = app('firebase.storage');

            $bucket = $storage->getBucket();

            $bucket->upload(
                fopen($image->getRealPath(), 'r'),
                [
                    'name' => $filePath,
                    'predefinedAcl' => 'publicRead',
                ]
            );

            $imageUrl = 'https://storage.googleapis.com/'.$bucket->name().'/'.$filePath;

            $updateData['imageUrl'] = $imageUrl;
        }

        $this->firestore->update('categories', $specialityId, $updateData);

        $this->clearAdminCaches();

        return back()->with('success', 'Speciality updated successfully.');
    }

    public function updateSpecialityStatus(Request $request, string $specialityId)
    {
        $data = $request->validate([
            'isActive' => 'required|boolean',
        ]);

        if (! $this->firestore->find('categories', $specialityId)) {
            abort(404, 'Speciality not found');
        }

        $this->firestore->update('categories', $specialityId, [
            'isActive' => $data['isActive'],
            'updatedAt' => now()->toDateTimeString(),
        ]);

        $this->clearAdminCaches();

        return true;
    }

    public function deleteSpeciality(string $specialityId)
    {
        if (! $this->firestore->find('categories', $specialityId)) {
            abort(404, 'Speciality not found');
        }

        $this->firestore->delete('categories', $specialityId);
        $this->clearAdminCaches();

        return back()->with('success', 'Speciality deleted successfully.');
    }

    public function deleteReview(string $reviewId)
    {
        if (! $this->firestore->find('reviews', $reviewId)) {
            abort(404, 'Review not found');
        }

        $this->firestore->delete('reviews', $reviewId);
        $this->clearAdminCaches();

        return back()->with('success', 'Review deleted successfully.');
    }

    protected function listDocuments(string $collection, int $limit = 50, array $filters = []): array
    {
        $documents = empty($filters)
            ? $this->firestore->get($collection, $limit)
            : ($this->firestore->query($collection, $filters, $limit, null)['documents'] ?? []);

        return collect($documents)
            ->map(fn ($document) => $this->normalizeDocument($document))
            ->values()
            ->all();
    }

    protected function normalizeDocument(array $document): array
    {
        foreach ($document as $key => $value) {
            if ($value instanceof Timestamp) {
                $document[$key] = $value->get()->format('Y-m-d H:i:s');
            }
        }

        return $document;
    }

    protected function clearAdminCaches(): void
    {
        Cache::forget('admin:stats');
        Cache::forget('admin:dashboard-charts');
        Cache::forget('home.categories');
        Cache::forget('home.doctors.categories');
        Cache::forget('patient.dashboard.categories');
    }

    protected function dashboardChartData(): array
    {
        return Cache::remember('admin:dashboard-charts', 300, function () {
            $months = collect(range(5, 0))->mapWithKeys(function (int $offset) {
                $date = Carbon::now()->subMonthsNoOverflow($offset);

                return [$date->format('Y-m') => [
                    'y' => $date->format('M Y'),
                    'doctors' => 0,
                    'patients' => 0,
                ]];
            });

            foreach ($this->listDocuments('doctors', 500) as $doctor) {
                $key = $this->documentMonthKey($doctor);

                if ($key && $months->has($key)) {
                    $row = $months->get($key);
                    $row['doctors']++;
                    $months->put($key, $row);
                }
            }

            foreach ($this->listDocuments('patients', 500) as $patient) {
                $key = $this->documentMonthKey($patient);

                if ($key && $months->has($key)) {
                    $row = $months->get($key);
                    $row['patients']++;
                    $months->put($key, $row);
                }
            }

            $appointmentStatuses = collect([
                'pending' => 0,
                'confirmed' => 0,
                'completed' => 0,
                'cancelled' => 0,
            ]);

            foreach ($this->listDocuments('appointments', 500) as $appointment) {
                $status = strtolower($appointment['status'] ?? 'pending');

                if (! $appointmentStatuses->has($status)) {
                    $appointmentStatuses->put($status, 0);
                }

                $appointmentStatuses->put($status, $appointmentStatuses->get($status) + 1);
            }

            $appointmentData = $appointmentStatuses
                ->filter(fn ($count) => $count > 0)
                ->map(fn ($count, $status) => [
                    'label' => ucfirst($status),
                    'value' => $count,
                ])
                ->values()
                ->all();

            return [
                'registrations' => $months->values()->all(),
                'appointments' => $appointmentData ?: [
                    ['label' => 'No Appointments', 'value' => 1],
                ],
            ];
        });
    }

    protected function documentMonthKey(array $document): ?string
    {
        $rawDate = $document['createdAt']
            ?? $document['created_at']
            ?? $document['registeredAt']
            ?? $document['joinedAt']
            ?? null;

        if (! $rawDate) {
            return null;
        }

        try {
            return Carbon::parse($rawDate)->format('Y-m');
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Get list of doctors for admin
     */
    public function getDoctorsList(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $cursor = $request->input('cursor');
        $status = $request->input('status'); // 'pending', 'active', 'inactive'
        $verified = $request->input('verified'); // 'true', 'false'

        $filters = [];

        if ($status === 'active') {
            $filters[] = ['field' => 'isActive', 'op' => '=', 'value' => true];
        } elseif ($status === 'inactive') {
            $filters[] = ['field' => 'isActive', 'op' => '=', 'value' => false];
        }

        if ($verified === 'true') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => true];
        } elseif ($verified === 'false') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => false];
        }

        $result = $this->firestore->query('doctors', $filters, $perPage, $cursor ? json_decode($cursor, true) : null);

        return response()->json([
            'success' => true,
            'doctors' => $result['documents'] ?? [],
            'nextCursor' => $result['nextCursor'] ?? null,
            'hasMore' => $result['hasMore'] ?? false,
        ]);
    }

    /**
     * Get list of patients for admin
     */
    public function getPatientsList(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $cursor = $request->input('cursor');
        $verified = $request->input('verified'); // 'true', 'false'

        $filters = [];

        if ($verified === 'true') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => true];
        } elseif ($verified === 'false') {
            $filters[] = ['field' => 'isVerified', 'op' => '=', 'value' => false];
        }

        $result = $this->firestore->query('patients', $filters, $perPage, $cursor ? json_decode($cursor, true) : null);

        return response()->json([
            'success' => true,
            'patients' => $result['documents'] ?? [],
            'nextCursor' => $result['nextCursor'] ?? null,
            'hasMore' => $result['hasMore'] ?? false,
        ]);
    }

    /**
     * Get list of appointments for admin
     */
    public function getAppointmentsList(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $cursor = $request->input('cursor');
        $status = $request->input('status'); // 'pending', 'completed', 'cancelled'

        $filters = [];

        if ($status) {
            $filters[] = ['field' => 'status', 'op' => '=', 'value' => $status];
        }

        $result = $this->firestore->query('appointments', $filters, $perPage, $cursor ? json_decode($cursor, true) : null);

        return response()->json([
            'success' => true,
            'appointments' => $result['documents'] ?? [],
            'nextCursor' => $result['nextCursor'] ?? null,
            'hasMore' => $result['hasMore'] ?? false,
        ]);
    }

    /**
     * Approve/Verify doctor
     */
    public function approvDoctor(Request $request, $doctorId)
    {
        try {
            $doctor = $this->firestore->find('doctors', $doctorId);

            if (! $doctor) {
                return response()->json(['error' => 'Doctor not found'], 404);
            }

            $updated = $this->firestore->update('doctors', $doctorId, [
                'isVerified' => true,
                'verifiedAt' => now()->toDateTimeString(),
                'verifiedBy' => session('auth_uid'),
            ]);

            // Clear cache
            Cache::forget('admin:stats');

            return response()->json([
                'success' => true,
                'message' => 'Doctor verified successfully',
                'doctor' => $updated,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Reject/Deactivate doctor
     */
    public function rejectDoctor(Request $request, $doctorId)
    {
        try {
            $doctor = $this->firestore->find('doctors', $doctorId);

            if (! $doctor) {
                return response()->json(['error' => 'Doctor not found'], 404);
            }

            $reason = $request->input('reason', 'Not specified');

            $updated = $this->firestore->update('doctors', $doctorId, [
                'isActive' => false,
                'rejectionReason' => $reason,
                'rejectedAt' => now()->toDateTimeString(),
                'rejectedBy' => session('auth_uid'),
            ]);

            // Clear cache
            Cache::forget('admin:stats');

            return response()->json([
                'success' => true,
                'message' => 'Doctor deactivated successfully',
                'doctor' => $updated,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get doctor details with full information
     */
    public function getDoctorDetails($doctorId)
    {
        try {
            $doctor = $this->firestore->find('doctors', $doctorId);

            if (! $doctor) {
                return response()->json(['error' => 'Doctor not found'], 404);
            }

            // Get doctor's appointments
            $appointments = $this->firestore->query('appointments', [
                ['field' => 'doctorId', 'op' => '=', 'value' => $doctorId],
            ], 5)['documents'] ?? [];

            // Get doctor's reviews
            $reviews = $this->firestore->query('reviews', [
                ['field' => 'doctorId', 'op' => '=', 'value' => $doctorId],
            ], 5)['documents'] ?? [];

            return response()->json([
                'success' => true,
                'doctor' => $doctor,
                'appointments' => $appointments,
                'reviews' => $reviews,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get app settings
     */
    public function getSettings()
    {
        try {
            $settings = $this->firestore->first('appsettings');

            return response()->json([
                'success' => true,
                'settings' => $settings,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update app settings
     */
    public function updateSettings(Request $request)
    {
        try {
            $data = $request->validate([
                'platformCommission' => 'numeric|min:0|max:100',
            ]);

            $settings = $this->firestore->find('app_settings', 'payment');

            // Update existing
            $created = $this->firestore->update('app_settings', 'payment', [
                'defaultPlatformFeePercent' => $data['platformCommission'],
            ]);

            // Clear cache
            Cache::forget('admin:stats');

            if (! $request->expectsJson()) {
                return back()->with('success', 'Settings updated successfully.');
            }

            return response()->json([
                'success' => true,
                'message' => 'Settings updated successfully',
                'settings' => $created,
            ]);

        } catch (\Exception $e) {
            if (! $request->expectsJson()) {
                return back()->withErrors(['settings' => $e->getMessage()])->withInput();
            }

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function specialitiesPage(string $search = '', ?string $cursor = null): array
    {
        $documents = collect(
            $this->listDocuments('categories', 200)
        );

        if ($search) {

            $search = strtolower(trim($search));

            $documents = $documents->filter(function ($item) use ($search) {

                return str_contains(
                    strtolower($item['name'] ?? ''),
                    $search
                );
            });
        }

        $documents = $documents->values();

        $limit = 25;

        $offset = $cursor ? (int) $cursor : 0;

        $paged = $documents
            ->slice($offset, $limit)
            ->values();

        $nextCursor = ($offset + $limit) < $documents->count()
            ? $offset + $limit
            : null;

        return [
            'documents' => $paged,
            'nextCursor' => $nextCursor,
            'hasMore' => $nextCursor !== null,
        ];
    }
}
