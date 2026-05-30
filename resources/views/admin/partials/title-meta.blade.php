@php
    $filename = str_replace('admin.', '', Route::currentRouteName() ?? 'index'); // get current admin route name

    // Acronyms to force uppercase
    $acronyms = ['faq', 'otp', 'rtl'];

    if (in_array($filename, ['index', 'index-page'])) {
        $title = 'Admin Dashboard';
    } else {
        // convert route name to words
        $parts = explode('-', strtolower($filename));

        // format words
        $formatted_parts = array_map(function ($word) use ($acronyms) {
            return in_array($word, $acronyms) ? strtoupper($word) : ucfirst($word);
        }, $parts);

        // final title
        $title = implode(' ', $formatted_parts);
    }
@endphp

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="PriGina Global Telemed | Trusted Second Medical Opinions Online">
<meta name="keywords"
    content="doctor appointment, doctor booking, doctor online appointment booking, second medical opinions">
<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
<meta property="og:type" content="website">

<meta property="og:title" content="PriGina Global Telemed | Trusted Second Medical Opinions Online">

<meta property="og:description"
    content="Connect with experienced doctors worldwide and receive trusted second medical opinions online through secure telemedicine consultations.">

<meta property="og:image" content="{{ asset('build/img/logo.webp') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Doctors Appointment  | Doccure">
<meta name="twitter:description"
    content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
<meta name="twitter:image" content="{{ URL::asset('build/admin/img/logo.png') }}">
<title>Doccure - {{ $title }}</title>
