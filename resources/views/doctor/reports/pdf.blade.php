<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Opinion Report {{ $report['report_number'] ?? '' }} — PriGina Global Telemed</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; color: #1e293b; padding: 32px 16px; }

        .page { max-width: 820px; margin: 0 auto; background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 32px rgba(15,23,42,.10); }

        .pdf-header { background: linear-gradient(135deg, #1d4ed8 0%, #0891b2 100%); padding: 36px 48px 28px; display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; }
        .pdf-header .brand h1 { color: #fff; font-size: 20px; font-weight: 800; }
        .pdf-header .brand p { color: rgba(255,255,255,.75); font-size: 12px; margin-top: 4px; }
        .pdf-header .report-meta { text-align: right; }
        .pdf-header .report-meta .report-num { font-size: 22px; font-weight: 800; color: #fff; }
        .pdf-header .report-meta p { color: rgba(255,255,255,.8); font-size: 12px; margin-top: 4px; }

        .pdf-body { padding: 36px 48px; }

        .section { margin-bottom: 28px; }
        .section-title { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: #1d4ed8; border-bottom: 2px solid #dbeafe; padding-bottom: 6px; margin-bottom: 14px; }

        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .info-item label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: .04em; display: block; margin-bottom: 3px; }
        .info-item span { font-size: 14px; color: #1e293b; font-weight: 500; }

        .doc-tags { display: flex; flex-wrap: wrap; gap: 8px; }
        .doc-tag { background: #dbeafe; color: #1d4ed8; padding: 4px 12px; border-radius: 50px; font-size: 12px; font-weight: 600; }

        .text-content { font-size: 14px; line-height: 1.7; color: #374151; }
        .text-content p { margin-bottom: 8px; }

        .findings-list { list-style: none; padding: 0; }
        .findings-list li { padding: 6px 0; padding-left: 20px; position: relative; font-size: 14px; color: #374151; }
        .findings-list li::before { content: '●'; position: absolute; left: 0; color: #1d4ed8; font-size: 10px; top: 8px; }

        .rec-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 12px; }
        .rec-tag { background: #ecfdf3; color: #15803d; padding: 4px 12px; border-radius: 50px; font-size: 12px; font-weight: 600; border: 1px solid #bbf7d0; }

        .questions-list { list-style: none; padding: 0; counter-reset: q; }
        .questions-list li { padding: 8px 0; padding-left: 28px; position: relative; font-size: 14px; color: #374151; border-bottom: 1px solid #f1f5f9; counter-increment: q; }
        .questions-list li::before { content: counter(q) "."; position: absolute; left: 0; color: #64748b; font-weight: 700; }

        .cert-box { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px 24px; display: flex; justify-content: space-between; align-items: flex-end; gap: 20px; }
        .cert-name { font-size: 16px; font-weight: 700; color: #1e293b; }
        .cert-specialty { font-size: 13px; color: #64748b; margin-top: 2px; }
        .cert-date { font-size: 12px; color: #64748b; text-align: right; }
        .cert-stamp { background: #ecfdf3; border: 2px solid #22c55e; border-radius: 10px; padding: 8px 16px; text-align: center; }
        .cert-stamp span { display: block; font-size: 11px; font-weight: 700; color: #15803d; text-transform: uppercase; letter-spacing: .06em; }

        .disclaimer { background: #fefce8; border: 1px solid #fde047; border-radius: 10px; padding: 14px 18px; margin-top: 24px; }
        .disclaimer p { font-size: 12px; color: #713f12; line-height: 1.5; margin: 0; }

        .print-actions { text-align: center; padding: 24px; border-top: 1px solid #f1f5f9; }
        .print-btn { background: #1d4ed8; color: #fff; border: none; padding: 12px 32px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; margin: 0 8px; }
        .print-btn:hover { background: #1e40af; }
        .back-btn { background: #f1f5f9; color: #374151; border: none; padding: 12px 32px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; margin: 0 8px; text-decoration: none; display: inline-block; }

        @media print {
            body { background: #fff; padding: 0; }
            .page { box-shadow: none; border-radius: 0; }
            .print-actions { display: none; }
        }
    </style>
</head>
<body>

<div class="page">

    {{-- Header --}}
    <div class="pdf-header">
        <div class="brand">
            <h1>PriGina Global Telemed</h1>
            <p>Healthcare without borders.</p>
        </div>
        <div class="report-meta">
            <div class="report-num">{{ $report['report_number'] ?? 'N/A' }}</div>
            <p>Second Opinion Report</p>
            <p>{{ isset($report['report_information']['report_date']) ? \Carbon\Carbon::parse($report['report_information']['report_date'])->format('M d, Y') : '' }}</p>
        </div>
    </div>

    <div class="pdf-body">

        {{-- 1. Report Information --}}
        <div class="section">
            <div class="section-title">Report Information</div>
            <div class="info-grid">
                <div class="info-item">
                    <label>Report Number</label>
                    <span>{{ $report['report_number'] ?? '—' }}</span>
                </div>
                <div class="info-item">
                    <label>Report Date</label>
                    <span>{{ isset($report['report_information']['report_date']) ? \Carbon\Carbon::parse($report['report_information']['report_date'])->format('M d, Y') : '—' }}</span>
                </div>
                <div class="info-item">
                    <label>Physician</label>
                    <span>Dr. {{ $report['report_information']['physician_name'] ?? '—' }}</span>
                </div>
                <div class="info-item">
                    <label>Specialty</label>
                    <span>{{ $report['report_information']['specialty'] ?? '—' }}</span>
                </div>
                <div class="info-item">
                    <label>Case ID</label>
                    <span>{{ $report['report_information']['case_id'] ?? '—' }}</span>
                </div>
                <div class="info-item">
                    <label>Country of Practice</label>
                    <span>{{ $report['report_information']['country_of_practice'] ?? '—' }}</span>
                </div>
            </div>
        </div>

        {{-- 2. Patient Information --}}
        <div class="section">
            <div class="section-title">Patient Information</div>
            <div class="info-grid">
                <div class="info-item">
                    <label>Patient Name</label>
                    <span>{{ $report['patient_information']['patient_name'] ?? '—' }}</span>
                </div>
                <div class="info-item">
                    <label>Age</label>
                    <span>{{ $report['patient_information']['age'] ?? '—' }}</span>
                </div>
                <div class="info-item">
                    <label>Gender</label>
                    <span>{{ $report['patient_information']['gender'] ?? '—' }}</span>
                </div>
            </div>
            @if(!empty($report['patient_information']['primary_concern']))
            <div style="margin-top:12px;">
                <div class="info-item">
                    <label>Primary Concern / Diagnosis Under Review</label>
                    <span>{{ $report['patient_information']['primary_concern'] }}</span>
                </div>
            </div>
            @endif
        </div>

        {{-- 3. Documents Reviewed --}}
        @php
            $docLabels = [
                'medical_records'    => 'Medical Records',
                'laboratory_results' => 'Lab Results',
                'imaging_studies'    => 'Imaging Studies',
                'pathology_reports'  => 'Pathology Reports',
                'operative_reports'  => 'Operative Reports',
                'consultation_notes' => 'Consultation Notes',
            ];
            $reviewedDocs = collect($docLabels)->filter(fn($label, $key) => !empty($report['documents_reviewed'][$key] ?? false));
        @endphp
        @if($reviewedDocs->isNotEmpty() || !empty($report['documents_reviewed']['other']))
        <div class="section">
            <div class="section-title">Documents Reviewed</div>
            <div class="doc-tags">
                @foreach($reviewedDocs as $key => $label)
                    <span class="doc-tag">{{ $label }}</span>
                @endforeach
                @if(!empty($report['documents_reviewed']['other']))
                    <span class="doc-tag">{{ $report['documents_reviewed']['other'] }}</span>
                @endif
            </div>
        </div>
        @endif

        {{-- 4. Clinical Summary --}}
        @if(!empty($report['clinical_summary']))
        <div class="section">
            <div class="section-title">Clinical Summary</div>
            <div class="text-content">{!! $report['clinical_summary'] !!}</div>
        </div>
        @endif

        {{-- 5. Second Opinion Assessment --}}
        @if(!empty($report['second_opinion_assessment']))
        <div class="section">
            <div class="section-title">Second Opinion Assessment</div>
            <div class="text-content">{!! $report['second_opinion_assessment'] !!}</div>
        </div>
        @endif

        {{-- 6. Key Findings --}}
        @if(!empty($report['key_findings']))
        <div class="section">
            <div class="section-title">Key Findings</div>
            <ul class="findings-list">
                @foreach($report['key_findings'] as $finding)
                    @if(trim($finding))
                    <li>{{ $finding }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        @endif

        {{-- 7. Diagnostic Considerations --}}
        @if(!empty($report['diagnostic_considerations']))
        <div class="section">
            <div class="section-title">Diagnostic Considerations</div>
            <div class="text-content">{!! $report['diagnostic_considerations'] !!}</div>
        </div>
        @endif

        {{-- 8. Recommendations --}}
        @php
            $recLabels = [
                'additional_testing'      => 'Additional Testing',
                'additional_imaging'      => 'Additional Imaging',
                'specialist_referral'     => 'Specialist Referral',
                'treatment_modification'  => 'Treatment Modification',
                'monitoring'              => 'Monitoring / Observation',
                'surgical_consultation'   => 'Surgical Consultation',
                'lifestyle_modifications' => 'Lifestyle Modifications',
                'other'                   => 'Other',
            ];
            $selectedRecs = collect($recLabels)->filter(fn($label, $key) => !empty($report['recommendations'][$key] ?? false));
        @endphp
        @if($selectedRecs->isNotEmpty() || !empty($report['recommendations']['details']))
        <div class="section">
            <div class="section-title">Recommendations</div>
            @if($selectedRecs->isNotEmpty())
            <div class="rec-tags">
                @foreach($selectedRecs as $key => $label)
                    <span class="rec-tag">{{ $label }}</span>
                @endforeach
            </div>
            @endif
            @if(!empty($report['recommendations']['details']))
            <div class="text-content" style="margin-top:10px;">{{ $report['recommendations']['details'] }}</div>
            @endif
        </div>
        @endif

        {{-- 9. Questions for Physician --}}
        @if(!empty($report['questions_for_physician']))
        <div class="section">
            <div class="section-title">Questions to Discuss with Treating Physician</div>
            <ul class="questions-list">
                @foreach($report['questions_for_physician'] as $question)
                    @if(trim($question))
                    <li>{{ $question }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        @endif

        {{-- 10. Patient-Friendly Summary --}}
        @if(!empty($report['patient_friendly_summary']))
        <div class="section">
            <div class="section-title">Patient-Friendly Summary</div>
            <div class="text-content">{!! $report['patient_friendly_summary'] !!}</div>
        </div>
        @endif

        {{-- 11. Certification --}}
        <div class="section">
            <div class="section-title">Physician Certification</div>
            <div class="cert-box">
                <div>
                    <div class="cert-name">Dr. {{ $report['certification']['physician_name'] ?? '—' }}</div>
                    <div class="cert-specialty">{{ $report['certification']['specialty'] ?? '' }}</div>
                    @if(!empty($report['certification']['certified_at']))
                    <div class="cert-date" style="margin-top:8px;">
                        Certified on {{ \Carbon\Carbon::parse($report['certification']['certified_at'])->format('M d, Y') }}
                    </div>
                    @endif
                </div>
                @if(!empty($report['certification']['certified_at']))
                <div class="cert-stamp">
                    <span>Certified</span>
                    <span style="font-size:18px;color:#22c55e;">✓</span>
                </div>
                @endif
            </div>
        </div>

        {{-- Disclaimer --}}
        <div class="disclaimer">
            <p><strong>Disclaimer:</strong> This second opinion report is prepared based on the medical documents provided. It does not replace the patient's treating physician's judgment and is intended to assist in informed medical decision-making. PriGina Global Telemed and the reviewing physician are not responsible for treatment decisions made based on this report.</p>
        </div>

    </div>

    {{-- Print Actions --}}
    <div class="print-actions">
        <a href="javascript:history.back()" class="back-btn">← Back</a>
        <button class="print-btn" onclick="window.print()">Print / Save as PDF</button>
    </div>

</div>

</body>
</html>
