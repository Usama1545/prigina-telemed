@php
    $filename = Route::currentRouteName();

    if (
        $filename == 'index' ||
        $filename === 'index-2' ||
        $filename === 'index-3' ||
        $filename === 'index-4' ||
        $filename === 'index-5' ||
        $filename === 'index-6' ||
        $filename === 'index-7' ||
        $filename === 'index-8' ||
        $filename === 'index-9' ||
        $filename === 'index-10' ||
        $filename === 'index-11' ||
        $filename === 'index-12' ||
        $filename === 'index-13'
    ) {
        $title = 'PriGina Global Telemed | Trusted Second Medical Opinions Online';
    } else {
        $title = 'PriGina Global Telemed';
    }
@endphp

<!-- Meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description"
    content="PriGina Global Telemed helps patients connect with experienced doctors worldwide to receive trusted second medical opinions online through secure telemedicine consultations.">

<meta name="keywords"
    content="second medical opinion, telemedicine, online doctor consultation, global healthcare, specialist consultation, virtual doctor, medical second opinion, healthcare platform">

<meta name="author"
    content="PriGina Global Telemed">

<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">

<meta property="og:title"
    content="PriGina Global Telemed | Trusted Second Medical Opinions Online">

<meta property="og:description"
    content="Connect with experienced doctors worldwide and receive trusted second medical opinions online through secure telemedicine consultations.">

<meta property="og:image"
    content="{{ URL::asset('build/img/logo.webp') }}">

<meta name="twitter:card" content="summary_large_image">

<meta property="twitter:domain"
    content="{{ request()->getHost() }}">

<meta property="twitter:url"
    content="{{ url()->current() }}">

<meta name="twitter:title"
    content="PriGina Global Telemed | Trusted Second Medical Opinions Online">

<meta name="twitter:description"
    content="Get expert second medical opinions online from qualified doctors through secure and reliable telemedicine services.">

<meta name="twitter:image"
    content="{{ URL::asset('build/img/logo.webp') }}">

<title>{{ $title }}</title>