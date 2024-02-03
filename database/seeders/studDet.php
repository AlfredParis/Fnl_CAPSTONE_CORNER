<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\STUDENT;
class studDet extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'S_ID' => '20-sc-0147',
                'NAME' => 'Alfred Paris',
                'DEPT_ID'=>'6',
                'GROUP_ID' => 'N/A',

            ],
            [
                'S_ID' => '20-sc-0148',
                'NAME' => 'Jayson Sanchez',
                'DEPT_ID'=>'6',
                'GROUP_ID' => 'N/A',

            ],];


              foreach ($data as $record) {
            STUDENT::create($record);
        }
    }
}
