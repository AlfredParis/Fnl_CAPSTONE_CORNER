<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\archive;

class arvhiveSeed extends Seeder
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
                'AUTHOR_ID' => 'jayson Sanchez',
                'GITHUB_LINK' => 'hahasfasaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',

                // Add more columns and values as needed
            ],
          [
                'ARCH_ID' => 'arch-2',
                'ARCH_NAME' => 'Online E-Learning System',
                'AUTHOR_ID' => 'Alfred Paris',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-3',
                'ARCH_NAME' => 'Online Examination System',
                'AUTHOR_ID' => 'jayson rosario',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-4',
                'ARCH_NAME' => 'Student Tracking Performance',
                'AUTHOR_ID' => 'diosdado the goat',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-5',
                'ARCH_NAME' => 'Library Information System',
                'AUTHOR_ID' => 'fredy pogi',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-6',
                'ARCH_NAME' => ' Student Information System',
                'AUTHOR_ID' => 'Alexander tamad',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-7',
                'ARCH_NAME' => 'Student Handbook Application',
                'AUTHOR_ID' => 'Marco Mangiras',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-8',
                'ARCH_NAME' => 'Thesis and Capstone Archiving System',
                'AUTHOR_ID' => 'Ralhp Rens Valerio',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-9',
                'ARCH_NAME' => 'School Portal Application',
                'AUTHOR_ID' => 'Marlyn Aquino',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-10',
                'ARCH_NAME' => 'School Events Attendance System',
                'AUTHOR_ID' => 'Rea santos',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-11',
                'ARCH_NAME' => 'Grading System',
                'AUTHOR_ID' => 'Michelle fernandez',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-12',
                'ARCH_NAME' => 'Student Council Voting System',
                'AUTHOR_ID' => 'hahaha basta ngaran',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-13',
                'ARCH_NAME' => 'Class Scheduling System',
                'AUTHOR_ID' => 'ngaran lamet syempre',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-14',
                'ARCH_NAME' => 'Online School Documents Processing with Payment System',
                'AUTHOR_ID' => 'hehe ngaran kumatlo la',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-15',
                'ARCH_NAME' => 'Faculty Evaluation System',
                'AUTHOR_ID' => 'ARCH_NAME ulit ',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'ARCH_ID' => 'arch-16',
                'ARCH_NAME' => 'Student Profile and Guidance Services with Decision Support',
                'AUTHOR_ID' => 'Last na ARCH_NAME na to pri',
                'GITHUB_LINK' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],
        ];

        // Insert the data into the database using Eloquent's create method
        foreach ($data as $record) {
            archive::create($record);
        }



    }
}
