<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ url('admin/index') }}" class="logo">
            <img src="{{ asset('build/img/logo.webp') }}" alt="Logo">
        </a>
        <a href="{{ url('admin/index') }}" class="logo logo-small">
            <img src="{{ asset('build/img/prigina-gav.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    {{-- <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div> --}}

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

        <!-- Notifications -->
        <li class="nav-item dropdown noti-dropdown" id="noti-dropdown-li">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fe fe-bell"></i>
                <span class="badge rounded-pill" id="noti-badge" style="display:none">0</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti" id="clear-all-noti">Clear All</a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list" id="noti-list">
                        <li class="text-center p-3">
                            <div class="spinner-border spinner-border-sm text-primary"></div>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{ url('admin/notifications') }}">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->

        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle"
                        src="{{ URL::asset('build/admin/img/profiles/avatar-01.jpg') }}" width="31"
                        alt="Ryan Taylor"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ URL::asset('build/admin/img/profiles/avatar-01.jpg') }}" alt="User Image"
                            class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ session('admin_name', 'Admin') }}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ url('admin/profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ url('admin/settings') }}">Settings</a>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->

<style>
    #noti-list .notif-unread {
        background: rgba(var(--bs-primary-rgb), .05);
    }
</style>

<script>
    (function() {
        const FEED_URL = '{{ route('admin.notifications.feed') }}';
        const READ_BASE = '{{ url('admin/notifications') }}/';
        const READ_ALL = '{{ route('admin.notifications.read-all') }}';
        const CSRF = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

        function actionUrl(notif) {
            const action = notif.data?.action ?? '';
            const doctorId = notif.data?.doctorId ?? null;
            if (action === 'verify_doctor' && doctorId) return '{{ url('admin/doctors') }}/' + doctorId;
            if (action === 'view_payment' || action === 'check_balance') return '{{ url('admin/reports') }}';
            return '{{ url('admin/notifications') }}';
        }

        function iconFor(notif) {
            const action = notif.data?.action ?? '';
            if (action === 'verify_doctor') return {
                icon: 'fe-user-check',
                color: 'primary'
            };
            if (action === 'view_payment') return {
                icon: 'fe-dollar-sign',
                color: 'success'
            };
            if (action === 'check_balance') return {
                icon: 'fe-bar-chart-2',
                color: 'warning'
            };
            return {
                icon: 'fe-bell',
                color: 'secondary'
            };
        }

        function timeAgo(dateStr) {
            if (!dateStr) return '';
            const d = new Date(dateStr);
            if (isNaN(d)) return '';
            const diff = Math.floor((Date.now() - d) / 1000);
            if (diff < 60) return diff + 's ago';
            if (diff < 3600) return Math.floor(diff / 60) + 'm ago';
            if (diff < 86400) return Math.floor(diff / 3600) + 'h ago';
            return Math.floor(diff / 86400) + 'd ago';
        }

        function esc(s) {
            const d = document.createElement('div');
            d.appendChild(document.createTextNode(String(s ?? '')));
            return d.innerHTML;
        }

        function itemHtml(n) {
            const {
                icon,
                color
            } = iconFor(n);
            const url = actionUrl(n);
            const bold = n.isRead ? '' : 'fw-semibold';
            const cls = n.isRead ? '' : 'notif-unread';
            return `
        <li class="notification-message ${cls}" data-notif-id="${esc(n.id)}">
            <a href="javascript:void(0)" class="notif-item-link" data-url="${esc(url)}">
                <div class="notify-block d-flex">
                    <span class="avatar avatar-sm flex-shrink-0 rounded-circle bg-${color} bg-opacity-10
                                 d-flex align-items-center justify-content-center"
                          style="width:36px;height:36px;">
                        <i class="fe ${icon} text-${color}"></i>
                    </span>
                    <div class="media-body flex-grow-1 ms-2">
                        <p class="noti-details mb-0 ${bold}">${esc(n.title)}</p>
                        <p class="text-muted small mb-1">${esc(n.description)}</p>
                        <p class="noti-time mb-0"><span class="notification-time">${timeAgo(n.createdAt)}</span></p>
                    </div>
                </div>
            </a>
        </li>`;
        }

        function renderFeed(data) {
            const badge = document.getElementById('noti-badge');
            const list = document.getElementById('noti-list');
            const count = data.unread ?? 0;

            badge.textContent = count > 99 ? '99+' : count;
            badge.style.display = count > 0 ? '' : 'none';

            if (!data.notifications?.length) {
                list.innerHTML = '<li class="text-center text-muted p-3 small">No notifications</li>';
                return;
            }
            list.innerHTML = data.notifications.map(itemHtml).join('');
        }

        async function fetchFeed() {
            try {
                const res = await fetch(FEED_URL + '?limit=10', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const data = await res.json();
                renderFeed(data);
            } catch (e) {
                /* silent */ }
        }

        // Click on a notification item
        document.getElementById('noti-list').addEventListener('click', async function(e) {
            const link = e.target.closest('.notif-item-link');
            if (!link) return;
            const li = link.closest('[data-notif-id]');
            const id = li?.dataset?.notifId;
            const url = link.dataset.url;

            if (id) {
                try {
                    await fetch(READ_BASE + id + '/read', {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': CSRF,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                    });
                    li.classList.remove('notif-unread');
                    li.querySelector('.fw-semibold')?.classList.remove('fw-semibold');
                    const badge = document.getElementById('noti-badge');
                    const cur = parseInt(badge.textContent, 10) || 0;
                    if (cur > 0) {
                        const next = cur - 1;
                        badge.textContent = next;
                        badge.style.display = next > 0 ? '' : 'none';
                    }
                } catch (e) {
                    /* silent */ }
            }

            if (url && url !== '#') window.location.href = url;
        });

        // Clear all
        document.getElementById('clear-all-noti').addEventListener('click', async function() {
            try {
                await fetch(READ_ALL, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': CSRF,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                });
                document.getElementById('noti-badge').style.display = 'none';
                document.querySelectorAll('#noti-list .notif-unread').forEach(el => {
                    el.classList.remove('notif-unread');
                    el.querySelector('.fw-semibold')?.classList.remove('fw-semibold');
                });
            } catch (e) {
                /* silent */ }
        });

        async function clearAllSilently() {
            try {
                await fetch(READ_ALL, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': CSRF,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                });
                document.getElementById('noti-badge').style.display = 'none';
                document.querySelectorAll('#noti-list .notif-unread').forEach(el => {
                    el.classList.remove('notif-unread');
                    el.querySelector('.fw-semibold')?.classList.remove('fw-semibold');
                });
            } catch (e) {
                /* silent */ }
        }

        // On dropdown open: load feed then auto-mark all read
        document.getElementById('noti-dropdown-li').addEventListener('show.bs.dropdown', async function() {
            await fetchFeed();
            clearAllSilently();
        });

        // Initial load + 60-second polling for the badge
        fetchFeed();
        setInterval(fetchFeed, 60000);
    }());
</script>
