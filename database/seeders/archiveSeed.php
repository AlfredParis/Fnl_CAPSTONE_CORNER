<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ARCHIVES ;

class archiveSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  $data = [
            [
                'ARCH_ID' => 'IT-1',
                'ARCH_NAME' => 'Online E-Learning System',
                'ABSTRACT' => 'Online E-Learning System',

                'GITHUB_LINK' => 'hahasfasaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2018',
            ],
          [
                'ARCH_ID' => 'IT-2',
                'ARCH_NAME' => 'POINT OF SALE SYSTEM',
                 'ABSTRACT' => 'POINT OF SALE SYSTEM',

                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2019',
            ],[
                'ARCH_ID' => 'IT-3',
                'ARCH_NAME' => 'Online Examination System',
                 'ABSTRACT' => 'Online Examination System',

                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2020',
            ],[
                'ARCH_ID' => 'IT-4',
                'ARCH_NAME' => 'Student Tracking Performance',
                 'ABSTRACT' => 'Student Tracking Performance',

                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2021',
            ],[
                'ARCH_ID' => 'IT-5',
                'ARCH_NAME' => 'Library Information System',
                 'ABSTRACT' => 'Library Information System',

                'GITHUB_LINK' => 'hahaha.git',
               'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2022',
            ],[
                'ARCH_ID' => 'IT-6',
                'ARCH_NAME' => ' Student Information System',
                 'ABSTRACT' => 'Student Information System',

                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2023',
            ],[
                'ARCH_ID' => 'IT-7',
                'ARCH_NAME' => 'Student Handbook Application',
                 'ABSTRACT' => 'Student Handbook Application',

                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2023',
            ],[
                'ARCH_ID' => 'IT-8',
                'ARCH_NAME' => 'Thesis and Capstone Archiving System',
                 'ABSTRACT' => 'Thesis and Capstone Archiving System',

                'GITHUB_LINK' => 'hahaha.git',
               'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2022',
            ],[
                'ARCH_ID' => 'IT-9',
                'ARCH_NAME' => 'School Portal Application',
                 'ABSTRACT' => 'School Portal Application',

                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2023',
            ],[
                'ARCH_ID' => 'IT-10',
                'ARCH_NAME' => 'School Events Attendance System',
                 'ABSTRACT' => 'School Events Attendance System',

                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
                'YEAR_PUB'=> 'JUNE 2017',
            ],
        ];

        foreach ($data as $record) {
            ARCHIVES::create($record);
        }


    }
}
