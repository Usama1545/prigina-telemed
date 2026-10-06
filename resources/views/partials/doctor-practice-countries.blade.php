{{--
    Where a doctor card's doctor may practise: "Available in Ghana" for the
    country being browsed, or their approved countries when browsing all.

    @include('partials.doctor-practice-countries', ['doctor' => $doctor, 'country' => $country])
--}}
@php
    $codes = $country ? [$country] : array_slice(\App\Services\DoctorDirectory::approvedCountries($doctor), 0, 3);
@endphp
@if ($codes)
    <div class="d-flex flex-wrap align-items-center gap-1 my-1">
        @foreach ($codes as $code)
            <span class="badge bg-primary-subtle text-primary d-inline-flex align-items-center gap-1 fw-medium">
                <img src="https://flagcdn.com/16x12/{{ strtolower($code) }}.png" alt="" width="16" height="12">
                {{ $country
                    ? str_replace(':country', \App\Services\DoctorDirectory::countryName($code), __('app.doctor_country_filter.available_in'))
                    : \App\Services\DoctorDirectory::countryName($code) }}
            </span>
        @endforeach
    </div>
@endif
