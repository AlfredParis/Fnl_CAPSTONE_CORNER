<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\advicer;
class adcStatSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [


                'EMP_ID' => 'admin1',
                'STAT'=> 'ACTIVE',
                'MAX_ADV'=> 3

            ],
             [


                'EMP_ID' => 'admin2',
                'STAT'=> 'ACTIVE',
                'MAX_ADV'=> 3

            ],

        [
                'EMP_ID' => 'facultyIT',
                'STAT'=> 'ACTIVE',
                'MAX_ADV'=> 3

            ],

            [

                'EMP_ID' => 'facultyBSBA',
               'STAT'=> 'ACTIVE',
               'MAX_ADV'=> 3

            ],

            [

                'EMP_ID' => 'facultyBSHM',
                'STAT'=> 'ACTIVE',
               'MAX_ADV'=> 3


            ],

            [

                'EMP_ID' => 'facultyBSOA',
                'STAT'=> 'ACTIVE',
                'MAX_ADV'=> 3

            ],



            [

                'EMP_ID' => 'subAdmin4',
                'STAT'=> 'ACTIVE',
                'MAX_ADV'=> 3

            ],
            [

                'EMP_ID' => 'subAdmin3',
                'STAT'=> 'ACTIVE',
                'MAX_ADV'=> 3

            ],
            [

                'EMP_ID' => 'subAdmin2',
                'ACCTYPE' => 'subAdmin',

            ],
            [

                'EMP_ID' => 'subAdmin1',
                'STAT'=> 'ACTIVE',
                'MAX_ADV'=> 3


            ],
            [

                'EMP_ID' => 'MIS',
                'STAT'=> 'ACTIVE',
               'MAX_ADV'=> 3

            ],
        ];
        foreach ($data as $record) {
            advicer::create($record);
        }

    }
}
