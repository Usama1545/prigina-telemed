<?php $page = 'privacy-policy'; ?>
@extends('layouts.mainlayout')

@section('content')

@component('components.breadcrumb', ['li_1' => 'Privacy Policy', 'li_2' => 'Privacy Policy'])
@endcomponent

<!-- Privacy Policy -->
<div class="terms-section py-5">
    <div class="container">

        <div class="terms-text mb-4">
            <h2 class="text-primary fw-bold">Privacy Policy</h2>
            <p class="mb-1">(Second Opinion Telemedicine Services)</p>
            <p class="mb-0"><strong>Effective Date:</strong> May 1, 2026</p>
            <p><strong>Last Updated:</strong> June 1, 2026</p>
        </div>

        <div class="terms-text mb-4">
            <p>
                PriGina Global TeleMed (“PriGina,” “we,” “our,” or “us”) is committed to protecting your privacy and safeguarding your personal and medical information.
            </p>
            <p>
                This Privacy Policy explains how we collect, use, disclose, and protect your information when you use our website, mobile application, and second-opinion telemedicine services.
            </p>
            <p>
                By using our services, you agree to this Privacy Policy.
            </p>
        </div>

        <!-- 1 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">1. Information We Collect</h5>
            <p>We may collect the following categories of information:</p>

            <p class="fw-bold mt-3">A. Personal Information</p>
            <ul>
                <li>Full name</li>
                <li>Date of birth</li>
                <li>Gender</li>
                <li>Address</li>
                <li>Email address</li>
                <li>Phone number</li>
                <li>Government-issued identification (if required)</li>
            </ul>

            <p class="fw-bold mt-3">B. Health & Medical Information (Protected Health Information – PHI)</p>
            <ul>
                <li>Medical history</li>
                <li>Lab results</li>
                <li>Imaging reports</li>
                <li>Diagnoses</li>
                <li>Medication history</li>
                <li>Uploaded medical documents</li>
                <li>Physician reports</li>
            </ul>

            <p class="fw-bold mt-3">C. Technical & Usage Information</p>
            <ul>
                <li>IP address</li>
                <li>Device information</li>
                <li>Browser type</li>
                <li>App usage data</li>
                <li>Log files</li>
                <li>Cookies</li>
            </ul>
        </div>

        <!-- 2 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">2. How We Use Your Information</h5>
            <ul>
                <li>Provide medical second opinion services</li>
                <li>Review and analyze medical records</li>
                <li>Communicate with you regarding your consultation</li>
                <li>Improve platform functionality</li>
                <li>Comply with legal and regulatory obligations</li>
                <li>Prevent fraud and misuse</li>
            </ul>
            <p><strong>We do NOT sell your medical information.</strong></p>
        </div>

        <!-- 3 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">3. HIPAA Compliance (If Operating in the U.S.)</h5>
            <p>
                If you are located in the United States, your Protected Health Information (PHI) is handled in accordance with the Health Insurance Portability and Accountability Act (HIPAA).
            </p>

            <ul>
                <li>Administrative safeguards</li>
                <li>Technical safeguards</li>
                <li>Physical safeguards</li>
                <li>Encrypted data transmission</li>
                <li>Secure cloud storage</li>
                <li>Access controls</li>
            </ul>

            <p>
                Where required, we enter into Business Associate Agreements (BAAs) with service providers.
            </p>
        </div>

        <!-- 4 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">4. Cross-Border Data Transfers</h5>
            <ul>
                <li>Your data may be processed in countries outside your country of residence</li>
                <li>Data protection laws may differ between jurisdictions</li>
            </ul>
            <p>We take reasonable measures to ensure appropriate safeguards are in place.</p>
        </div>

        <!-- 5 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">5. Information Sharing & Disclosure</h5>

            <p class="fw-bold">A. With Licensed Physicians</p>
            <p>Only for the purpose of providing your medical second opinion.</p>

            <p class="fw-bold">B. With Service Providers</p>
            <ul>
                <li>Payment processing</li>
                <li>Cloud hosting</li>
                <li>Technical support</li>
                <li>Secure messaging systems</li>
            </ul>

            <p class="fw-bold">C. When Required by Law</p>
            <ul>
                <li>Comply with court orders</li>
                <li>Respond to lawful government requests</li>
                <li>Prevent fraud or illegal activity</li>
            </ul>

            <p><strong>We do not sell or rent your data.</strong></p>
        </div>

        <!-- 6 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">6. Data Security</h5>
            <ul>
                <li>End-to-end encryption</li>
                <li>Secure socket layer (SSL) technology</li>
                <li>Role-based access controls</li>
                <li>Multi-factor authentication</li>
                <li>Regular security audits</li>
            </ul>
            <p>However, no system is 100% secure. You use the platform at your own risk.</p>
        </div>

        <!-- 7 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">7. Data Retention</h5>
            <ul>
                <li>For as long as necessary to provide services</li>
                <li>As required by medical record retention laws</li>
                <li>As required for regulatory compliance</li>
            </ul>
            <p>You may request deletion of your account, subject to legal retention requirements.</p>
        </div>

        <!-- 8 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">8. Your Rights</h5>
            <ul>
                <li>Access your personal information</li>
                <li>Request correction of inaccurate data</li>
                <li>Request deletion (subject to legal limits)</li>
                <li>Withdraw consent</li>
                <li>Request a copy of your records</li>
            </ul>
            <p>Contact us at: <strong>[Insert Privacy Email]</strong></p>
        </div>

        <!-- 9 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">9. Children’s Privacy</h5>
            <ul>
                <li>Services are intended for individuals 18+</li>
                <li>For minors, a legal guardian must provide consent</li>
                <li>Guardian information may be required</li>
            </ul>
        </div>

        <!-- 10 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">10. Cookies & Tracking Technologies</h5>
            <ul>
                <li>Improve user experience</li>
                <li>Analyze traffic</li>
                <li>Enhance security</li>
            </ul>
            <p>You may disable cookies in your browser settings.</p>
        </div>

        <!-- 11 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">11. Third-Party Links</h5>
            <p>We are not responsible for the privacy practices of external websites.</p>
        </div>

        <!-- 12 -->
        <div class="terms-text">
            <h5 class="text-primary fw-bold">12. Changes to This Privacy Policy</h5>
            <p>
                We reserve the right to update this Privacy Policy at any time.
            </p>
            <p>
                Changes will be posted on this page with a revised “Last Updated” date.
            </p>
            <p>
                Continued use of the platform constitutes acceptance of updates.
            </p>
        </div>

    </div>
</div>
<!-- /Privacy Policy -->

@endsection