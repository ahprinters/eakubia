<?php

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        Teacher::create([
            'name' => 'Md. Shamsul Alam',
            'subject' => 'Arabic',
        ]);

        Teacher::create([
            'name' => 'Nasima Akter',
            'subject' => 'Fiqh',
        ]);
    }
}