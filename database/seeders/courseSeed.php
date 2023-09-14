<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\COURSE;
class courseSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
                   [
                       
                       'C_DESC' => 'BSIT',
                      
       
                   ]
       
               ];
       
               // Insert the data into the database using Eloquent's create method
               foreach ($data as $record) {
                COURSE::create($record);
               }
    }
}
