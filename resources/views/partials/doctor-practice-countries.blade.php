{{--
    Where a doctor card's doctor may practise: the flag of the country being
    browsed, or their approved countries when browsing all. The country name
    shows on hover.

    @include('partials.doctor-practice-countries', ['doctor' => $doctor, 'country' => $country])
--}}
@php
    $codes = $country ? [$country] : array_slice(\App\Services\DoctorDirectory::approvedCountries($doctor), 0, 3);
@endphp
@if ($codes)
    <div class="d-flex flex-wrap align-items-center gap-1 my-1">
        @foreach ($codes as $code)
            @php
                $label = str_replace(
                    ':country',
                    \App\Services\DoctorDirectory::countryName($code),
                    __('app.doctor_country_filter.practices_in'),
                );
            @endphp
            <span class="practice-flag" tabindex="0" aria-label="{{ $label }}" data-label="{{ $label }}">
                <img src="https://flagcdn.com/24x18/{{ strtolower($code) }}.png" alt="" width="24"
                    height="18">
            </span>
        @endforeach
    </div>
@endif

@once
    <style>
        .practice-flag {
            position: relative;
            display: inline-flex;
            line-height: 0;
            cursor: default;
        }

        /* Card styles size every img inside them; keep the flag small. */
        .practice-flag img {
            width: 24px !important;
            height: 18px !important;
            max-width: none !important;
            border-radius: 3px !important;
            object-fit: cover;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .08);
        }

        .practice-flag::after {
            content: attr(data-label);
            position: absolute;
            bottom: calc(100% + 6px);
            left: 50%;
            transform: translateX(-50%);
            padding: .3rem .55rem;
            border-radius: .375rem;
            background: #141414;
            color: #fff;
            font-size: 12px;
            line-height: 1.3;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .15s;
            z-index: 10;
        }

        .practice-flag:hover::after,
        .practice-flag:focus-visible::after {
            opacity: 1;
            visibility: visible;
        }
    </style>
@endonce
