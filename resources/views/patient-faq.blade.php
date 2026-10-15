<?php $page = 'faq'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => __('app.faq.faq'), 'li_2' => __('app.faq.faq'), 'title' => __('app.faq.title')])
    @endcomponent

    @php
        $faqs = __('faq.patient');

        $faqColumns = collect($faqs)->chunk(ceil(count($faqs) / 2));
    @endphp

    <!-- FAQ Section -->
    <section class="faq-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-inner-header text-center">
                        <h2>{{ __('app.faq.patient_heading') }}</h2>
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
