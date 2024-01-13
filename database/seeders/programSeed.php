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
                'PROG_NAME' => 'College of Teacher Education'
            ],
            [
                'PROG_NAME' => 'College of Hospitality Management, Business Administration and Computing'
            ],
            [
                'PROG_NAME' => 'College of Agriculture'
            ],

        ];


              foreach ($data as $record) {
                program::create($record);
        }
    }
}
