<?php
namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class AdmissionFormWizard extends Component
{
    //1: Wizard State
    public $currentStep = 1;
    public $isReadOnly  = false; // for  repeater or renewal forms

    //2: data variables (1st Step; personal information)
    public $admission_year,
    $class,
    $student_type,
        $admission_date;

    public $student_id,
    $class_roll,
        $branch;

    public $name_bn,
    $name_en,
        $name_ar;

    public $date_of_birth,
    $age_years,
    $age_months,
        $age_days;

    public $gender,
    $religion,
        $blood_group;

    //3: data variables (2nd Step; guardian information)
    public $father_name_en,
    $father_mobile,
    $mother_name_en,
        $mother_mobile;

    public $guardian_name,
    $relationship,
    $guardian_mobile,
        $whatsapp_number;

    public $father_profession = [],
    $annual_income,
    $land_area,
        $family_members;

    public $permanent_address = [],
    $current_address          = [],
        $custom_address;

    public $child_count = 1; // in this institute

    //4: data variables (3rd and 4th Step; academic information)

    public $categories = [
    'Worker',
    'Landless Dependent',
    'Freedom Fighter Dependent',
    'Disabled',
    'Orphan',
    'Indigenous',
    'Hafiz',
    'None'
]; //caatagories

    public $prev_inst_name,
    $prev_class,
    $pass_year,
    $gpa,
    $release_no,
        $releas_date; // 4th Step

    // 5: data variables (5th Step; commitment and declaration)
    public $student_commitment,
        $student_signature;

    public $guardian_declaration,
        $guardian_signature;

    //6: data variables (pdf form upload)

    public $downloaded_form;

    //7: data variables (office use)
    public $session_fee,
    $admission_fee,
    $jan_salary,
    $miscellaneous,
        $total_fee;

    public $teacher_certified,
        $teacher_signature;
    public $principal_comment,
        $principal_signature;

    //8: data variables (file uploads)

    public $online_birth_certificate,
    $nid,
    $release_certificate,
    $jdc_certificate,
    $jdc_marksheet,
    $dakhil_certificate,
    $dakhil_marksheet,
    $alim_certificate,
    $alim_marksheet,
        $other_documents;

    //Load data function
        public function loadStudentData($student_id)
       {
              // Load student data from the database based on student_id
           $student = Student::with('user')->find($student_id);
                 if ($student) {
                 $this->isReadOnly = true; 
                 //for example, load some fields
                 $this->admission_year = $student->admission_year;
                 $this->class = $student->class;
                 $this->student_type = $student->student_type;
                 $this->admission_date = $student->admission_date;
                 $this->student_id = $student->id;
                 $this->student_class_roll = $student->class_roll;
                 $this->branch = $student->branch;
                 $this->name_bn = $student->name_bn;
                 $this->name_en = $student->name_en;
                 $this->name_ar = $student->name_ar;
                 $this->date_of_birth = $student->date_of_birth;
                 $this->age_years = $student->age_years;
                 $this->age_months = $student->age_months;
                 $this->age_days = $student->age_days;
                 $this->religion = $student->religion;
                 $this->gender = $student->gender;
                 //load data form user table
                 if ($student->user)
                     {
                     $this->name_en = $student->user->name;
                     $this->user_photo = $student->user->profile_picture;
                     $this->

                 }
                 //guardian info
                 }
              }
              // next step
              


public function downloadPdf()
{
    // সব ফিল্ডকে একটি অ্যারেতে সাজানো হচ্ছে
    $data = [
        'student' => [
            'photo' => $this->user_photo ?? null,
            'name_en' => $this->name_en,
            'name_bn' => $this->name_bn,
            'date_of_birth' => $this->date_of_birth,
            'religion' => $this->religion,
            'gender' => $this->gender,
            'blood_group' => $this->blood_group,

            'father_name_en' => $this->father_name_en,
            'father_mobile' => $this->father_mobile,
            'mother_name_en' => $this->mother_name_en,
            'mother_mobile' => $this->mother_mobile,
            'annual_income' => $this->annual_income,
            'land_area' => $this->land_area,

            'selectedCategories' => $this->selectedCategories,

            'prev_inst_name' => $this->prev_inst_name,
            'prev_class' => $this->prev_class,
            'pass_year' => $this->pass_year,
            'gpa' => $this->gpa,
            'release_no' => $this->release_no,
            'releas_date' => $this->releas_date,

            'student_signature' => $this->student_signature,
            'guardian_signature' => $this->guardian_signature,

            'downloaded_form' => $this->downloaded_form,

            'admission_fee' => $this->admission_fee,
            'session_fee' => $this->session_fee,
            'total_fee' => $this->total_fee,
            'teacher_certified' => $this->teacher_certified,
            'principal_comment' => $this->principal_comment,

            'nid' => $this->nid,
            'release_certificate' => $this->release_certificate,
            'jdc_marksheet' => $this->jdc_marksheet,
            'dakhil_marksheet' => $this->dakhil_marksheet,
            'alim_marksheet' => $this->alim_marksheet,
            'other_documents' => $this->other_documents,
        ]
    ];

    // PDF তৈরি করা হচ্ছে
    $pdf = Pdf::loadView('pdf.admission-form', $data)
              ->setPaper('legal', 'portrait');

    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->output();
    }, 'admission-form.pdf');
}
        public function render()
    {
        return view('livewire.admission-form-wizard');
    }

}
