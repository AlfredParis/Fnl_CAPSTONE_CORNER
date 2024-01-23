<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\department;


class departmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {






        $data = [
            // cet start
            [
               'DEPT_NAME' => 'Bachelor of Elemtary',

                'PROG_ID' =>1,

            ],
            [
                'DEPT_NAME' => 'Bachelor of Technology and Livelihood Education',
               'PROG_ID' =>1,

            ],
            [
                'DEPT_NAME' => 'BSE major in Filipino',
                 'PROG_ID' =>1,

             ],
             [
                 'DEPT_NAME' => 'BSE major in Social Studies',
                'PROG_ID' =>1,

             ],
            // cet end

            // CHMBAC Start
             [
                'DEPT_NAME' => 'BS in Business Administration',
                 'PROG_ID' =>2,

             ],
             [
                 'DEPT_NAME' => 'BS in Information Technology',
                'PROG_ID' =>2,

             ],
             [
                'DEPT_NAME' => 'BS in Hospitality Management',
                 'PROG_ID' =>2,

             ],
             [
                 'DEPT_NAME' => 'BS in Office Administration',
                'PROG_ID' =>2,

             ],
              // CHMBAC End

             [
                'DEPT_NAME' => 'BS in Agriculture',
                 'PROG_ID' =>3,

             ],
             [
                'DEPT_NAME' => 'Library',
                 'PROG_ID' =>4,

             ],


        ];


            foreach ($data as $record) {
                department::create($record);
        }
    }
}
