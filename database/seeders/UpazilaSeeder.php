<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('upazilas')->insert([
            
            //sunamganj District Upazilas
            ['name' => 'Bishwamvarpur', 'district_id' => 56],
            ['name' => 'Sunamganj Sadar', 'district_id' => 56],
            ['name' => 'Chhatak', 'district_id' => 56],
            ['name' => 'Dowarabazar', 'district_id' => 56],
            ['name' => 'Jagannathpur', 'district_id' => 56],
            ['name' => 'Santiganj', 'district_id' => 56],
            ['name' => 'Derai', 'district_id' => 56],
            ['name' => 'Sullah', 'district_id' => 56],
            ['name' => 'Tahirpur', 'district_id' => 56],
            ['name' => 'Jamalganj', 'district_id' => 56],
            ['name' => 'Dharmapasha', 'district_id' => 56],
            ['name' => 'Moddho Nagar', 'district_id' => 56],
            
            
        ]);
    }
}
