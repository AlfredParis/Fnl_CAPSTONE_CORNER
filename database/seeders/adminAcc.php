<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\USER_ACC_EMP;


class adminAcc extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [

                'PASSWORD' => encrypt('admin'),
                'EMP_ID' => 'admin1',
                'ACCTYPE' => 'admin',

            ],
             [

                'PASSWORD' => encrypt('admin'),
                'EMP_ID' => 'admin2',
                'ACCTYPE' => 'admin',

            ],

        [
                'PASSWORD' => encrypt('faculty'),
                'EMP_ID' => 'facultyIT',
                'ACCTYPE' => 'faculty',

            ],

            [
                'PASSWORD' => encrypt('faculty'),
                'EMP_ID' => 'facultyIT3',
                'ACCTYPE' => 'faculty',

            ],

            [
                'PASSWORD' => encrypt('faculty'),
                'EMP_ID' => 'facultyBSHM',
                'ACCTYPE' => 'faculty',

            ],

            [
                'PASSWORD' => encrypt('faculty'),
                'EMP_ID' => 'facultyIT2',
                'ACCTYPE' => 'faculty',

            ],



            [
                'PASSWORD' => encrypt('subAdmin'),
                'EMP_ID' => 'subAdmin4',
                'ACCTYPE' => 'subAdmin',

            ],
            [
                'PASSWORD' => encrypt('subAdmin'),
                'EMP_ID' => 'subAdmin3',
                'ACCTYPE' => 'subAdmin',

            ],
            [
                'PASSWORD' => encrypt('subAdmin'),
                'EMP_ID' => 'subAdmin2',
                'ACCTYPE' => 'subAdmin',

            ],
            [
                'PASSWORD' => encrypt('subAdmin'),
                'EMP_ID' => 'subAdmin1',
                'ACCTYPE' => 'subAdmin',

            ],
            [
                'PASSWORD' => encrypt('P@ssw0rd'),
                'EMP_ID' => 'MIS',
                'ACCTYPE' => 'superAdmin',

            ],
            [
                'PASSWORD' => encrypt('P@ssw0rd'),
                'EMP_ID' => 'plagiarism',
                'ACCTYPE' => 'plagiarism',

            ],
        ];


              foreach ($data as $record) {
            USER_ACC_EMP::create($record);
        }


    }
}
