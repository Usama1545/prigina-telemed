<?php $page = 'our-mission'; ?>
@extends('layouts.mainlayout')

@section('content')

@component('components.breadcrumb', ['li_1' => 'Our Mission', 'li_2' => 'Our Mission', 'title' => 'Our Mission'])
@endcomponent

<!-- Our Mission -->
<div class="terms-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Header -->
                <div class="terms-text mb-4">
                    <h2 class="text-primary fw-bold">Our Mission</h2>

                    <p>
                        At PriGina Global Telemed, our mission is to make trusted expert medical second opinions accessible across borders through secure, compassionate, and technology-driven healthcare solutions.
                    </p>

                    <p>
                        We are committed to connecting patients with qualified medical professionals worldwide, empowering individuals and families to make informed healthcare decisions with greater clarity and confidence.
                    </p>

                    <p>
                        Through innovation, professionalism, and patient-centered care, we strive to bridge gaps in global healthcare access while maintaining privacy, integrity, and excellence in every consultation.
                    </p>

                    <p>
                        Our platform is built for people who need guidance beyond borders, whether they are seeking reassurance, exploring treatment options, or better understanding a complex diagnosis.
                    </p>

                    <p>
                        We believe every patient deserves respectful communication, secure handling of medical information, and access to expert insight that supports their relationship with local healthcare providers.
                    </p>

                    <p>
                        <strong>Healthcare Without Borders.</strong>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /Our Mission -->

@endsection
