<?php

namespace App\Livewire\Admission;

use Livewire\Component; 
use Illuminate\Support\Facades\DB;
use App\Models\User;
//use App\Models\Quotata;
use livewire\withFileUploads;

class AdmissionWizard extends Component
{

use WithFileUploads;

// step control
public $currentStep = 1;
// step 1 personal and guardian info
public $name_bn,
        

    
    public function render()
    {
        return view('livewire.admission.admission-wizard');
    }
}