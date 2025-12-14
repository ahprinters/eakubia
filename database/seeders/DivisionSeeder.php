<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        DB::table('divisions')->insert([
            ['name' => 'Dhaka'],
            ['name' => 'Chattogram'],
            ['name' => 'Rajshahi'],
            ['name' => 'Khulna'],
            ['name' => 'Barisal'],
            ['name' => 'Sylhet'],
            ['name' => 'Rangpur'],
            ['name' => 'Mymensingh'],
        ]);
    }


}
