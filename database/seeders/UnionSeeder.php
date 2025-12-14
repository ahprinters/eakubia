<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unions')->insert([
            //Sunamganj Sadar Upazila Unions
            ['name' => 'Sunamganj Pouroshova', 'upazila_id' => 2],
            ['name' => 'Kurban Nagar', 'upazila_id' => 2],
            ['name' => 'Mollapara', 'upazila_id' => 2],
            ['name' => 'Rongarchor', 'upazila_id' => 2],
            ['name' => 'Jahangir Nagar', 'upazila_id' => 2],
            ['name' => 'Surma', 'upazila_id' => 2],
            ['name' => 'Gourarong', 'upazila_id' => 2],
            ['name' => 'Loksonsree', 'upazila_id' => 2],
            ['name' => 'Kathoir', 'upazila_id' => 2],
            ['name' => 'Mohonpur', 'upazila_id' => 2],
            //Bishwamvarpur Upazila Unions
            ['name' => 'Polash', 'upazila_id' => 1],
            ['name' => 'Daksin Badaghat', 'upazila_id' => 1],
            ['name' => 'Solukabad', 'upazila_id' => 1],
            ['name' => 'Fotepur', 'upazila_id' => 1],
            //
            // Add more unions as needed
        ]);
    }
}
