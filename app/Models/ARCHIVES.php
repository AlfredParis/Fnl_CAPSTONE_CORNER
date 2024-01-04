<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ARCHIVES extends Model
{
    use HasFactory;

    protected $fillable = [
        // Other fillable fields here
        'ARCH_ID',
        'viewCount',
    ];
}
