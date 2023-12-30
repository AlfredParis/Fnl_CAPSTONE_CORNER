<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\department;

class deptSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'DEPT_NAME' => 'BSIT',
                'PROG_ID' => '1',
            ],[
                'DEPT_NAME' => 'BSBA',
                'PROG_ID' => '1',
            ]
            ,[
                'DEPT_NAME' => 'BEE',
                'PROG_ID' => '2',
            ]
            ,[
                'DEPT_NAME' => 'Agriculture',
                'PROG_ID' => '3',
            ]
            ];

            foreach ($data as $record) {
                EMPLOYEE::create($record);
            }
    }
}
