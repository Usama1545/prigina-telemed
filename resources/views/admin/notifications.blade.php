<?php $page = 'notifications'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Notifications</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Notifications</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-secondary btn-sm" id="markAllReadBtn">
                            <i class="fe fe-check-square me-1"></i>Mark All Read
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">

                            <div id="notif-loading" class="text-center p-5">
                                <div class="spinner-border text-primary spinner-border-sm"></div>
                            </div>

                            <div id="notif-empty" style="display:none" class="text-center p-5 text-muted">
                                <i class="fe fe-bell-off" style="font-size:2.5rem"></i>
                                <p class="mt-2 mb-0">No notifications yet.</p>
                            </div>

                            <div id="notif-list"></div>

                            <div id="notif-load-more-wrap" style="display:none" class="text-center p-3 border-top">
                                <button class="btn btn-outline-primary btn-sm" id="notif-load-more">
                                    Load More
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        (function () {
            const FEED_URL   = '{{ route("admin.notifications.feed") }}';
            const READ_BASE  = '{{ url("admin/notifications") }}/';
            const READ_ALL   = '{{ route("admin.notifications.read-all") }}';
            const CSRF       = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

            let nextCursor = null;
            let hasMore    = false;

            function actionUrl(notif) {
                const action   = notif.data?.action ?? '';
                const doctorId = notif.data?.doctorId ?? null;
                if (action === 'verify_doctor' && doctorId) return '{{ url("admin/doctors") }}/' + doctorId;
                if (action === 'view_payment' || action === 'check_balance') return '{{ url("admin/reports") }}';
                return null;
            }

            function iconFor(notif) {
                const action = notif.data?.action ?? '';
                if (action === 'verify_doctor') return { icon: 'fe-user-check', color: 'primary' };
                if (action === 'view_payment')  return { icon: 'fe-dollar-sign', color: 'success' };
                if (action === 'check_balance') return { icon: 'fe-bar-chart-2', color: 'warning' };
                return { icon: 'fe-bell', color: 'secondary' };
            }

            function timeAgo(dateStr) {
                if (!dateStr) return '';
                const d    = new Date(dateStr);
                if (isNaN(d)) return dateStr;
                const diff = Math.floor((Date.now() - d) / 1000);
                if (diff < 60)    return diff + 's ago';
                if (diff < 3600)  return Math.floor(diff / 60) + 'm ago';
                if (diff < 86400) return Math.floor(diff / 3600) + 'h ago';
                return Math.floor(diff / 86400) + 'd ago';
            }

            function esc(s) {
                const d = document.createElement('div');
                d.appendChild(document.createTextNode(String(s ?? '')));
                return d.innerHTML;
            }

            function renderItem(n) {
                const { icon, color } = iconFor(n);
                const url     = actionUrl(n);
                const bold    = n.read ? '' : 'fw-semibold';
                const border  = n.read ? '' : 'border-start border-primary border-3';
                const bg      = n.read ? '' : 'style="background:rgba(var(--bs-primary-rgb),.04)"';
                const viewBtn = url
                    ? `<a href="javascript:void(0)" class="btn btn-sm btn-outline-primary flex-shrink-0 notif-view-btn"
                            data-id="${esc(n.id)}" data-url="${esc(url)}">View</a>`
                    : '';
                return `
                <div class="d-flex align-items-center gap-3 p-3 border-bottom ${border} notif-page-item"
                     data-id="${esc(n.id)}" ${bg}>
                    <span class="rounded-circle bg-${color} bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                          style="width:42px;height:42px;">
                        <i class="fe ${icon} text-${color}" style="font-size:1.1rem"></i>
                    </span>
                    <div class="flex-grow-1 min-w-0">
                        <div class="d-flex justify-content-between align-items-baseline gap-2">
                            <p class="mb-0 ${bold} text-truncate">${esc(n.title)}</p>
                            <small class="text-muted flex-shrink-0">${timeAgo(n.createdAt)}</small>
                        </div>
                        <p class="text-muted small mb-0">${esc(n.description)}</p>
                    </div>
                    ${viewBtn}
                </div>`;
            }

            async function loadPage(cursor = null) {
                const loading     = document.getElementById('notif-loading');
                const list        = document.getElementById('notif-list');
                const emptyDiv    = document.getElementById('notif-empty');
                const loadMoreBtn = document.getElementById('notif-load-more');
                const loadMoreWrap= document.getElementById('notif-load-more-wrap');

                if (!cursor) loading.style.display = '';
                if (loadMoreBtn) loadMoreBtn.disabled = true;

                let url = FEED_URL + '?limit=20';
                if (cursor) url += '&cursor=' + encodeURIComponent(cursor);

                try {
                    const res  = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                    const data = await res.json();

                    loading.style.display = 'none';

                    if (!cursor && (!data.notifications || data.notifications.length === 0)) {
                        emptyDiv.style.display = '';
                        return;
                    }

                    list.insertAdjacentHTML('beforeend', (data.notifications ?? []).map(renderItem).join(''));

                    // Auto-mark all read on first page load
                    if (!cursor) {
                        fetch(READ_ALL, {
                            method : 'POST',
                            headers: { 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' },
                        }).then(() => {
                            document.querySelectorAll('.notif-page-item').forEach(el => {
                                el.style.background = '';
                                el.classList.remove('border-start', 'border-primary', 'border-3');
                                el.querySelector('.fw-semibold')?.classList.remove('fw-semibold');
                            });
                        }).catch(() => {});
                    }

                    nextCursor = data.nextCursor;
                    hasMore    = data.hasMore;
                    loadMoreWrap.style.display = hasMore ? '' : 'none';
                } catch (e) {
                    loading.style.display = 'none';
                } finally {
                    if (loadMoreBtn) loadMoreBtn.disabled = false;
                }
            }

            // "View" button — mark read then navigate
            document.getElementById('notif-list').addEventListener('click', async function (e) {
                const btn = e.target.closest('.notif-view-btn');
                if (!btn) return;
                const id  = btn.dataset.id;
                const url = btn.dataset.url;
                try {
                    await fetch(READ_BASE + id + '/read', {
                        method : 'PATCH',
                        headers: { 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' },
                    });
                    const item = document.querySelector(`.notif-page-item[data-id="${id}"]`);
                    if (item) {
                        item.style.background = '';
                        item.classList.remove('border-start', 'border-primary', 'border-3');
                        item.querySelector('.fw-semibold')?.classList.remove('fw-semibold');
                    }
                } catch (e) { /* silent */ }
                if (url) window.location.href = url;
            });

            // Mark all read
            document.getElementById('markAllReadBtn').addEventListener('click', async function () {
                this.disabled = true;
                try {
                    await fetch(READ_ALL, {
                        method : 'POST',
                        headers: { 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' },
                    });
                    document.querySelectorAll('.notif-page-item').forEach(el => {
                        el.style.background = '';
                        el.classList.remove('border-start', 'border-primary', 'border-3');
                        el.querySelector('.fw-semibold')?.classList.remove('fw-semibold');
                    });
                } catch (e) { /* silent */ }
                this.disabled = false;
            });

            // Load more
            document.getElementById('notif-load-more').addEventListener('click', function () {
                if (nextCursor) loadPage(nextCursor);
            });

            loadPage();
        }());
    </script>
@endsection
