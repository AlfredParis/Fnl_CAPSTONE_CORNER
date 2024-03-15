<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\archStatus;
class arch_stat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'arch_stat' => 'in Progress',
            ],
            [
                'arch_stat' => 'Proposal',
            ],
            [
                'arch_stat' => 'Final Defense',
            ],
            [
                'arch_stat' => 'Defended',
            ],


        ];
        foreach ($data as $record) {
            archStatus::create($record);}
    }
}
