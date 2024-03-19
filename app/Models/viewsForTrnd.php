<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewsForTrnd extends Model
{
    use HasFactory;
    protected $table = 'views_for_trnds'; 
    protected $fillable = ['TRND_ID', 'VIEWS'];
}
