{{--
    Call buttons that only work inside the appointment's call window (10 min
    before the start to 10 min after the end), with the reason shown while
    they're disabled, and a no-show report option from 10 min after the start
    if no call has connected.

    Markup (appointment rows): an element with data-call-gate="appointment=ID"
    containing [data-call-button] buttons/links, a [data-call-hint] element and
    a [data-call-report] element. The chat page calls CallGate.watch() itself.

    Time comes from the server: the page counts forward from the server's
    "now" using elapsed time, so the device clock is never used.
--}}
<style>
    [data-call-button].call-gated {
        opacity: .45;
        pointer-events: none;
        cursor: not-allowed;
    }

    .call-gate-hint {
        font-size: 12px;
        color: #6b7280;
    }

    .call-gate-report {
        font-size: 12px;
    }
</style>

<script>
    window.CallGate = (function() {
        const i18n = @json(__('app.calls'));
        const csrf = @json(csrf_token());
        const gates = new Map();

        const t = (key, time) => (i18n[key] || key).replace(':time', time || '');

        function serverNow(gate) {
            return gate.state.serverNow + (performance.now() - gate.fetchedAt);
        }

        async function load(gate) {
            try {
                const res = await fetch('/calls/access?' + gate.query, {
                    headers: { 'Accept': 'application/json' }
                });
                gate.state = res.ok ? await res.json() : { serverNow: 0, call: null, report: null };
            } catch (e) {
                gate.state = { serverNow: 0, call: null, report: null };
            }
            gate.fetchedAt = performance.now();
            render(gate);
        }

        function render(gate) {
            if (!gate.state) return;
            const now = serverNow(gate);
            const { call, report } = gate.state;
            const open = !!call && now >= call.opensAt && now <= call.closesAt;

            gate.buttons().forEach(btn => {
                btn.classList.toggle('call-gated', !open);
                btn.setAttribute('aria-disabled', open ? 'false' : 'true');
                if (btn.tagName === 'BUTTON') btn.disabled = !open;
            });

            const hint = gate.hint();
            if (hint) {
                let text = '';
                if (!call) text = t('no_appointment');
                else if (now < call.opensAt) text = t('opens_at', call.opensLabel);
                else if (now > call.closesAt) text = t('closed_at', call.closesLabel);
                hint.textContent = text;
                hint.style.display = text ? '' : 'none';
            }

            const box = gate.report();
            if (box) {
                const reportable = !!report && now >= report.availableFrom && now <= report.availableUntil;
                if (!reportable) {
                    box.style.display = 'none';
                    box.innerHTML = '';
                } else if (report.alreadyReported) {
                    box.style.display = '';
                    box.innerHTML = '<span class="text-muted">' + t('no_show_reported') + '</span>';
                } else {
                    box.style.display = '';
                    const who = report.role === 'doctor' ? t('patient_not_joined') : t('doctor_not_joined');
                    box.innerHTML = '<span class="text-danger me-2">' + who + '</span>' +
                        '<button type="button" class="btn btn-sm btn-outline-danger">' + t('report_no_show') + '</button>';
                    box.querySelector('button').addEventListener('click', () => submitReport(gate, report.appointmentId));
                }
            }
        }

        async function submitReport(gate, appointmentId) {
            if (!confirm(t('report_confirm'))) return;
            try {
                const res = await fetch('/appointments/' + encodeURIComponent(appointmentId) + '/no-show', {
                    method: 'POST',
                    headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf }
                });
                const data = await res.json();
                if (!res.ok || !data.success) {
                    alert(data.message || t('no_show_not_available'));
                }
            } catch (e) {
                alert(t('no_show_not_available'));
            }
            load(gate);
        }

        // Disabled links must not navigate even if clicked by keyboard.
        document.addEventListener('click', e => {
            const btn = e.target.closest('[data-call-button]');
            if (btn && btn.getAttribute('aria-disabled') === 'true') {
                e.preventDefault();
                e.stopImmediatePropagation();
            }
        }, true);

        /**
         * Starts (or retargets) a gate. key: any id; query: "appointment=ID" or
         * "conversation=ID"; els: functions returning the buttons/hint/report elements.
         */
        function watch(key, query, els) {
            let gate = gates.get(key);
            if (!gate) {
                gate = { ...els };
                gates.set(key, gate);
            }
            gate.query = query;
            gate.state = null;
            load(gate);
        }

        function initRows(root) {
            (root || document).querySelectorAll('[data-call-gate]').forEach(el => {
                watch(el, el.dataset.callGate, {
                    buttons: () => el.querySelectorAll('[data-call-button]'),
                    hint: () => el.querySelector('[data-call-hint]'),
                    report: () => el.querySelector('[data-call-report]'),
                });
            });
        }

        // Re-check the window every 15 s on the server clock, and refresh from
        // the server every 2 min (a call may have connected meanwhile).
        setInterval(() => gates.forEach(render), 15000);
        setInterval(() => gates.forEach(load), 120000);

        document.addEventListener('DOMContentLoaded', () => initRows());

        return { watch, initRows };
    })();
</script>
