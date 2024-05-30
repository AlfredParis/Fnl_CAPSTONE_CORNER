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
                'NAME' => 'BENSON LESTER A. FLORES',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [
                'EMP_ID' => 'facultyIT3',
                'NAME' => 'NAPOLEON HERMOSO',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [
                'EMP_ID' => 'facultyBSHM',
                'NAME' => 'MILAGROSA M. MALICDEM',
                'EMP_DEPT' => '7',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [
                'EMP_ID' => 'facultyIT2',
                'NAME' => 'JOBELLE S. QUINTO',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '5',
                'PROG_ID'=>'2'
            ],
            [

                'EMP_ID' => 'subAdmin4',
                'NAME' => 'Dean of Agri',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '3',
                'PROG_ID'=>'3'

            ],
            [

                'EMP_ID' => 'subAdmin3',
                'NAME' => 'Dean of cet',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'ACTIVE',
                'POSITION_ID' => '3',
                'PROG_ID'=>'1'
            ],
            [

                'EMP_ID' => 'subAdmin2',
                'NAME' => 'JULIET V. MENOR ',
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
                'NAME' => 'JOSE CARLOS C. GAMBOA',
                'EMP_DEPT' => '6',
                'ADVICER_STATUS'=>'INACTIVE',
                'POSITION_ID' => '1',
                'PROG_ID'=>'2'
            ],
            [

                'EMP_ID' => 'plagiarism',
                'NAME' => 'plagiarism',
                'EMP_DEPT' => '10',
                'ADVICER_STATUS'=>'plagiarism',
                'POSITION_ID' => '1',
                'PROG_ID'=>'4'
            ],




        ];



              foreach ($data as $record) {
            EMPLOYEE::create($record);
        }
    }
}
