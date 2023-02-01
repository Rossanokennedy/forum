<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discussion;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function discussion()
    {
        return $this -> hasMany("\App\Models\Discussion");
    }

}
