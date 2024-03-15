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
                'ADVICER_STATUS'=>'INACTIVE',
                'POSITION_ID' => '2',
                'PROG_ID'=>'4'

            ],
          [
                'EMP_ID' => 'admin2',
                'NAME' => 'librarian assistant',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'INACTIVE',
                'POSITION_ID' => '2',
                'PROG_ID'=>'4'
            ],
           [
                'EMP_ID' => 'facultyIT',
                'NAME' => 'faculty IT',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [
                'EMP_ID' => 'facultyBSBA',
                'NAME' => 'faculty BSBA',
                'EMP_DEPT' => '5',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [
                'EMP_ID' => 'facultyBSHM',
                'NAME' => 'faculty BSHM',
                'EMP_DEPT' => '7',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [
                'EMP_ID' => 'facultyBSOA',
                'NAME' => 'faculty BSOA',
                'EMP_DEPT' => '8',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [

                'EMP_ID' => 'subAdmin4',
                'NAME' => 'Dean nang agri',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '3',
                'PROG_ID'=>'3'

            ],
            [

                'EMP_ID' => 'subAdmin3',
                'NAME' => 'Dean nang cet',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '3',
                'PROG_ID'=>'1'
            ],
            [

                'EMP_ID' => 'subAdmin2',
                'NAME' => 'Juliet Menor',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'INACTIVE',
                'POSITION_ID' => '3',
                'PROG_ID'=>'2'
            ],
            [

                'EMP_ID' => 'subAdmin1',
                'NAME' => 'Christian Dela Cruz',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '4',
                'PROG_ID'=>'2'
            ],
            [

                'EMP_ID' => 'MIS',
                'NAME' => 'jose carlo gamboa',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'INACTIVE',
                'POSITION_ID' => '1',
                'PROG_ID'=>'2'
            ],





        ];



              foreach ($data as $record) {
            EMPLOYEE::create($record);
        }
    }
}
