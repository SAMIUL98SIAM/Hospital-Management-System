<?php

namespace Database\Seeders;

use App\Models\Admin\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::updateOrCreate(['s_name' => 'cardiac']);
        Speciality::updateOrCreate(['s_name' => 'skin']);
    }
}
