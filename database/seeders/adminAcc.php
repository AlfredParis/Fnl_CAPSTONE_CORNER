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
                'EMP_ID' => 'faculty1',
                'ACCTYPE' => 'faculty',

            ],
        ];


              foreach ($data as $record) {
            USER_ACC_EMP::create($record);
        }


    }
}
