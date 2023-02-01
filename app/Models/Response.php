<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Discussion;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        "discusion_id",
        "user_id",
        "body",
    ];

    public function user()
    {
        return $this -> belongsTo("\App\Models\User");
    }

    public function discussion()
    {
        return $this -> belongsTo("\App\Models\Discussion");
    }

}
