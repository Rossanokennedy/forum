<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Info;

class InfoPolicy
{
    public function update(User $user, Info $info)
    {
        return $user -> id === $info -> user_id;
    }

}