<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\status;


class facStatSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [

                'faculty_stat' => 'active',
                

            ],
             [

                'faculty_stat' => 'inactive',
               

            ],

      
        ];


              foreach ($data as $record) {
            USER_ACC_EMP::create($record);
        }

    }
}
