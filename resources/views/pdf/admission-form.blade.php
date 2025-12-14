<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admission Form</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; line-height: 1.4; }
        h1, h2 { text-align: center; margin: 0; padding: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td, th { border: 1px solid #000; padding: 6px; vertical-align: top; }
        .section-title { background: #f0f0f0; font-weight: bold; padding: 4px; }
        .signature-box { height: 60px; border: 1px dashed #000; margin-top: 10px; }
        .photo-box { width: 120px; height: 150px; border: 1px solid #000; text-align: center; vertical-align: middle; }
    </style>
</head>
<body>

    {{-- Header with Photo --}}
    <table style="width:100%; border:none;">
        <tr>
            <td style="border:none; text-align:center;">
                <h1>Student Admission Form</h1>
                <h2>Institution Name: ____________________________</h2>
                <p>EIIN: __________ | Session: __________ | Class: __________</p>
            </td>
            <td style="border:none; text-align:right;">
                <div class="photo-box">
                    @if(!empty($student['photo']))
                        <img src="{{ public_path('uploads/'.$student['photo']) }}" alt="Student Photo" style="width:100%; height:100%; object-fit:cover;">
                    @else
                        <span>Photo</span>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    {{-- Step 1: Personal Information --}}
    <h2 class="section-title">1. Personal Information</h2>
    <table>
        <tr>
            <th>Name (English)</th><td>{{ $student['name_en'] ?? '' }}</td>
            <th>Name (Bangla)</th><td>{{ $student['name_bn'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Date of Birth</th><td>{{ $student['date_of_birth'] ?? '' }}</td>
            <th>Religion</th><td>{{ $student['religion'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Gender</th><td>{{ $student['gender'] ?? '' }}</td>
            <th>Blood Group</th><td>{{ $student['blood_group'] ?? '' }}</td>
        </tr>
    </table>

    {{-- Step 2: Guardian Information --}}
    <h2 class="section-title">2. Guardian Information</h2>
    <table>
        <tr>
            <th>Father's Name</th><td>{{ $student['father_name_en'] ?? '' }}</td>
            <th>Father's Mobile</th><td>{{ $student['father_mobile'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Mother's Name</th><td>{{ $student['mother_name_en'] ?? '' }}</td>
            <th>Mother's Mobile</th><td>{{ $student['mother_mobile'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Annual Income</th><td>{{ $student['annual_income'] ?? '' }}</td>
            <th>Land Area</th><td>{{ $student['land_area'] ?? '' }}</td>
        </tr>
    </table>

    {{-- Step 3: Quota Categories --}}
    <h2 class="section-title">3. Quota Categories</h2>
    <table>
        <tr>
            <td>
                @if(!empty($student['selectedCategories']))
                    {{ implode(', ', $student['selectedCategories']) }}
                @else
                    None
                @endif
            </td>
        </tr>
    </table>

    {{-- Step 4: Academic Information --}}
    <h2 class="section-title">4. Academic Information</h2>
    <table>
        <tr>
            <th>Previous Institution</th><td>{{ $student['prev_inst_name'] ?? '' }}</td>
            <th>Previous Class</th><td>{{ $student['prev_class'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Passing Year</th><td>{{ $student['pass_year'] ?? '' }}</td>
            <th>GPA</th><td>{{ $student['gpa'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Release No</th><td>{{ $student['release_no'] ?? '' }}</td>
            <th>Release Date</th><td>{{ $student['releas_date'] ?? '' }}</td>
        </tr>
    </table>

    {{-- Step 5: Commitment & Declaration --}}
    <h2 class="section-title">5. Commitment & Declaration</h2>
    <p><strong>Student Commitment:</strong> I hereby commit to abide by all rules and regulations of the institution.</p>
    <div class="signature-box">Student Signature: {{ $student['student_signature'] ?? '' }}</div>

    <p><strong>Guardian Declaration:</strong> I hereby declare that I will take responsibility for my child's conduct and fees.</p>
    <div class="signature-box">Guardian Signature: {{ $student['guardian_signature'] ?? '' }}</div>

    {{-- Step 6: PDF Form Upload --}}
    <h2 class="section-title">6. PDF Form Upload</h2>
    <p>Downloaded Form: {{ $student['downloaded_form'] ?? 'Not uploaded' }}</p>

    {{-- Step 7: Office Use --}}
    <h2 class="section-title">7. Office Use</h2>
    <table>
        <tr>
            <th>Admission Fee</th><td>{{ $student['admission_fee'] ?? '' }}</td>
            <th>Session Fee</th><td>{{ $student['session_fee'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Total Fee</th><td colspan="3">{{ $student['total_fee'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Teacher Certified</th><td>{{ $student['teacher_certified'] ?? '' }}</td>
            <th>Principal Comment</th><td>{{ $student['principal_comment'] ?? '' }}</td>
        </tr>
    </table>

    {{-- Step 8: Documents --}}
    <h2 class="section-title">8. Documents Attached</h2>
    <ul>
        <li>Birth Certificate / NID: {{ $student['nid'] ?? '' }}</li>
        <li>Previous Certificates: {{ $student['release_certificate'] ?? '' }}</li>
        <li>Mark Sheets: {{ $student['jdc_marksheet'] ?? '' }}, {{ $student['dakhil_marksheet'] ?? '' }}, {{ $student['alim_marksheet'] ?? '' }}</li>
        <li>Other Documents: {{ $student['other_documents'] ?? '' }}</li>
    </ul>

    <p style="text-align:right; margin-top:40px;">
        Principal Signature: ______________________
    </p>
</body>
</html>
