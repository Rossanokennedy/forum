<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "birth_date",
        "cpf",
        "subforum"
    ];

    public function user()
    {
        return $this -> belongsTo("\App\Models\User");
    }

}