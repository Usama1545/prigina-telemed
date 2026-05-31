<?php $page = 'privacy-policy'; ?>
@extends('layouts.mainlayout')

@section('content')
    @component('components.breadcrumb', [
        'li_1' => 'Terms & Conditions',
        'li_2' => 'Terms & Conditions',
        'title' => 'Terms & Conditions',
    ])
    @endcomponent

    <!-- Terms -->
    <div class="terms-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Header -->
                    <div class="terms-text mb-4">
                        <h2 class="text-primary fw-bold">Terms and Conditions for Patients</h2>
                        <p class="mb-1">(Second Opinion Telemedicine Services)</p>
                        <p><strong>Effective Date:</strong> April 1, 2026</p>

                        <p>
                            Welcome to PriGina Global TeleMed (“PriGina,” “we,” “our,” or “us”).
                            By accessing or using our platform, website, or mobile application, you agree to the following
                            Terms and Conditions.
                        </p>

                        <p>If you do not agree, please do not use our services.</p>
                    </div>

                    <!-- 1 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">1. Nature of Services</h5>
                        <p>PriGina Global TeleMed provides medical second opinion consultations only.</p>
                        <p>We do not:</p>
                        <ul>
                            <li>Provide emergency medical care</li>
                            <li>Replace your primary physician</li>
                            <li>Prescribe medications (unless explicitly stated and legally permitted)</li>
                            <li>Establish ongoing physician–patient treatment relationships</li>
                        </ul>
                        <p>
                            Our service is limited to reviewing medical records and providing professional medical opinions
                            for informational purposes.
                        </p>
                    </div>

                    <!-- 2 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">2. Not for Emergencies</h5>
                        <p><strong>PriGina Global TeleMed is NOT an emergency service.</strong></p>
                        <p>If you are experiencing a medical emergency, call:</p>
                        <ul>
                            <li>911 (United States)</li>
                            <li>Your local emergency number</li>
                            <li>Visit the nearest emergency room immediately</li>
                        </ul>
                        <p>Do not use this platform for urgent or life-threatening conditions.</p>
                    </div>

                    <!-- 3 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">3. No Replacement of Primary Care</h5>
                        <ul>
                            <li>Opinions are advisory in nature</li>
                            <li>Should be discussed with your treating physician</li>
                            <li>Do not replace in-person medical evaluation</li>
                        </ul>
                        <p>You remain responsible for your medical decisions and ongoing treatment.</p>
                    </div>

                    <!-- 4 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">4. Eligibility</h5>
                        <ul>
                            <li>You must be at least 18 years old (or have legal guardian consent)</li>
                            <li>You must provide accurate and complete medical information</li>
                            <li>You must upload relevant medical records when requested</li>
                        </ul>
                        <p>
                            Providing false or incomplete information may impact the accuracy of your second opinion.
                        </p>
                    </div>

                    <!-- 5 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">5. Cross-Border and Licensing Limitations</h5>
                        <ul>
                            <li>Physicians may be licensed in specific countries or states</li>
                            <li>Services are limited to advisory review</li>
                            <li>Regulatory rules may differ by country</li>
                        </ul>
                        <p>We do not guarantee regulatory recognition of opinions in your jurisdiction.</p>
                    </div>

                    <!-- 6 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">6. No Guaranteed Outcomes</h5>
                        <ul>
                            <li>Diagnosis confirmation</li>
                            <li>Treatment success</li>
                            <li>Specific medical outcomes</li>
                        </ul>
                        <p>All medical opinions are based solely on information provided by you.</p>
                    </div>

                    <!-- 7 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">7. Payment Terms</h5>
                        <ul>
                            <li>Payment is required prior to consultation</li>
                            <li>Fees are non-refundable once medical review has begun</li>
                            <li>Prices may vary based on case complexity</li>
                        </ul>
                        <p>All payments are processed through secure third-party providers.</p>
                    </div>

                    <!-- 8 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">8. Privacy & Data Protection</h5>
                        <ul>
                            <li>Encrypted during transmission</li>
                            <li>Stored securely</li>
                            <li>Shared only with authorized medical professionals</li>
                        </ul>
                        <p>Please review our Privacy Policy for full details.</p>
                    </div>

                    <!-- 9 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">9. Limitation of Liability</h5>
                        <p>To the fullest extent permitted by law:</p>
                        <p>
                            PriGina Global TeleMed and its physicians shall not be liable for:
                        </p>
                        <ul>
                            <li>Decisions made based on second opinions</li>
                            <li>Delays in treatment</li>
                            <li>Indirect or consequential damages</li>
                            <li>Outcomes resulting from incomplete patient information</li>
                        </ul>
                        <p>You assume full responsibility for decisions made using our advisory services.</p>
                    </div>

                    <!-- 10 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">10. Intellectual Property</h5>
                        <ul>
                            <li>Copy</li>
                            <li>Distribute</li>
                            <li>Reproduce</li>
                            <li>Modify</li>
                        </ul>
                        <p>Without written consent.</p>
                    </div>

                    <!-- 11 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">11. Termination of Access</h5>
                        <ul>
                            <li>Terms are violated</li>
                            <li>Misuse of platform occurs</li>
                            <li>Fraudulent activity is detected</li>
                        </ul>
                    </div>

                    <!-- 12 -->
                    <div class="terms-text mb-4">
                        <h5 class="text-primary fw-bold">12. Governing Law</h5>
                        <p>New Jersey, United States</p>
                    </div>

                    <!-- 13 -->
                    <div class="terms-text">
                        <h5 class="text-primary fw-bold">13. Updates to Terms</h5>
                        <p>
                            We may update these Terms at any time. Continued use of the platform constitutes acceptance of
                            revised Terms.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Terms -->
@endsection
