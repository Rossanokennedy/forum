<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forum;
use App\Models\Response;
use App\Models\User;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        "forum_id",
        "user_id",
        "body",
    ];

    public function forum()
    {
        return $this -> belongsTo("\App\Models\Forum");
    }

    public function response()
    {
        return $this -> hasMany("\App\Models\Response");
    }

    public function user()
    {
        return $this -> belongsTo("\App\Models\User");
    }
}
