<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student_acc;

class studAcc extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'S_ID' => '20-sc-0147',
                'PASSWORD' =>encrypt( 'student'),
                'ACCTYPE' => 'student',
            ],
            [
                'S_ID' => '20-sc-0148',
                'PASSWORD' =>encrypt( 'student'),
                'ACCTYPE' => 'student',
            ],
        ];


              foreach ($data as $record) {
            student_acc::create($record);
        }

    }
}
