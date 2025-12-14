<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Division;

class StudentAdmissionForm extends Component
{
    // parsonal information
    public $name_en;
    public $email;
    public $class;
    public $phone;
    public $address_permanent;
    public $address_temporary;
    public $date_of_birth;
    public $gender;
    public $is_active = true;
    public $profile_picture;
    // guardian information
    public $father_name;
    
    public function render()
    {

        return view('livewire.student-admission-form');
    }
}
