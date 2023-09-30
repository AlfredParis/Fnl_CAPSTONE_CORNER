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
                'NAME' => 'student',
                'C_ID' => '1',
            ],];


              foreach ($data as $record) {
            STUDENT::create($record);
        }
    }
}
