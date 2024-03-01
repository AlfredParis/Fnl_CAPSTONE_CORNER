<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\program;

class programSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {





        $data = [
            [
                'PROG_NAME' => 'College of Teacher Education',
                'PROG_ABBR' => 'CTE'

            ],
            [
                'PROG_NAME' => 'College of Hospitality Management, Business Administration and Computing',
                'PROG_ABBR' => 'CHMBAC'
            ],
            [
                'PROG_NAME' => 'College of Agriculture',
                'PROG_ABBR' => 'College of Agri'
            ],

            [
                'PROG_NAME' => 'non-teaching',
                'PROG_ABBR' => 'non-teaching'
            ],
        ];


              foreach ($data as $record) {
                program::create($record);
        }
    }
}
