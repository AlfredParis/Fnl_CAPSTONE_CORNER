<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class STUDENT extends Model
{
    use HasFactory;
    protected $fillable = [
        'ARCH_ID',
        'S_ID',
    ];
}
