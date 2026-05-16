<?php $page = 'privacy-policy'; ?>
@extends('layouts.mainlayout')

@section('content')

@component('components.breadcrumb', ['li_1' => 'Risk Disclaimer', 'li_2' => 'Risk Disclaimer', 'title' => 'Risk Disclaimer'])
@endcomponent

<!-- Risk Disclaimer -->
<div class="terms-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Header -->
                <div class="terms-text mb-4">
                    <h2 class="text-primary fw-bold">TELEMEDICINE RISK DISCLAIMER</h2>

                    <p>
                        <strong>Effective Date:</strong> May 1, 2026
                    </p>

                    <p>
                        PriGina Global Telemed provides independent medical second opinions through secure telecommunication technology.
                        By using this platform (as a physician or patient), you acknowledge and accept the inherent risks and limitations described below.
                    </p>
                </div>

                <!-- 1 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">1. Nature of Services</h5>

                    <p>
                        PriGina Global Telemed provides second opinion consultations only.
                    </p>

                    <p>Our services:</p>

                    <ul>
                        <li>Do NOT replace your primary treating physician</li>
                        <li>Do NOT establish an ongoing doctor–patient relationship</li>
                        <li>Do NOT provide emergency care</li>
                        <li>Do NOT guarantee diagnosis or treatment outcomes</li>
                        <li>Are based solely on information submitted by the patient</li>
                    </ul>

                    <p>
                        All recommendations are advisory in nature.
                    </p>
                </div>

                <!-- 2 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">2. Limitations of Telemedicine</h5>

                    <p>
                        Telemedicine services involve inherent limitations, including:
                    </p>

                    <ul>
                        <li>No physical examination</li>
                        <li>Reliance on uploaded records and patient-reported history</li>
                        <li>Possible incomplete or inaccurate information</li>
                        <li>Inability to perform immediate diagnostic testing</li>
                        <li>Limited ability to assess non-verbal or subtle clinical findings</li>
                    </ul>

                    <p>
                        As a result, conclusions may differ from in-person evaluations.
                    </p>
                </div>

                <!-- 3 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">3. Technology Risks</h5>

                    <p>
                        Use of telemedicine technology carries potential risks, including:
                    </p>

                    <ul>
                        <li>Technical failures</li>
                        <li>Connectivity interruptions</li>
                        <li>Data transmission delays</li>
                        <li>Unauthorized access despite security safeguards</li>
                    </ul>

                    <p>
                        While PriGina Global Telemed implements encryption and security measures, no system is entirely risk-free.
                    </p>
                </div>

                <!-- 4 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">4. No Emergency Services</h5>

                    <p>
                        PriGina Global Telemed is NOT intended for emergencies.
                    </p>

                    <p>If a patient experiences:</p>

                    <ul>
                        <li>Chest pain</li>
                        <li>Severe shortness of breath</li>
                        <li>Stroke symptoms</li>
                        <li>Severe bleeding</li>
                        <li>Sudden neurological changes</li>
                        <li>Any life-threatening condition</li>
                    </ul>

                    <p>
                        They must immediately seek local emergency medical care.
                    </p>

                    <p>
                        Physicians on this platform are instructed to direct patients to emergency services when necessary.
                    </p>
                </div>

                <!-- 5 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">5. Jurisdictional & Cross-Border Risks</h5>

                    <p>
                        Consultations may involve physicians and patients located in different states or countries.
                    </p>

                    <p>Risks include:</p>

                    <ul>
                        <li>Differences in medical standards</li>
                        <li>Variations in treatment guidelines</li>
                        <li>Regulatory differences</li>
                        <li>Medication availability differences</li>
                    </ul>

                    <p>
                        Patients are responsible for consulting their local treating physician before making changes to care.
                    </p>
                </div>

                <!-- 6 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">6. No Guarantee of Outcome</h5>

                    <p>
                        Medical opinions are based on available information and current medical knowledge.
                    </p>

                    <p>
                        PriGina Global Telemed and its physicians:
                    </p>

                    <ul>
                        <li>Do not guarantee diagnostic accuracy</li>
                        <li>Do not guarantee treatment success</li>
                        <li>Are not responsible for decisions made without consulting a local provider</li>
                    </ul>
                </div>

                <!-- 7 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">7. Independent Contractor Physicians</h5>

                    <p>
                        All physicians on PriGina Global Telemed are independent contractors.
                    </p>

                    <p>
                        PriGina Global Telemed:
                    </p>

                    <ul>
                        <li>Does not control clinical decision-making</li>
                        <li>Does not supervise medical judgments</li>
                        <li>Is not responsible for individual physician malpractice</li>
                    </ul>

                    <p>
                        Each physician is solely responsible for their professional advice.
                    </p>
                </div>

                <!-- 8 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">8. Patient Responsibility</h5>

                    <p>Patients agree to:</p>

                    <ul>
                        <li>Provide accurate and complete medical information</li>
                        <li>Upload relevant medical records</li>
                        <li>Disclose medications and allergies</li>
                        <li>Follow up with their local healthcare provider</li>
                    </ul>

                    <p>
                        Failure to provide accurate information may impact the quality of the opinion received.
                    </p>
                </div>

                <!-- 9 -->
                <div class="terms-text mb-4">
                    <h5 class="text-primary fw-bold">9. Limitation of Liability</h5>

                    <p>
                        To the fullest extent permitted by law:
                    </p>

                    <p>
                        PriGina Global Telemed, its parent company (PriGina Legacy Group), affiliates, officers, and representatives shall not be liable for:
                    </p>

                    <ul>
                        <li>Clinical decisions made by independent physicians</li>
                        <li>Outcomes resulting from reliance on second opinions</li>
                        <li>Technology-related interruptions</li>
                        <li>Indirect, incidental, or consequential damages</li>
                    </ul>

                    <p>
                        Use of this platform is voluntary and at the user’s own risk.
                    </p>
                </div>

                <!-- 10 -->
                <div class="terms-text">
                    <h5 class="text-primary fw-bold">10. Acknowledgment of Risk</h5>

                    <p>
                        By using PriGina Global Telemed, you acknowledge:
                    </p>

                    <ul>
                        <li>You understand the risks and limitations of telemedicine</li>
                        <li>You understand this is a second opinion service only</li>
                        <li>You accept the inherent limitations of virtual consultation</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /Risk Disclaimer -->

@endsection