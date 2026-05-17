<?php $page = 'legal-notice'; ?>
@extends('layouts.mainlayout')

@section('content')

@component('components.breadcrumb', ['li_1' => 'Legal Notice', 'li_2' => 'Legal Notice', 'title' => 'Legal Notice'])
@endcomponent

<!-- Legal Notice -->
<div class="terms-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Header -->
                <div class="terms-text mb-4">
                    <h2 class="text-primary fw-bold">Legal Notice</h2>

                    <p>
                        PriGina Global Telemed is a USA-registered limited liability company (LLC) operating under PriGina Legacy Group LLC. The platform provides independent medical second-opinion services designed to support informed healthcare decisions for patients globally.
                    </p>

                    <p>
                        The information, recommendations, and medical opinions provided through this platform are intended for informational, educational, and consultative purposes only and should not replace in-person medical evaluation, diagnosis, treatment, or emergency medical care.
                    </p>

                    <p>
                        Use of this platform does not establish a physician-patient relationship except where expressly recognized under applicable laws and regulations within a physician's licensed jurisdiction.
                    </p>

                    <p>
                        All medical opinions are based solely on the records, history, and information submitted by the patient. PriGina Global Telemed does not guarantee diagnostic accuracy, treatment outcomes, or medical results.
                    </p>

                    <p>
                        This platform is not intended for emergency medical situations. If you are experiencing a medical emergency, contact your local emergency services immediately.
                    </p>

                    <p>
                        Patients are strongly encouraged to continue working with their local licensed healthcare providers before making healthcare decisions or changes to treatment plans.
                    </p>

                    <p>
                        All content, branding, platform materials, logos, and intellectual property associated with PriGina Global Telemed are protected under applicable United States and international intellectual property laws.
                    </p>

                    <p>
                        By accessing or using this platform, you acknowledge and agree to our Terms &amp; Conditions, Privacy Policy, and Risk Disclaimer.
                    </p>

                    <p>
                        &copy; 2026 PriGina Global Telemed LLC. All rights reserved.<br>
                        USA Registered LLC. Healthcare Without Borders.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /Legal Notice -->

@endsection
