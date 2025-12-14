<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentDistributionChart extends Component
{
    public function render()
    {
        // উদাহরণস্বরূপ gender ভিত্তিক distribution
        $maleCount = Student::where('gender', 'male')->count();
        $femaleCount = Student::where('gender', 'female')->count();

        $labels = ['Male', 'Female'];
        $data = [$maleCount, $femaleCount];

        return view('livewire.student-distribution-chart', compact('labels', 'data'));
    }
}