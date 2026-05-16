<?php $page = 'terms-conditions'; ?>
@extends('layouts.mainlayout')

@section('content')

@component('components.breadcrumb', ['li_1' => 'Terms & Conditions', 'li_2' => 'Terms & Conditions', 'title' => 'Terms & Conditions'])
@endcomponent

<!-- Terms -->
<div class="terms-section py-5">
    <div class="container">

        <!-- Header -->
        <div class="terms-text mb-4">
            <h2 class="text-primary fw-bold">PHYSICIAN TERMS & CONDITIONS</h2>
            <p class="mb-1">(Second Opinion Services Agreement)</p>
            <p><strong>Effective Date:</strong> May 1, 2026</p>

            <p>
                These Terms & Conditions (“Agreement”) govern the participation of physicians (“Physician”) providing second opinion services through PriGina Global Telemed (“Company”).
            </p>

            <p>
                By enrolling as a Physician on the platform, you agree to the following:
            </p>
        </div>

        <!-- 1 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">1. Nature of Services</h5>
            <p>PriGina Global Telemed provides independent medical second opinion consultations only.</p>
            <p>Services do NOT constitute:</p>
            <ul>
                <li>Establishment of a primary physician–patient relationship</li>
                <li>Ongoing medical management</li>
                <li>Emergency care</li>
                <li>Prescribing authority (unless explicitly authorized by jurisdiction)</li>
            </ul>
            <p>
                All consultations are advisory in nature and based solely on the information provided by the patient.
            </p>
        </div>

        <!-- 2 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">2. Physician Eligibility Requirements</h5>
            <ul>
                <li>Active, unrestricted medical license in practicing jurisdiction</li>
                <li>Board certification or equivalent qualifications (where applicable)</li>
                <li>Active malpractice insurance coverage</li>
                <li>Good professional standing with no disciplinary actions</li>
                <li>Provide proof of identity and credentials upon request</li>
            </ul>
            <p>The Company reserves the right to verify credentials at any time.</p>
        </div>

        <!-- 3 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">3. Scope of Responsibility</h5>
            <p>The Physician agrees to:</p>
            <ul>
                <li>Provide professional, evidence-based medical opinions</li>
                <li>Review submitted medical records thoroughly</li>
                <li>Clearly document recommendations</li>
                <li>Identify limitations due to incomplete information</li>
                <li>Advise follow-up with treating physician</li>
            </ul>

            <p class="mt-2">The Physician shall not:</p>
            <ul>
                <li>Provide emergency instructions beyond advising immediate local care</li>
                <li>Initiate long-term management</li>
                <li>Guarantee outcomes</li>
                <li>Misrepresent credentials</li>
            </ul>
        </div>

        <!-- 4 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">4. No Emergency Services</h5>
            <p>PriGina Global Telemed is NOT an emergency service.</p>
            <p>Physicians must advise patients to seek immediate local care if:</p>
            <ul>
                <li>There is imminent danger</li>
                <li>Symptoms suggest life-threatening conditions</li>
            </ul>
        </div>

        <!-- 5 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">5. Licensing & Jurisdiction</h5>
            <ul>
                <li>Services must comply with local jurisdiction laws</li>
                <li>Understand telemedicine regulations</li>
                <li>Comply with cross-border consultation rules</li>
            </ul>
            <p>The Company does not guarantee regulatory clearance in all countries.</p>
        </div>

        <!-- 6 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">6. Independent Contractor Status</h5>
            <p>Physicians are independent contractors and not employees.</p>
            <ul>
                <li>Company does not control clinical judgment</li>
                <li>No supervision of medical decisions</li>
                <li>Company not responsible for malpractice</li>
            </ul>
        </div>

        <!-- 7 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">7. Compensation</h5>
            <ul>
                <li>Defined in separate compensation schedule</li>
                <li>Payment after consultation completion</li>
                <li>Must comply with platform policies</li>
                <li>Physician responsible for taxes and expenses</li>
            </ul>
        </div>

        <!-- 8 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">8. Medical Documentation</h5>
            <ul>
                <li>All consultations documented within platform</li>
                <li>Include records summary</li>
                <li>Clinical impression</li>
                <li>Evidence-based recommendations</li>
                <li>Limitations statement</li>
            </ul>
            <p>Must comply with HIPAA and international standards.</p>
        </div>

        <!-- 9 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">9. Confidentiality & HIPAA Compliance</h5>
            <ul>
                <li>Maintain strict confidentiality</li>
                <li>Use secure systems only</li>
                <li>Avoid storing data on personal devices</li>
                <li>No unauthorized sharing</li>
            </ul>
            <p>Violation may result in termination.</p>
        </div>

        <!-- 10 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">10. Professional Conduct</h5>
            <ul>
                <li>Maintain respectful communication</li>
                <li>No discriminatory behavior</li>
                <li>Follow ethical medical standards</li>
                <li>Avoid conflicts of interest</li>
            </ul>
        </div>

        <!-- 11 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">11. Limitation of Liability</h5>
            <p>The Company provides a technology platform only.</p>
            <ul>
                <li>Not liable for physician decisions</li>
                <li>Not responsible for outcomes</li>
                <li>Not responsible for incomplete patient data</li>
            </ul>
            <p>Physicians are responsible for their own liability.</p>
        </div>

        <!-- 12 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">12. Termination</h5>
            <ul>
                <li>Breach of terms</li>
                <li>Loss of license</li>
                <li>Ethical violations</li>
                <li>Patient safety concerns</li>
            </ul>
        </div>

        <!-- 13 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">13. Indemnification</h5>
            <p>
                Physician agrees to indemnify and hold harmless PriGina Global Telemed from claims related to negligence, misrepresentation, or legal violations.
            </p>
        </div>

        <!-- 14 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">14. Amendments</h5>
            <p>
                Terms may be updated at any time. Continued participation constitutes acceptance.
            </p>
        </div>

        <!-- 15 -->
        <div class="terms-text mb-4">
            <h5 class="text-primary fw-bold">15. Governing Law</h5>
            <p>[Insert State – e.g., Delaware or New Jersey]</p>
        </div>

        <!-- Acknowledgment -->
        <div class="terms-text">
            <h5 class="text-primary fw-bold">Acknowledgment</h5>
            <p>
                By joining PriGina Global Telemed, the Physician confirms understanding and acceptance of these Terms & Conditions.
            </p>
        </div>

    </div>
</div>
<!-- /Terms -->

@endsection