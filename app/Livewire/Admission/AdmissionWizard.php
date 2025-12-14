<?php
namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

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
              
    
        public function render()
    {
        return view('livewire.admission-form-wizard');
    }

}
