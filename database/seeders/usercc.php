<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class usercc extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'archID' => 'arch-1',
                'name' => 'Online E-Learning System',
                'author' => 'jayson Sanchez',
                'gh' => 'hahasfasaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],
          [
                'archID' => 'arch-2',
                'name' => 'Online E-Learning System',
                'author' => 'Alfred Paris',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-3',
                'name' => 'Online Examination System',
                'author' => 'jayson rosario',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-4',
                'name' => 'Student Tracking Performance',
                'author' => 'diosdado the goat',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-5',
                'name' => 'Library Information System',
                'author' => 'fredy pogi',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-6',
                'name' => ' Student Information System',
                'author' => 'Alexander tamad',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-7',
                'name' => 'Student Handbook Application',
                'author' => 'Marco Mangiras',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-8',
                'name' => 'Thesis and Capstone Archiving System',
                'author' => 'Ralhp Rens Valerio',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-9',
                'name' => 'School Portal Application',
                'author' => 'Marlyn Aquino',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-10',
                'name' => 'School Events Attendance System',
                'author' => 'Rea santos',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-11',
                'name' => 'Grading System',
                'author' => 'Michelle fernandez',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-12',
                'name' => 'Student Council Voting System',
                'author' => 'hahaha basta ngaran',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-13',
                'name' => 'Class Scheduling System',
                'author' => 'ngaran lamet syempre',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-14',
                'name' => 'Online School Documents Processing with Payment System',
                'author' => 'hehe ngaran kumatlo la',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-15',
                'name' => 'Faculty Evaluation System',
                'author' => 'name ulit ',
                'gh' => 'hahaha.git',
                'pdf_file' => 'Wala tong laman This is from prodution seeder',
                // Add more columns and values as needed
            ],[
                'archID' => 'arch-16',
                'name' => 'Student Profile and Guidance Services with Decision Support',
                'author' => 'Last na name na to pri',
                'gh' => 'hahaha.git',
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
