<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wards')->insert([
            //Sunamganj Sadar Upazila Wards
            //Sunamganj Pouroshova Wards
            ['name' => 'Ward 1', 'union_id' => 1],
            ['name' => 'Ward 2', 'union_id' => 1],
            ['name' => 'Ward 3', 'union_id' => 1],
            ['name' => 'Ward 4', 'union_id' => 1],
            ['name' => 'Ward 5', 'union_id' => 1],
            ['name' => 'Ward 6', 'union_id' => 1],
            ['name' => 'Ward 7', 'union_id' => 1],
            ['name' => 'Ward 8', 'union_id' => 1],
            ['name' => 'Ward 9', 'union_id' => 1],         
            //Kurban Nagar Wards
            ['name' => 'Ward 1', 'union_id' => 2],
            ['name' => 'Ward 2', 'union_id' => 2],
            ['name' => 'Ward 3', 'union_id' => 2],
            ['name' => 'Ward 4', 'union_id' => 2],
            ['name' => 'Ward 5', 'union_id' => 2],
            ['name' => 'Ward 6', 'union_id' => 2],
            ['name' => 'Ward 7', 'union_id' => 2],
            ['name' => 'Ward 8', 'union_id' => 2],
            ['name' => 'Ward 9', 'union_id' => 2],
            //Mollapara Wards
            ['name' => 'Ward 1', 'union_id' => 3],
            ['name' => 'Ward 2', 'union_id' => 3],
            ['name' => 'Ward 3', 'union_id' => 3],
            ['name' => 'Ward 4', 'union_id' => 3],
            ['name' => 'Ward 5', 'union_id' => 3],
            ['name' => 'Ward 6', 'union_id' => 3],
            ['name' => 'Ward 7', 'union_id' => 3],
            ['name' => 'Ward 8', 'union_id' => 3],
            ['name' => 'Ward 9', 'union_id' => 3],
            //Rongarchor Wards
            ['name' => 'Ward 1', 'union_id' => 4],
            ['name' => 'Ward 2', 'union_id' => 4],
            ['name' => 'Ward 3', 'union_id' => 4],
            ['name' => 'Ward 4', 'union_id' => 4],
            ['name' => 'Ward 5', 'union_id' => 4],
            ['name' => 'Ward 6', 'union_id' => 4],
            ['name' => 'Ward 7', 'union_id' => 4],
            ['name' => 'Ward 8', 'union_id' => 4],
            ['name' => 'Ward 9', 'union_id' => 4],
            //Jahangir Nagar Wards
            ['name' => 'Ward 1', 'union_id' => 5],
            ['name' => 'Ward 2', 'union_id' => 5],
            ['name' => 'Ward 3', 'union_id' => 5],
            ['name' => 'Ward 4', 'union_id' => 5],
            ['name' => 'Ward 5', 'union_id' => 5],
            ['name' => 'Ward 6', 'union_id' => 5],
            ['name' => 'Ward 7', 'union_id' => 5],
            ['name' => 'Ward 8', 'union_id' => 5],
            ['name' => 'Ward 9', 'union_id' => 5],
            //Surma Wards
            ['name' => 'Ward 1', 'union_id' => 6],
            ['name' => 'Ward 2', 'union_id' => 6],
            ['name' => 'Ward 3', 'union_id' => 6],
            ['name' => 'Ward 4', 'union_id' => 6],
            ['name' => 'Ward 5', 'union_id' => 6],
            ['name' => 'Ward 6', 'union_id' => 6],
            ['name' => 'Ward 7', 'union_id' => 6],
            ['name' => 'Ward 8', 'union_id' => 6],
            ['name' => 'Ward 9', 'union_id' => 6],
            //Gourarong Wards
            ['name' => 'Ward 1', 'union_id' => 7],
            ['name' => 'Ward 2', 'union_id' => 7],
            ['name' => 'Ward 3', 'union_id' => 7],
            ['name' => 'Ward 4', 'union_id' => 7],
            ['name' => 'Ward 5', 'union_id' => 7],
            ['name' => 'Ward 6', 'union_id' => 7],
            ['name' => 'Ward 7', 'union_id' => 7],
            ['name' => 'Ward 8', 'union_id' => 7],
            ['name' => 'Ward 9', 'union_id' => 7],
            //Loksonsree Wards
            ['name' => 'Ward 1', 'union_id' => 8],
            ['name' => 'Ward 2', 'union_id' => 8],
            ['name' => 'Ward 3', 'union_id' => 8],
            ['name' => 'Ward 4', 'union_id' => 8],
            ['name' => 'Ward 5', 'union_id' => 8],
            ['name' => 'Ward 6', 'union_id' => 8],
            ['name' => 'Ward 7', 'union_id' => 8],
            ['name' => 'Ward 8', 'union_id' => 8],
            ['name' => 'Ward 9', 'union_id' => 8],
            //Kathoir Wards
            ['name' => 'Ward 1', 'union_id' => 9],
            ['name' => 'Ward 2', 'union_id' => 9],
            ['name' => 'Ward 3', 'union_id' => 9],
            ['name' => 'Ward 4', 'union_id' => 9],
            ['name' => 'Ward 5', 'union_id' => 9],  
            ['name' => 'Ward 6', 'union_id' => 9],
            ['name' => 'Ward 7', 'union_id' => 9],
            ['name' => 'Ward 8', 'union_id' => 9],
            ['name' => 'Ward 9', 'union_id' => 9],
            //Mohonpur Wards
            ['name' => 'Ward 1', 'union_id' => 10],
            ['name' => 'Ward 2', 'union_id' => 10],
            ['name' => 'Ward 3', 'union_id' => 10],
            ['name' => 'Ward 4', 'union_id' => 10],
            ['name' => 'Ward 5', 'union_id' => 10],
            ['name' => 'Ward 6', 'union_id' => 10],
            ['name' => 'Ward 7', 'union_id' => 10],
            ['name' => 'Ward 8', 'union_id' => 10],
            ['name' => 'Ward 9', 'union_id' => 10],
            //Bishwamvarpur Upazila Wards
            //Polash Wards
            ['name' => 'Ward 1', 'union_id' => 11],
            ['name' => 'Ward 2', 'union_id' => 11],
            ['name' => 'Ward 3', 'union_id' => 11],
            ['name' => 'Ward 4', 'union_id' => 11],
            ['name' => 'Ward 1', 'union_id' => 11],
            ['name' => 'Ward 2', 'union_id' => 11],
            ['name' => 'Ward 3', 'union_id' => 11],
            ['name' => 'Ward 4', 'union_id' => 11],
            ['name' => 'Ward 5', 'union_id' => 11], 
            //
            // Add more wards as needed
        ]);
    }
}
