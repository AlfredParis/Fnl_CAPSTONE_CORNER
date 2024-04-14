<?php

namespace App\Models;
// use App\Models\group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPLOYEE extends Model
{
    use HasFactory;

    public function groups()
    {
        return $this->belongsToMany(group::class);
    }

}
