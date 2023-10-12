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
                'ARCH_ID' => 'arch-1',
                'ARCH_NAME' => 'Online E-Learning System',
                'ABSTRACT' => 'Online E-Learning System',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahasfasaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',

            ],
          [
                'ARCH_ID' => 'arch-2',
                'ARCH_NAME' => 'POINT OF SALE SYSTEM',
                 'ABSTRACT' => 'POINT OF SALE SYSTEM',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-3',
                'ARCH_NAME' => 'Online Examination System',
                 'ABSTRACT' => 'Online Examination System',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-4',
                'ARCH_NAME' => 'Student Tracking Performance',
                 'ABSTRACT' => 'Student Tracking Performance',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-5',
                'ARCH_NAME' => 'Library Information System',
                 'ABSTRACT' => 'Library Information System',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
               'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-6',
                'ARCH_NAME' => ' Student Information System',
                 'ABSTRACT' => 'Student Information System',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-7',
                'ARCH_NAME' => 'Student Handbook Application',
                 'ABSTRACT' => 'Student Handbook Application',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-8',
                'ARCH_NAME' => 'Thesis and Capstone Archiving System',
                 'ABSTRACT' => 'Thesis and Capstone Archiving System',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
               'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-9',
                'ARCH_NAME' => 'School Portal Application',
                 'ABSTRACT' => 'School Portal Application',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],[
                'ARCH_ID' => 'arch-10',
                'ARCH_NAME' => 'School Events Attendance System',
                 'ABSTRACT' => 'School Events Attendance System',
                'AUTHOR_ID' => '20-SC-0147',
                'GITHUB_LINK' => 'hahaha.git',
                'PDF_FILE' => 'Wala tong laman This is from prodution seeder',
                'IS_APPROVED' => 'approved',
            ],
        ];

        foreach ($data as $record) {
            ARCHIVES::create($record);
        }


    }
}
