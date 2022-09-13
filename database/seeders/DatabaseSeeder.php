<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create(['name' => 'doctor']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'patient']);

        Department::truncate();

        $departments = [

            'Audiologists',
            'Cardiovascular Technologists',
            'Cardiac sonographer',
            'Cardiovascular invasive specialist',
            'Cardiovascular perfusionist',
            'Central service technician',
            'Child life specialist',
            'Cytogenetic technologist',
            'Cytotechnologist',
            'Diagnostic medical sonographer',
            'Dietitian',
            'Emergency medicine paramedic',
            'Hemodialysis technician',
            'Histology technician',
            'Hospital chaplain',
            'Medical laboratory scientist',
            'Medical massage therapist',
            'Medical physicist',
            'Medical social worker',
            'Medical speech-language pathologist',
            'Molecular genetics technologist',
            'Neurodiagnostic technologist',
            ' Nuclear medicine technologist',
            'Hospitalist',
            ' Mental Health Counselor',
            'Nurse',
            'Nurse anesthetist',
            'Nurse midwife',
            'Nurse practitioner',
            'Occupational therapist',
            ' Orthodontist',
            'Orthoptist',
            'Optamologist',
            'Optician',
            'Pathologists assistant',
            ' Paramedic',
            'Perioperative nurse',
            'Pharmacist',
            'Pharmacy technician',
            'Phlebotomy technician',
            ' Physical therapist',
            'Physician assistant',
            ' Positron emission tomography technologist',
            'Radiation therapist',
            'Radiologic technologist',
            'Recreational therapist',
            ' Respiratory therapist',
            ' Surgical first assistant',
            ' Surgical technologist',
            'Surgeon'




        ];

        foreach ($departments as  $department) {

            # code...
            Department::create(['name' => $department]);
        }
    }
}
