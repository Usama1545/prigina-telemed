@php
    $t = __('app.doctor_country_filter');
    $selectedName = \App\Services\DoctorDirectory::countryName($country);
    // Keep the page's other filters (category, availability, search) when switching country.
$keep = collect(request()->except(['country', 'cursor']));
@endphp

<form method="GET" action="{{ url()->current() }}" class="card mb-3 border-0 shadow-sm doctor-country-filter">
    @foreach ($keep as $key => $value)
        @foreach ((array) $value as $item)
            <input type="hidden" name="{{ is_array($value) ? $key . '[]' : $key }}" value="{{ $item }}">
        @endforeach
    @endforeach

    <div class="card-body d-flex align-items-center gap-3 py-3">
        <span class="d-inline-flex align-items-center justify-content-center rounded bg-primary-subtle text-primary"
            style="width:50px;height:50px;flex:0 0 50px;">
            <i class="fa-solid fa-location-dot"></i>
        </span>
        <div class="flex-grow-1 position-relative" id="countryPicker">
            <label class="small text-muted d-block mb-0">{{ $t['label'] }}</label>

            <input type="hidden" name="country" id="doctorCountry"
                value="{{ $country ?? \App\Services\DoctorDirectory::ALL }}">

            <button type="button" id="countryToggle"
                class="btn p-0 border-0 bg-transparent fw-bold fs-26 text-start text-primary w-100 d-flex align-items-center justify-content-between gap-2"
                aria-haspopup="listbox" aria-expanded="false">
                <span class="text-truncate">{{ $country ? $selectedName : $t['all'] }}</span>
                <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none">
                    <path d="M18.0699 14.4297L11.9999 20.4997L5.92993 14.4297" stroke="#141414" stroke-width="1.5"
                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 3.5V20.33" stroke="#141414" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <ul class="country-menu list-unstyled bg-white shadow rounded-3 border" role="listbox" hidden>
                @foreach ($countryOptions as $code => $name)
                    <li role="option" data-value="{{ $code }}"
                        aria-selected="{{ $country === $code ? 'true' : 'false' }}">{{ $name }}</li>
                @endforeach
                <li role="option" data-value="{{ \App\Services\DoctorDirectory::ALL }}"
                    aria-selected="{{ $country === null ? 'true' : 'false' }}">{{ $t['all'] }}</li>
            </ul>

            <small class="text-muted">
                {{ $country ? str_replace(':country', $selectedName, $t['showing_in']) : $t['showing_all'] }}
            </small>
        </div>
    </div>
</form>
<style>
    .country-menu {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 1050;
        max-height: 260px;
        overflow-y: auto;
        margin: .25rem 0 0;
        padding: .25rem;
    }

    .country-menu li {
        display: block;
        color: #141414;
        font-size: 15px;
        line-height: 1.4;
        padding: .75rem 1rem;
        border-radius: .375rem;
        cursor: pointer;
    }

    .country-menu li:hover,
    .country-menu li[aria-selected="true"] {
        background: var(--bs-primary-bg-subtle);
        color: var(--bs-primary);
    }
</style>
@push('scripts')
    <script>
        const picker = document.getElementById('countryPicker');
        const toggle = document.getElementById('countryToggle');
        const menu = picker.querySelector('.country-menu');
        const input = document.getElementById('doctorCountry');

        toggle.addEventListener('click', () => {
            menu.hidden = !menu.hidden;
            toggle.setAttribute('aria-expanded', String(!menu.hidden));
        });

        menu.addEventListener('click', (e) => {
            const item = e.target.closest('li');
            if (!item) return;
            input.value = item.dataset.value;
            picker.closest('form').submit();
        });

        document.addEventListener('click', (e) => {
            if (!picker.contains(e.target)) {
                menu.hidden = true;
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    </script>
@endpush
