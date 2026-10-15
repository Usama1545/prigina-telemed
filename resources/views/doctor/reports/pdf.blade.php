<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('app.reports.second_opinion_report') }} {{ $report['report_number'] ?? '' }} — PriGina Global Telemed</title>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            font-size: 13px;
        }

        .page {
            max-width: 860px;
            margin: 32px auto;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0, 0, 0, .08);
        }

        /* ── Header ── */
        .pdf-header {
            padding: 24px 36px 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 3px solid #1d4ed8;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand img {
            height: 82px;
            width: auto;
        }

        .brand-text .name {
            font-size: 18px;
            font-weight: 800;
            color: #1d4ed8;
            letter-spacing: -.3px;
        }

        .brand-text .tagline {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
            font-style: italic;
        }

        .report-id {
            text-align: right;
        }

        .report-id .num {
            font-size: 22px;
            font-weight: 800;
            color: #1d4ed8;
        }

        .report-id .type {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #64748b;
            margin-top: 2px;
        }

        .report-id .date-line {
            font-size: 11px;
            color: #64748b;
            margin-top: 6px;
            line-height: 1.7;
        }

        /* ── Two-column info rows ── */
        .info-row {
            display: flex;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-col {
            flex: 1;
            padding: 18px 24px;
        }

        .info-col+.info-col {
            border-left: 1px solid #e2e8f0;
        }

        /* ── Full-width sections ── */
        .section {
            padding: 16px 36px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #1d4ed8;
            margin-bottom: 10px;
        }

        /* ── Field pairs ── */
        .field {
            margin-bottom: 10px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 2px;
        }

        .field span {
            font-size: 13px;
            color: #1e293b;
            font-weight: 500;
        }

        .field .big {
            font-size: 15px;
            font-weight: 700;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 16px;
        }

        /* ── Badges / tags ── */
        .badge-blue {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 2px 10px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-green {
            display: inline-block;
            background: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
            padding: 2px 10px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 600;
        }

        /* ── Rich text ── */
        .text-content {
            font-size: 13px;
            line-height: 1.75;
            color: #374151;
        }

        .text-content p {
            margin-bottom: 6px;
        }

        /* ── Lists ── */
        .bullet-list {
            list-style: none;
            padding: 0;
        }

        .bullet-list li {
            padding: 4px 0 4px 16px;
            position: relative;
            font-size: 13px;
            color: #374151;
            line-height: 1.5;
        }

        .bullet-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #1d4ed8;
            font-weight: 700;
        }

        .rec-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 10px;
        }

        .numbered-list {
            list-style: none;
            padding: 0;
            counter-reset: q;
        }

        .numbered-list li {
            padding: 5px 0 5px 24px;
            position: relative;
            font-size: 13px;
            color: #374151;
            border-bottom: 1px solid #f8fafc;
            counter-increment: q;
        }

        .numbered-list li::before {
            content: counter(q) ".";
            position: absolute;
            left: 0;
            color: #64748b;
            font-weight: 700;
            font-size: 12px;
        }

        /* ── Bottom row: disclaimer + cert ── */
        .bottom-row {
            display: flex;
        }

        .bottom-col {
            flex: 1;
            padding: 18px 24px;
        }

        .bottom-col+.bottom-col {
            border-left: 1px solid #e2e8f0;
        }

        .disclaimer-box {
            background: #fefce8;
            border: 1px solid #fde047;
            border-radius: 6px;
            padding: 12px 14px;
            font-size: 11px;
            color: #713f12;
            line-height: 1.6;
        }

        .sig-name {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
        }

        .sig-sub {
            font-size: 12px;
            color: #64748b;
            line-height: 1.6;
            margin-top: 2px;
        }

        .certified-badge {
            display: inline-block;
            background: #f0fdf4;
            border: 1px solid #22c55e;
            border-radius: 6px;
            padding: 5px 12px;
            margin-top: 10px;
            font-size: 11px;
            font-weight: 700;
            color: #15803d;
        }

        /* ── Action bar (hidden on print) ── */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px 36px;
            border-top: 1px solid #e2e8f0;
            background: #f8fafc;
            gap: 40px;
        }

        .action-bar-title {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #1d4ed8;
            margin-bottom: 12px;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .action-buttons span {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 14px 18px 12px;
            font-size: 11.5px;
            font-weight: 600;
            color: #374151;
            cursor: pointer;
            text-align: center;
            min-width: 90px;
            transition: background .15s, border-color .15s;
        }

        .action-buttons span:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        .action-buttons span i {
            font-size: 22px;
            color: #1d4ed8;
            line-height: 1;
        }

        .contact-list {
            list-style: none;
            padding: 0;
        }

        .contact-list li {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            color: #374151;
            padding: 4px 0;
        }

        .contact-list li i {
            font-size: 14px;
            color: #1d4ed8;
            flex-shrink: 0;
        }

        /* ── Footer bar ── */
        .pdf-footer {
            background: #1d4ed8;
            padding: 13px 36px;
            text-align: center;
        }

        .pdf-footer p {
            font-size: 12px;
            color: rgba(255, 255, 255, .9);
            font-weight: 500;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            body {
                background: #fff;
                padding: 0;
            }

            .page {
                margin: 0;
                max-width: 100%;
                border: none;
                border-radius: 0;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="page">

        {{-- ── Header ── --}}
        <div class="pdf-header">
            <div class="brand">
                <img src="{{ asset('build/img/logo.webp') }}" alt="PriGina Logo" onerror="this.style.display='none'">
                {{-- <div class="brand-text">
                    <div class="name">PriGina Global Telemed</div>
                    <div class="tagline">Healthcare without borders.</div>
                </div> --}}
            </div>
            <div class="report-id">
                <div class="num">{{ $report['report_number'] ?? 'N/A' }}</div>
                <div class="type">{{ __('app.reports.second_opinion_report') }}</div>
                <div class="date-line">
                    @if (isset($report['report_information']['report_date']))
                        {{ __('app.reports.report_date') }}:
                        {{ \Carbon\Carbon::parse($report['report_information']['report_date'])->translatedFormat('M d, Y') }}<br>
                    @endif
                    {{ __('app.reports.case_id') }}: {{ $report['report_information']['case_id'] ?? ($report['appointment_id'] ?? '—') }}
                </div>
            </div>
        </div>

        {{-- ── Row 1: Report Info | Physician Info ── --}}
        <div class="info-row">
            <div class="info-col">
                <div class="section-title">1. {{ __('app.reports.section_report_info') }}</div>
                <div class="grid-2">
                    <div class="field">
                        <label>{{ __('app.reports.report_number') }}</label>
                        <span>{{ $report['report_number'] ?? '—' }}</span>
                    </div>
                    <div class="field">
                        <label>{{ __('app.reports.report_date') }}</label>
                        <span>{{ isset($report['report_information']['report_date']) ? \Carbon\Carbon::parse($report['report_information']['report_date'])->translatedFormat('M d, Y') : '—' }}</span>
                    </div>
                    <div class="field">
                        <label>{{ __('app.reports.case_id') }}</label>
                        <span>{{ $report['report_information']['case_id'] ?? ($report['appointment_id'] ?? '—') }}</span>
                    </div>
                    <div class="field">
                        <label>{{ __('app.profile.practice_country') }}</label>
                        <span>{{ $report['report_information']['country_of_practice'] ?? '—' }}</span>
                    </div>
                </div>
            </div>
            <div class="info-col">
                <div class="section-title">2. {{ __('app.reports.section_physician_info') }}</div>
                <div class="field">
                    <label>{{ __('app.reports.physician') }}</label>
                    <span class="big">{{ __('app.review.dr_name', ['name' => $report['report_information']['physician_name'] ?? '—']) }}</span>
                </div>
                <div class="grid-2" style="margin-top:10px;">
                    <div class="field">
                        <label>{{ __('app.reports.specialty') }}</label>
                        <span>
                            {{ \Illuminate\Support\Str::headline($report['report_information']['specialty'] ?? '') ?: '—' }}
                        </span>
                    </div>
                    <div class="field">
                        <label>{{ __('app.reports.country') }}</label>
                        <span>
                            {{ $report['report_information']['country'] ?: $report['report_information']['country_of_practice'] ?? '—' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Row 2: Patient Info | Documents Reviewed ── --}}
        <div class="info-row">
            <div class="info-col">
                <div class="section-title">3. {{ __('app.reports.section_patient_info') }}</div>
                <div class="grid-2">
                    <div class="field">
                        <label>{{ __('app.reports.patient_name') }}</label>
                        <span>{{ $report['patient_information']['patient_name'] ?? '—' }}</span>
                    </div>
                    <div class="field">
                        <label>{{ __('app.reports.age') }}</label>
                        <span>{{ $report['patient_information']['age'] ?? '—' }}</span>
                    </div>
                    <div class="field">
                        <label>{{ __('app.reports.gender') }}</label>
                        @php $genderKey = 'app.reports.gender_' . strtolower($report['patient_information']['gender'] ?? ''); @endphp
                        <span>{{ empty($report['patient_information']['gender']) ? '—' : (Lang::has($genderKey) ? __($genderKey) : $report['patient_information']['gender']) }}</span>
                    </div>
                </div>
                @if (!empty($report['patient_information']['primary_concern']))
                    <div class="field" style="margin-top:10px;">
                        <label>{{ __('app.reports.primary_concern') }}</label>
                        <span>{{ $report['patient_information']['primary_concern'] }}</span>
                    </div>
                @endif
            </div>
            <div class="info-col">
                <div class="section-title">4. {{ __('app.reports.section_docs_reviewed') }}</div>
                @php
                    $docLabels = [
                        'medical_records' => __('app.reports.doc_medical_records'),
                        'laboratory_results' => __('app.reports.doc_lab_results'),
                        'imaging_studies' => __('app.reports.doc_imaging'),
                        'pathology_reports' => __('app.reports.doc_pathology'),
                        'operative_reports' => __('app.reports.doc_operative'),
                        'consultation_notes' => __('app.reports.doc_consultation'),
                    ];
                    $reviewedDocs = collect($docLabels)->filter(
                        fn($_, $key) => !empty($report['documents_reviewed'][$key] ?? false),
                    );
                @endphp
                @if ($reviewedDocs->isNotEmpty() || !empty($report['documents_reviewed']['other']))
                    <ul class="bullet-list">
                        @foreach ($reviewedDocs as $key => $label)
                            <li>{{ $label }}</li>
                        @endforeach
                        @if (!empty($report['documents_reviewed']['other']))
                            <li>{{ $report['documents_reviewed']['other'] }}</li>
                        @endif
                    </ul>
                @else
                    <span style="font-size:12px;color:#94a3b8;">{{ __('app.reports.no_documents') }}</span>
                @endif
            </div>
        </div>

        {{-- ── 5. Clinical Summary ── --}}
        @if (!empty($report['clinical_summary']))
            <div class="section">
                <div class="section-title">5. {{ __('app.reports.section_clinical') }}</div>
                <div class="text-content">{!! $report['clinical_summary'] !!}</div>
            </div>
        @endif

        {{-- ── 6. Second Opinion Assessment ── --}}
        @if (!empty($report['second_opinion_assessment']))
            <div class="section">
                <div class="section-title">6. {{ __('app.reports.section_assessment') }}</div>
                <div class="text-content">{!! $report['second_opinion_assessment'] !!}</div>
            </div>
        @endif

        {{-- ── 7. Key Findings ── --}}
        @if (!empty($report['key_findings']))
            <div class="section">
                <div class="section-title">7. {{ __('app.reports.section_findings') }}</div>
                <ul class="bullet-list">
                    @foreach ($report['key_findings'] as $finding)
                        @if (trim($finding))
                            <li>{{ $finding }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ── 8. Diagnostic Considerations ── --}}
        @if (!empty($report['diagnostic_considerations']))
            <div class="section">
                <div class="section-title">8. {{ __('app.reports.section_diagnostic') }}</div>
                <div class="text-content">{!! $report['diagnostic_considerations'] !!}</div>
            </div>
        @endif

        {{-- ── 9. Recommendations ── --}}
        @php
            $recLabels = [
                'additional_testing' => __('app.reports.rec_additional_testing'),
                'additional_imaging' => __('app.reports.rec_additional_imaging'),
                'specialist_referral' => __('app.reports.rec_specialist_referral'),
                'treatment_modification' => __('app.reports.rec_treatment_modification'),
                'monitoring' => __('app.reports.rec_monitoring'),
                'surgical_consultation' => __('app.reports.rec_surgical'),
                'lifestyle_modifications' => __('app.reports.rec_lifestyle'),
                'other' => __('app.reports.gender_other'),
            ];
            $selectedRecs = collect($recLabels)->filter(
                fn($_, $key) => !empty($report['recommendations'][$key] ?? false),
            );
        @endphp
        @if ($selectedRecs->isNotEmpty() || !empty($report['recommendations']['details']))
            <div class="section">
                <div class="section-title">9. {{ __('app.reports.section_recommendations') }}</div>
                @if ($selectedRecs->isNotEmpty())
                    <div class="rec-tags">
                        @foreach ($selectedRecs as $key => $label)
                            <span class="badge-green">{{ $label }}</span>
                        @endforeach
                    </div>
                @endif
                @if (!empty($report['recommendations']['details']))
                    <div class="text-content" style="margin-top:8px;">{{ $report['recommendations']['details'] }}</div>
                @endif
            </div>
        @endif

        {{-- ── 10. Questions for Physician ── --}}
        @if (!empty($report['questions_for_physician']))
            <div class="section">
                <div class="section-title">10. {{ __('app.reports.questions_title') }}</div>
                <ol class="numbered-list">
                    @foreach ($report['questions_for_physician'] as $question)
                        @if (trim($question))
                            <li>{{ $question }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        @endif

        {{-- ── 11. Patient-Friendly Summary ── --}}
        @if (!empty($report['patient_friendly_summary']))
            <div class="section">
                <div class="section-title">11. {{ __('app.reports.section_patient_summary') }}</div>
                <div class="text-content">{!! $report['patient_friendly_summary'] !!}</div>
            </div>
        @endif

        {{-- ── Bottom: Disclaimer | Physician Certification ── --}}
        <div class="bottom-row" style="border-top: 1px solid #e2e8f0;">
            <div class="bottom-col">
                <div class="section-title">{{ __('app.reports.disclaimer') }}</div>
                <div class="disclaimer-box">
                    {{ __('app.reports.pdf_disclaimer') }}
                </div>
            </div>
            <div class="bottom-col">
                <div class="section-title">{{ __('app.reports.physician_certification') }}</div>
                <div class="sig-name">{{ __('app.review.dr_name', ['name' => $report['certification']['physician_name'] ?? '—']) }}</div>
                <div class="sig-sub">
                    {{ \Illuminate\Support\Str::headline($report['certification']['specialty']) ?? '' }}<br>
                    PriGina Global Telemed
                </div>
                @if (!empty($report['certification']['certified_at']))
                    <div class="certified-badge">
                        &#10003; {{ __('app.reports.certified_on') }}
                        {{ \Carbon\Carbon::parse($report['certification']['certified_at'])->translatedFormat('M d, Y') }}
                    </div>
                @endif
            </div>
        </div>

        {{-- ── Action Bar (hidden on print) ── --}}
        <div class="action-bar">
            <div>
                <div class="action-bar-title">{{ __('app.reports.dashboard_actions') }}</div>
                <div class="action-buttons" id="actionBar">
                    <span onclick="downloadPdf()"><i class="fi fi-rr-file-download"></i>{{ __('app.reports.download_pdf') }}</span>
                    <span onclick="window.print()"><i class="fi fi-rr-print"></i>{{ __('app.reports.print_report') }}</span>
                    <span onclick="history.back()"><i class="fi fi-rr-arrow-left"></i>{{ __('app.calls.go_back') }}</span>
                </div>
            </div>
            <div>
                <div class="action-bar-title">{{ __('app.reports.need_help') }}</div>
                <ul class="contact-list">
                    <li><i class="fi fi-rr-globe"></i> www.priginaglobaltelemed.com</li>
                    <li><i class="fi fi-rr-envelope"></i> info@priginaglobaltelemed.com</li>
                    <li><i class="fi fi-rr-phone-call"></i> +1 (856) 426-8693</li>
                </ul>
            </div>
        </div>

        {{-- ── Footer bar ── --}}
        <div class="pdf-footer">
            <p>PriGina Global Telemed &mdash; {{ __('app.our_mission.tagline') }}</p>
        </div>
    </div>

    <script>
        function downloadPdf() {
            const actionButtons = document.querySelector('.action-buttons');
            const page = document.querySelector('.page');

            // Hide only the buttons; keep bar title + contact info visible in the PDF
            actionButtons.style.display = 'none';

            // Strip layout styles that add whitespace to the canvas capture
            page.style.margin = '0';
            page.style.borderRadius = '0';
            page.style.boxShadow = 'none';
            page.style.maxWidth = 'none';

            const filename = 'PriGina-Report-{{ addslashes($report['report_number'] ?? 'report') }}.pdf';

            html2pdf()
                .set({
                    margin: [0, 0, 0, 0],
                    filename: filename,
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2,
                        useCORS: true,
                        logging: false,
                        scrollX: 0,
                        scrollY: 0,
                        windowWidth: page.scrollWidth,
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    },
                    pagebreak: {
                        mode: ['avoid-all', 'css']
                    },
                })
                .from(page)
                .save()
                .then(() => {
                    actionButtons.style.display = '';
                    page.style.margin = '';
                    page.style.borderRadius = '';
                    page.style.boxShadow = '';
                    page.style.maxWidth = '';
                });
        }
    </script>
</body>

</html>
