<?php

namespace App\Models;
use App\Models\EMPLOYEE;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;


        public function panelists()
        {
            return $this->belongsToMany(EMPLOYEE::class);
        }
}
