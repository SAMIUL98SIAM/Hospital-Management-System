<?php

namespace Database\Seeders;

use App\Models\Admin\Doctor;
use App\Models\Admin\Speciality;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cardiacDoctor = Speciality::where('s_name', 'cardiac')->first();
        Doctor::updateOrCreate(['name' => 'Dr. Strange', 'phone' => '01992569682','room' => '2110','speciality_id'=>$cardiacDoctor->id,'deletable' => false]);

        $skinDoctor = Speciality::where('s_name', 'skin')->first();
        Doctor::updateOrCreate(['name' => 'Dr. Ibrahim', 'phone' => '01892569682', 'room' => '4356','speciality_id'=>$skinDoctor->id,'deletable' => false]);
    }
}
