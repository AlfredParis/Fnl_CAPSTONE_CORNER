<?php

namespace Database\Seeders;
use App\Models\userCC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'acctype' => 'student',
                'userID' => 'student-1',
                'fullname' => 'jayson Sanchez',
                'password' => encrypt('sutdent'),

            ],
            [
                'acctype' => 'admin',
                'userID' => 'admin-1',
                'fullname' => 'Ralhp Valerio',
                'password' => encrypt('admin'),

            ],
            [
                'acctype' => 'faculty',
                'userID' => 'faculty-1',
                'fullname' => 'Alfred Paris',
                'password' => encrypt('faculty'),

            ],

        ];

        // Insert the data into the database using Eloquent's create method
        foreach ($data as $record) {
            userCC::create($record);
        }
    }
}
