<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Info;
use App\Models\Forum;
use App\Models\Discussion;
use App\Models\Response;

class UsersController extends Controller
{
    public function dashboard(User $user)
    {
        return view("users.dashboard", ["user" => $user]);
    }

    public function index(User $user)
    {
        return view("users.index", ["user" => $user]);
    }

    public function edit(User $user)
    {
        return view("users.edit", ["user" => $user]);
    }

    public function update(User $user)
    {
        $this -> authorize("update", $user -> info);

        $update_rules = request() -> validate([
            "firstname" => "required|min:2|max:60",
            "lastname" => "required|min:2|max:60",
            "location" => "required|min:2|max:100",           
        ]);


        return redirect("/profile/{ $user -> id }");
    }

    public function logout()
    {
        auth() -> logout();
        return redirect() -> to("/");
    }
}
