{{--
    Countries of Practice: one card per country with its medical licence.
    Posts practice[i][id|country|licensingAuthority|licenseNumber|licenseExpiry|document].

    @include('partials.countries-of-practice-fields', [
        'entries' => [],            // existing entries (profile), [] for sign-up
        'documentRequired' => true, // sign-up: every country needs a document
    ])
--}}
@php
    $entries = array_values($entries ?? []);
    // After a failed save, show what was typed, keeping each saved entry's
    // document and review status.
    if (is_array(old('practice'))) {
        $saved = collect($entries)->keyBy('id');
        $entries = collect(old('practice'))->values()->map(fn ($input) => [
            ...($saved[$input['id'] ?? ''] ?? []),
            ...collect($input)->only(['id', 'country', 'licensingAuthority', 'licenseNumber', 'licenseExpiry'])->all(),
        ])->all();
    }
    $copErrors = isset($errors)
        ? collect($errors->getMessages())->filter(fn ($m, $key) => str_starts_with($key, 'practice'))->flatten()
        : collect();
    $documentRequired = $documentRequired ?? true;
    $t = __('app.countries_of_practice');
    // Country names in the visitor's language.
    $countryOptions = collect(\Symfony\Component\Intl\Countries::getNames(app()->getLocale()))
        ->map(fn ($name, $code) => ['code' => $code, 'name' => $name])
        ->values();
@endphp

<div class="col-12 mb-3" id="countriesOfPractice">
    <h5 class="text-primary fw-bold mb-1">{{ $t['title'] }}</h5>
    <p class="text-muted small mb-3">{{ $t['subtitle'] }}</p>

    @if ($copErrors->isNotEmpty())
        <div class="alert alert-danger py-2">
            @foreach ($copErrors->unique() as $message)
                <div>{{ $message }}</div>
            @endforeach
        </div>
    @endif

    <div id="copEntries"></div>

    <button type="button" class="btn btn-outline-primary w-100" style="border-style: dashed;" id="copAdd">
        <i class="fa-solid fa-plus me-1"></i>{{ $t['add'] }}
    </button>
</div>

<template id="copTemplate">
    <div class="card mb-3 cop-entry">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="text-primary fw-bold mb-0 cop-title"></h6>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge cop-status d-none"></span>
                    <button type="button" class="btn btn-sm btn-link text-danger cop-remove" title="{{ $t['remove'] }}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <input type="hidden" data-field="id">
            <div class="row">
                <div class="mb-2 col-md-6">
                    <label class="form-label">{{ $t['country'] }}</label>
                    <select class="form-control" data-field="country" required>
                        <option value="">{{ $t['select_country'] }}</option>
                    </select>
                </div>
                <div class="mb-2 col-md-6">
                    <label class="form-label">{{ $t['licensing_authority'] }}</label>
                    <input type="text" class="form-control" data-field="licensingAuthority" maxlength="200"
                        placeholder="{{ $t['licensing_authority_placeholder'] }}" required>
                </div>
                <div class="mb-2 col-md-6">
                    <label class="form-label">{{ $t['license_number'] }}</label>
                    <input type="text" class="form-control" data-field="licenseNumber" maxlength="100" required>
                </div>
                <div class="mb-2 col-md-6">
                    <label class="form-label">{{ $t['license_expiry'] }}
                        <small class="text-muted">({{ $t['if_applicable'] }})</small></label>
                    <input type="date" class="form-control" data-field="licenseExpiry">
                </div>
                <div class="mb-2 col-12">
                    <label class="form-label">{{ $t['document'] }}</label>
                    <input type="file" class="form-control" data-field="document" accept=".jpg,.jpeg,.png,.pdf">
                    <small class="cop-current-doc d-none"><a target="_blank" rel="noopener">{{ $t['current_document'] }}</a></small>
                </div>
                <div class="col-12 cop-reason text-danger small d-none"></div>
            </div>
        </div>
    </div>
</template>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const t = @json($t);
        const existing = @json($entries);
        const documentRequired = @json((bool) $documentRequired);
        const container = document.getElementById('copEntries');
        const template = document.getElementById('copTemplate');
        const countries = @json($countryOptions);
        const statusClass = { pending: 'bg-warning text-dark', approved: 'bg-success', rejected: 'bg-danger' };

        function renumber() {
            const cards = container.querySelectorAll('.cop-entry');
            cards.forEach((card, i) => {
                card.querySelector('.cop-title').textContent = t.entry.replace(':n', i + 1);
                card.querySelectorAll('[data-field]').forEach(el => {
                    el.name = `practice[${i}][${el.dataset.field}]`;
                });
                card.querySelector('.cop-remove').classList.toggle('d-none', cards.length === 1);
            });
            refreshCountryChoices();
        }

        // A country can only be chosen once.
        function refreshCountryChoices() {
            const selects = [...container.querySelectorAll('[data-field="country"]')];
            const taken = selects.map(s => s.value).filter(Boolean);
            selects.forEach(select => {
                [...select.options].forEach(o => {
                    o.disabled = !!o.value && o.value !== select.value && taken.includes(o.value);
                });
            });
        }

        function addCard(entry = {}) {
            const card = template.content.firstElementChild.cloneNode(true);
            const select = card.querySelector('[data-field="country"]');
            countries.forEach(c => select.add(new Option(c.name, c.code)));

            card.querySelector('[data-field="id"]').value = entry.id || '';
            select.value = entry.country || '';
            card.querySelector('[data-field="licensingAuthority"]').value = entry.licensingAuthority || '';
            card.querySelector('[data-field="licenseNumber"]').value = entry.licenseNumber || '';
            card.querySelector('[data-field="licenseExpiry"]').value = entry.licenseExpiry || '';

            const file = card.querySelector('[data-field="document"]');
            file.required = documentRequired || !entry.documentUrl;
            if (entry.documentUrl) {
                const doc = card.querySelector('.cop-current-doc');
                doc.classList.remove('d-none');
                doc.querySelector('a').href = entry.documentUrl;
            }

            if (entry.status) {
                const badge = card.querySelector('.cop-status');
                badge.classList.remove('d-none');
                badge.className += ' ' + (statusClass[entry.status] || 'bg-secondary');
                badge.textContent = t['status_' + entry.status] || entry.status;
            }
            if (entry.status === 'rejected' && entry.rejectionReason) {
                const reason = card.querySelector('.cop-reason');
                reason.classList.remove('d-none');
                reason.textContent = entry.rejectionReason;
            }

            select.addEventListener('change', refreshCountryChoices);
            card.querySelector('.cop-remove').addEventListener('click', () => {
                card.remove();
                renumber();
            });

            container.appendChild(card);
            renumber();
        }

        document.getElementById('copAdd').addEventListener('click', () => {
            if (container.querySelectorAll('.cop-entry').length >= {{ \App\Services\CountriesOfPracticeService::MAX_ENTRIES }}) return;
            addCard();
        });

        (existing.length ? existing : [{}]).forEach(addCard);
    });
</script>
