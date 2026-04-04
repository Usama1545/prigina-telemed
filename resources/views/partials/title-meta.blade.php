@php
    $filename = Route::currentRouteName(); // get current route name

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
        $title = 'General Home PriGina Global Telemed | Doctors Appointment HTML Website Templates';
    } else {
        $title = 'PriGina Global Telemed';
    }
@endphp

<!-- Meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description"
    content="The responsive professional PriGina Global Telemed template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
<meta name="keywords"
    content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
<meta property="og:url" content="https://doccure.dreamstechnologies.com/html/">
<meta property="og:type" content="website">
<meta property="og:title" content="Doctors Appointment HTML Website Templates | PriGina Global Telemed">
<meta property="og:description"
    content="The responsive professional PriGina Global Telemed template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
<meta property="og:image" content="{{ URL::asset('build/img/preview-banner.jpg') }}">
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="https://doccure.dreamstechnologies.com/html/">
<meta property="twitter:url" content="https://doccure.dreamstechnologies.com/html/">
<meta name="twitter:title" content="Doctors Appointment HTML Website Templates | PriGina Global Telemed">
<meta name="twitter:description"
    content="The responsive professional PriGina Global Telemed template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
<meta name="twitter:image" content="{{ URL::asset('build/img/preview-banner.jpg') }}">
<title>{{ $title }}</title>
