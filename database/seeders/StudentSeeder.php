<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'name' => 'Abdullah Al Mamun',
            'gender' => 'male',
            'class_name' => 'Class 9',
            'is_active' => true,
        ]);

        Student::create([
            'name' => 'Fatema Tuz Zahra',
            'gender' => 'female',
            'class_name' => 'Class 10',
            'is_active' => true,
        ]);
    }
}