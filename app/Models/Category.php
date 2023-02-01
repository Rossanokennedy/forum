<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forum;
use App\Models\Discussion;
use App\Models\Response;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this -> belongsTo("\App\Models\User");
    }

    public function forum(){
        return $this -> belongsTo("\App\Models\Forum");
    }

    public function discussion()
    {
        return $this -> hasMany("\App\Models\Discussion");
    }
}
