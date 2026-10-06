{{--
    "Patient location": which country's doctors to show (by their Countries of
    Practice, never their location). Pre-selected with the patient's country of
    residence; the choice is kept for the session (DoctorDirectory).

    @include('partials.doctor-country-filter', [
        'country' => $country,               // selected code, or null for all countries
        'countryOptions' => $countryOptions, // code => name
    ])
--}}
@php
    $t = __('app.doctor_country_filter');
    $selectedName = \App\Services\DoctorDirectory::countryName($country);
    // Keep the page's other filters (category, availability, search) when switching country.
    $keep = collect(request()->except(['country', 'cursor']));
@endphp

<form method="GET" action="{{ url()->current() }}" class="card mb-3 border-0 shadow-sm doctor-country-filter">
    @foreach ($keep as $key => $value)
        @foreach ((array) $value as $item)
            <input type="hidden" name="{{ is_array($value) ? $key.'[]' : $key }}" value="{{ $item }}">
        @endforeach
    @endforeach

    <div class="card-body d-flex align-items-center gap-3 py-3">
        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary-subtle text-primary"
            style="width:44px;height:44px;flex:0 0 44px;">
            <i class="fa-solid fa-location-dot"></i>
        </span>
        <div class="flex-grow-1">
            <label for="doctorCountry" class="small text-muted d-block mb-0">{{ $t['label'] }}</label>
            <select name="country" id="doctorCountry" class="form-select form-select-sm border-0 ps-0 fw-bold fs-6"
                style="box-shadow:none;max-width:320px;" onchange="this.form.submit()">
                @foreach ($countryOptions as $code => $name)
                    <option value="{{ $code }}" @selected($country === $code)>{{ $name }}</option>
                @endforeach
                @if ($country && ! isset($countryOptions[$country]))
                    <option value="{{ $country }}" selected>{{ $selectedName }}</option>
                @endif
                <option value="{{ \App\Services\DoctorDirectory::ALL }}" @selected($country === null)>{{ $t['all'] }}</option>
            </select>
            <small class="text-muted">
                {{ $country ? str_replace(':country', $selectedName, $t['showing_in']) : $t['showing_all'] }}
            </small>
        </div>
    </div>
</form>
