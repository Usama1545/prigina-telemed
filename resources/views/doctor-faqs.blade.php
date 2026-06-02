<?php $page = 'faq'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'FAQ', 'li_2' => 'FAQ', 'title' => 'Doctor FAQ'])
    @endcomponent

    @php
        $faqs = [
            [
                'question' => 'What is PriGina Global Telemed?',
                'answer' =>
                    'PriGina Global Telemed is a global telemedicine platform that connects patients with qualified physicians for virtual consultations and medical second opinions. Our mission is to make quality healthcare accessible worldwide through secure digital technology.',
            ],
            [
                'question' => 'Who can join PriGina Global Telemed as a doctor?',
                'answer' =>
                    'Licensed physicians, specialists, consultants, and healthcare professionals who meet our credentialing and verification requirements may apply to join the platform.',
            ],
            [
                'question' => 'What specialties are accepted?',
                'answer' => 'We welcome doctors from a wide range of specialties, including but not limited to:',
                'list' => [
                    'Internal Medicine',
                    'Family Medicine',
                    'Pediatrics',
                    'Cardiology',
                    'Neurology',
                    'Psychiatry',
                    'Dermatology',
                    'Obstetrics & Gynecology',
                    'Surgery',
                    'Endocrinology',
                    'Oncology',
                    'Emergency Medicine',
                ],
            ],
            [
                'question' => 'How do I apply to become a PriGina doctor?',
                'answer' =>
                    'Simply complete the Doctor Registration form, submit your professional credentials, medical license information, government-issued identification, and any required supporting documents for verification.',
            ],
            [
                'question' => 'What documents are required during onboarding?',
                'answer' => 'You may be asked to provide:',
                'list' => [
                    'Current medical license',
                    'Government-issued photo ID',
                    'Curriculum Vitae (CV)',
                    'Board certifications (if applicable)',
                    'Proof of specialty training',
                    'Professional photograph',
                    'Bank account details for payouts',
                ],
            ],
            [
                'question' => 'How long does the verification process take?',
                'answer' =>
                    'Verification timelines vary depending on the country and licensing authority. Most applications are reviewed within a few business days once all required documents are submitted.',
            ],
            [
                'question' => 'Can I choose my consultation hours?',
                'answer' =>
                    'Yes. PriGina allows doctors to set their own availability, consultation schedules, and working hours.',
            ],
            [
                'question' => 'Can I work from any country?',
                'answer' =>
                    'Yes. Doctors may provide services from their country of residence, provided they comply with applicable professional, legal, and regulatory requirements.',
            ],
            [
                'question' => 'How are patients assigned?',
                'answer' =>
                    'Patients may browse doctor profiles and book directly based on specialty, expertise, availability, language preferences, and consultation fees.',
            ],
            [
                'question' => 'Can I set my own consultation fees?',
                'answer' =>
                    'Depending on platform policies, doctors may be able to set or select consultation rates within approved pricing structures.',
            ],
            [
                'question' => 'How do I get paid?',
                'answer' =>
                    'Payments are processed securely through the platform. Earnings are transferred to your designated payment account according to the payout schedule outlined in your provider agreement.',
            ],
            [
                'question' => 'When are payouts made?',
                'answer' =>
                    'Payout schedules vary by region and payment method. Details are provided during onboarding and available in the provider dashboard.',
            ],
            [
                'question' => 'What technology do I need?',
                'answer' => 'Doctors typically need:',
                'list' => [
                    'Reliable internet connection',
                    'Computer, tablet, or smartphone',
                    'Webcam and microphone',
                    'Secure private location for consultations',
                ],
            ],
            [
                'question' => 'Are consultations recorded?',
                'answer' =>
                    'Consultation recording policies depend on local regulations, patient consent requirements, and platform policies. Doctors will be informed of applicable rules.',
            ],
            [
                'question' => 'Is patient information secure?',
                'answer' =>
                    'Yes. PriGina Global Telemed uses secure systems designed to protect patient confidentiality and medical information.',
            ],
            [
                'question' => 'Can I prescribe medications through the platform?',
                'answer' =>
                    'Prescription authority depends on local laws, licensing regulations, and the jurisdiction where the patient is located. Doctors are responsible for practicing within applicable legal requirements.',
            ],
            [
                'question' => 'What types of consultations can I provide?',
                'answer' => 'Doctors may provide:',
                'list' => [
                    'Medical second opinions',
                    'General health consultations',
                    'Follow-up consultations',
                    'Treatment plan reviews',
                    'Chronic disease management guidance',
                    'Specialist consultations',
                ],
            ],
            [
                'question' => 'Am I required to accept every patient request?',
                'answer' =>
                    'No. Doctors may decline consultations that fall outside their expertise, licensing limitations, or professional comfort level.',
            ],
            [
                'question' => 'What support does PriGina provide?',
                'answer' => 'PriGina offers:',
                'list' => [
                    'Doctor onboarding assistance',
                    'Technical support',
                    'Appointment management tools',
                    'Secure communication systems',
                    'Payment processing services',
                ],
            ],
            [
                'question' => 'How can I increase my bookings?',
                'answer' => 'Doctors can improve visibility by:',
                'list' => [
                    'Completing their profile',
                    'Adding qualifications and certifications',
                    'Maintaining high patient satisfaction ratings',
                    'Keeping availability updated',
                    'Providing timely consultation reports',
                ],
            ],
            [
                'question' => 'Can I leave the platform at any time?',
                'answer' =>
                    'Yes. Doctors may discontinue participation in accordance with the terms outlined in their provider agreement.',
            ],
            [
                'question' => 'Does PriGina guarantee a specific number of patients?',
                'answer' =>
                    'No. Patient volume may vary based on specialty, location, availability, demand, and profile visibility.',
            ],
            [
                'question' => 'Is malpractice insurance required?',
                'answer' =>
                    'Doctors are responsible for maintaining any professional liability or malpractice coverage required by their licensing jurisdiction.',
            ],
            [
                'question' => 'Can I provide consultations in multiple languages?',
                'answer' =>
                    'Yes. Doctors are encouraged to list all languages they speak to help patients find providers who meet their communication needs.',
            ],
            [
                'question' => 'How do I contact PriGina Provider Support?',
                'answer' =>
                    'You can contact the Provider Support Team through the provider dashboard or by emailing info@priginaglobaltelemed.com.',
            ],
        ];

        $faqColumns = collect($faqs)->chunk(ceil(count($faqs) / 2));
    @endphp

    <!-- FAQ Section -->
    <section class="faq-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-inner-header text-center">
                        <h2>Frequently Asked Questions (FAQs) - Doctors</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($faqColumns as $columnIndex => $faqColumn)
                    <div class="col-lg-6 col-md-6">
                        <div class="faq-info faq-inner-info">
                            <div class="accordion" id="faq-details-{{ $columnIndex }}">
                                @foreach ($faqColumn as $faqIndex => $faq)
                                    @php
                                        $itemIndex = $columnIndex * $faqColumns->first()->count() + $faqIndex + 1;
                                        $headingId = 'headingDoctorFaq' . $itemIndex;
                                        $collapseId = 'collapseDoctorFaq' . $itemIndex;
                                    @endphp

                                    <!-- FAQ Item -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="{{ $headingId }}">
                                            <a href="javascript:void(0)" class="accordion-button collapsed"
                                                data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                                aria-expanded="false" aria-controls="{{ $collapseId }}">
                                                {{ $faq['question'] }}
                                            </a>
                                        </h2>
                                        <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                                            aria-labelledby="{{ $headingId }}"
                                            data-bs-parent="#faq-details-{{ $columnIndex }}">
                                            <div class="accordion-body">
                                                <div class="accordion-content">
                                                    <p>{{ $faq['answer'] }}</p>

                                                    @isset($faq['list'])
                                                        <ul>
                                                            @foreach ($faq['list'] as $listItem)
                                                                <li>{{ $listItem }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /FAQ Item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /FAQ Section -->
@endsection
