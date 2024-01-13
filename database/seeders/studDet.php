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
                'C_ID' => '1',
                'ARCH_ID' => 'IT-1',
            ],
            [
                'S_ID' => '20-sc-0148',
                'NAME' => 'Jayson Sanchez',
                'C_ID' => '1',
                'ARCH_ID' => 'N/A',
            ],];


              foreach ($data as $record) {
            STUDENT::create($record);
        }
    }
}
