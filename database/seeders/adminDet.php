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
                'NAME' => 'admin1 name',

            ],
          [
                'EMP_ID' => 'admin2',
                'NAME' => 'admin2 name',

            ],  [
                'EMP_ID' => 'faculty1',
                'NAME' => 'faculty1 name',

            ],
        ];



              foreach ($data as $record) {
            EMPLOYEE::create($record);
        }
    }
}
