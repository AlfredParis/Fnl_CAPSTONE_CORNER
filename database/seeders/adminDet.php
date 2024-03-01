<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EMPLOYEE;

class adminDet extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $data = [
            [
                'EMP_ID' => 'admin1',
                'NAME' => 'librarian',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'ACTIVE'

            ],
          [
                'EMP_ID' => 'admin2',
                'NAME' => 'librarian assistant',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'ACTIVE'

            ],
           [
                'EMP_ID' => 'facultyIT',
                'NAME' => 'faculty IT',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'ACTIVE'
            ],
            [
                'EMP_ID' => 'facultyBSBA',
                'NAME' => 'faculty BSBA',
                'EMP_DEPT' => '5',
                'ADVICER_STATUS'=>'ACTIVE'
            ],
            [
                'EMP_ID' => 'facultyBSHM',
                'NAME' => 'faculty BSHM',
                'EMP_DEPT' => '7',
                'ADVICER_STATUS'=>'ACTIVE'
            ],
            [
                'EMP_ID' => 'facultyBSOA',
                'NAME' => 'faculty BSOA',
                'EMP_DEPT' => '8',
                'ADVICER_STATUS'=>'ACTIVE'
            ],
            [

                'EMP_ID' => 'subAdmin',
                'NAME' => 'subAdmin',
                'EMP_DEPT' => '',
                'ADVICER_STATUS'=>'INACTIVE'
            ],
            [

                'EMP_ID' => 'MIS',
                'NAME' => 'MIS',
                'EMP_DEPT' => '0',
                'ADVICER_STATUS'=>'INACTIVE'
            ],





        ];



              foreach ($data as $record) {
            EMPLOYEE::create($record);
        }
    }
}
