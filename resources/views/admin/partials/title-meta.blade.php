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
            return in_array($word, $acronyms)
                ? strtoupper($word)
                : ucfirst($word);
        }, $parts);

        // final title
        $title = implode(' ', $formatted_parts);
    }
@endphp

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="keywords" content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
    <meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
    <meta property="og:url" content="https://doccure.dreamstechnologies.com/html/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta property="og:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta property="og:image" content="{{URL::asset('build/admin/img/logo.png')}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://doccure.dreamstechnologies.com/html/">
    <meta property="twitter:url" content="https://doccure.dreamstechnologies.com/html/">
    <meta name="twitter:title" content="Doctors Appointment HTML Website Templates | Doccure">
    <meta name="twitter:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
    <meta name="twitter:image" content="{{URL::asset('build/admin/img/logo.png')}}">
    <title>Doccure - {{ $title }}</title>
