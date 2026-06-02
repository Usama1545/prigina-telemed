<?php $page = 'faq'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'FAQ', 'li_2' => 'FAQ', 'title' => 'Frequently Asked Questions'])
    @endcomponent

    @php
        $faqs = [
            [
                'question' => 'What is PriGina Global Telemed?',
                'answer' =>
                    'PriGina Global Telemed is a platform that connects patients with licensed doctors worldwide for professional medical second opinions and virtual health consultations. Our mission is Healthcare Without Borders.',
            ],
            [
                'question' => 'Is PriGina Global Telemed a replacement for my regular doctor?',
                'answer' =>
                    'No. PriGina Global Telemed is designed to provide expert second opinions and guidance. Patients should continue receiving care from their primary healthcare provider and follow local medical advice when necessary.',
            ],
            [
                'question' => 'What is a medical second opinion?',
                'answer' =>
                    'A second opinion is an independent review of your diagnosis, treatment plan, test results, or medical condition by another qualified physician to help you make informed healthcare decisions.',
            ],
            [
                'question' => 'Who can use PriGina Global Telemed?',
                'answer' =>
                    'Anyone seeking additional medical insight, clarification of a diagnosis, treatment recommendations, or specialist input can use our platform, regardless of location.',
            ],
            [
                'question' => 'How do I book an appointment?',
                'answer' => 'Simply:',
                'ordered_list' => [
                    'Create an account.',
                    'Complete your health profile.',
                    'Upload any relevant medical records.',
                    'Select a doctor and available time slot.',
                    'Confirm payment and attend your virtual consultation.',
                ],
            ],
            [
                'question' => 'What types of doctors are available?',
                'answer' =>
                    'Our network includes licensed physicians from various specialties, including Internal Medicine, Family Medicine, Pediatrics, Cardiology, Neurology, Obstetrics & Gynecology, Psychiatry, Dermatology, and more.',
            ],
            [
                'question' => 'Can I choose my doctor?',
                'answer' =>
                    'Yes. Patients can review doctor profiles, specialties, qualifications, languages spoken, and availability before scheduling a consultation.',
            ],
            [
                'question' => 'What documents should I upload before my appointment?',
                'answer' => 'You may upload:',
                'list' => [
                    'Medical reports',
                    'Laboratory results',
                    'Imaging reports (X-rays, CT scans, MRI reports)',
                    'Medication lists',
                    'Hospital discharge summaries',
                    'Previous consultation notes',
                ],
            ],
            [
                'question' => 'How are consultations conducted?',
                'answer' =>
                    'Consultations may be conducted through secure video calls, audio calls, or secure messaging depending on availability and service type.',
            ],
            [
                'question' => 'Is my personal health information secure?',
                'answer' =>
                    'Yes. We use industry-standard security measures and privacy safeguards to help protect your personal and medical information.',
            ],
            [
                'question' => 'Can doctors prescribe medication?',
                'answer' =>
                    'Prescription availability depends on the doctor\'s licensing jurisdiction and applicable regulations. Some consultations may focus solely on providing a second opinion and treatment recommendations.',
            ],
            [
                'question' => 'Can I receive a written medical report?',
                'answer' =>
                    'Yes. After your consultation, you may receive a summary report outlining the doctor\'s assessment, recommendations, and suggested next steps when applicable.',
            ],
            [
                'question' => 'How much does a consultation cost?',
                'answer' =>
                    'Consultation fees vary depending on the doctor\'s specialty, experience, and consultation type. Pricing is displayed before booking.',
            ],
            [
                'question' => 'What happens if I miss my appointment?',
                'answer' =>
                    'Missed appointment and rescheduling policies are outlined during booking. We encourage patients to cancel or reschedule as early as possible.',
            ],
            [
                'question' => 'Can I book appointments for a family member?',
                'answer' =>
                    'Yes. Parents, guardians, and authorized family members may schedule consultations on behalf of eligible patients.',
            ],
            [
                'question' => 'Is PriGina Global Telemed available worldwide?',
                'answer' =>
                    'Yes. PriGina Global Telemed is designed to connect patients and doctors across countries, making expert medical opinions more accessible globally.',
            ],
            [
                'question' => 'What conditions can be discussed on the platform?',
                'answer' => 'Patients commonly seek consultations for:',
                'list' => [
                    'Chronic diseases',
                    'Complex diagnoses',
                    'Treatment plan reviews',
                    'Specialist recommendations',
                    'Medication concerns',
                    'Preventive health guidance',
                    'General medical questions',
                ],
            ],
            [
                'question' => 'What if I need emergency medical care?',
                'answer' =>
                    'PriGina Global Telemed is not an emergency service. If you are experiencing a medical emergency, call your local emergency number or visit the nearest emergency department immediately.',
            ],
            [
                'question' => 'Will I receive appointment reminders?',
                'answer' =>
                    'Yes. Patients may receive email and SMS reminders before scheduled consultations.',
            ],
            [
                'question' => 'Can I leave feedback after my consultation?',
                'answer' =>
                    'Absolutely. We encourage patients to rate their experience and provide feedback to help us maintain high-quality care and continuously improve our services.',
            ],
            [
                'question' => 'Still have questions?',
                'answer' =>
                    'Contact our support team at info@priginaglobaltelemed.com or visit PriGina Global Telemed. We are here to help.',
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
                        <h2>Frequently Asked Questions (FAQs) - Patients</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($faqColumns as $columnIndex => $faqColumn)
                    <div class="col-lg-6 col-md-6">
                        <div class="faq-info faq-inner-info">
                            <div class="accordion" id="patient-faq-details-{{ $columnIndex }}">
                                @foreach ($faqColumn as $faqIndex => $faq)
                                    @php
                                        $itemIndex = $columnIndex * $faqColumns->first()->count() + $faqIndex + 1;
                                        $headingId = 'headingPatientFaq' . $itemIndex;
                                        $collapseId = 'collapsePatientFaq' . $itemIndex;
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
                                            data-bs-parent="#patient-faq-details-{{ $columnIndex }}">
                                            <div class="accordion-body">
                                                <div class="accordion-content">
                                                    <p>{{ $faq['answer'] }}</p>

                                                    @isset($faq['ordered_list'])
                                                        <ol>
                                                            @foreach ($faq['ordered_list'] as $listItem)
                                                                <li>{{ $listItem }}</li>
                                                            @endforeach
                                                        </ol>
                                                    @endisset

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
