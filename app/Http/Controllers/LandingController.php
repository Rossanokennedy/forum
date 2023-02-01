<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\User;
use App\Models\Forum;
use Validator;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        $forums = Forum::orderBy("created_at", "DESC") -> limit(5) -> get();
        return view("landing.index", ["forums" => $forums]);
    }

    public function singin()
    {
        return view("landing.singin");
    }

    public function singup()
    {
        return view("landing.singup");
    }

    public function singupcheck(Request $request)
    {
        $singup_rules = Validator::make($request -> all(), [
            "name" => "required|max:100|min:3|unique:users,name",
            "social_name" => "max:100|min:3",
            "cpf" => "required|min:5|max:60|unique:users,cpf", 
            "birth_date" => "required",
            "state" => "required",
            "city" => "required",
            "user_type" => "nullable",
            "password" => "required|min:8",
            "conf" => "required|same:password"
        ]);

        if($singup_rules -> fails())
        {
            $name_err = $singup_rules -> errors() -> first("name");
            $socialname_err = $singup_rules -> errors() -> first("social_name");
            $cpf_err =  $singup_rules -> errors() -> first("cpf");
            $birthdate_err = $singup_rules -> errors() -> first("birth_date");
            $state_err = $singup_rules -> errors() -> first("state");
            $city_err = $singup_rules -> errors() -> first("city");
            $pass_err = $singup_rules -> errors() -> first("password");
            $conf_err = $singup_rules -> errors() -> first("conf");

            echo $name_err . "~ " . $socialname_err . "~ " . $cpf_err. "~ " . $birthdate_err . "~ ". $state_err . "~ " . $city_err . "~ " . $pass_err . "~ " . $conf_err;
        }
        else
        {
            $new_user = [
                "name" => $request -> post("name"),
                "social_name" => $request -> post("social_name"),
                "cpf" => $request -> post("cpf"),
                "birth_date" => $request -> post("birth_date"),
                "state" => $request -> post("state"),
                "city" => $request -> post("city"),
                "password" => password_hash($request -> post("password"), PASSWORD_BCRYPT)           
            ];

            $created_user = User::create($new_user);
            auth() -> login($created_user);

            echo "noerr~ " . $created_user ->id;
        }
    }

    public function singincheck(Request $request)
    {
        $singin_rules = Validator::make($request -> all(), [
            "cpf" => "required|min:11|max:11|exists:users,cpf",
            "password" => "required|min:8"
        ]);

        if($singin_rules -> fails())
        {
            $cpf_err = $singin_rules -> errors() -> first("cpf");
            $pass_err = $singin_rules -> errors() -> first("password");
            echo $cpf_err . "~ " . $pass_err;
        }
        else
        {
            $user = User::where("cpf", $request -> post("cpf")) -> first();
            if(!password_verify($request -> post("password"), $user -> password))
            {
                $cpf_err ="";
                $pass_err = "A senha não é valida!";
                echo $cpf_err . "~ " . $pass_err;
            }
            else
            {
                Auth::login($user);
                echo "noerr " . $user -> id;
            }
        }
    }
}
