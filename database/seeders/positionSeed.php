<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\position;


class positionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $data = [
            [
                'POSITION_NAME' => 'MIS',
            ],
            [
                'POSITION_NAME' => 'Library',
            ],
            [
                'POSITION_NAME' => 'Dean',
            ],
            [
                'POSITION_NAME' => 'Chairman',
            ],
            [
                'POSITION_NAME' => 'faculty',
            ],
            [
                'POSITION_NAME' => 'non-teaching',
            ],
        ];
        foreach ($data as $record) {
            position::create($record);

    }
}
}
