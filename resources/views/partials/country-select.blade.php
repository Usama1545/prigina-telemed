{{--
    A country dropdown (ISO 3166 alpha-2 codes, names in the visitor's language).

    @include('partials.country-select', [
        'name' => 'countryOfResidence',
        'id' => 'countryOfResidence',
        'selected' => 'GH',
        'required' => true,
        'placeholder' => __('app.country_of_residence.select'),
    ])
--}}
@php
    $countryNames = \Symfony\Component\Intl\Countries::getNames(app()->getLocale());
    $selected = strtoupper((string) ($selected ?? ''));
@endphp
<select name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control {{ $class ?? '' }}" @if ($required ?? false) required @endif>
    <option value="">{{ $placeholder ?? '' }}</option>
    @foreach ($countryNames as $code => $countryName)
        <option value="{{ $code }}" @selected($selected === $code)>{{ $countryName }}</option>
    @endforeach
</select>
