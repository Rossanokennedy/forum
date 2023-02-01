<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Info;
use App\Models\Discussion;
use App\Models\Response;
use App\Models\Forum;
use Validator;
use App\Http\Controllers\Controller;

class ForumsController extends Controller
{
    public function index()
    {
        return view("forums.index", ["forums" => Forum::paginate(20)]);
    }

    public function forumcheck(Request $request)
    {
        $forum_rules = Validator::make($request -> all(), [
            "title" => "required|min:4|max:255"
        ]);

        if($forum_rules -> fails())
        {
            $title_err = $forum_rules -> errors() -> first("title");
            echo $title_err . "~ ";
        }
        else
        {
            $enter_forum = [
                "title" => $request -> post("title"),
                "user_id" => auth() -> user() -> id
            ];
            $new_forum = Forum::create($enter_forum);

            echo "noerr~ " . $new_forum -> id;
        }
    }

    public function view(Forum $forum)
    {
        return view("forums.view", ["forum" => $forum]);
    }

    public function store(Forum $forum ,Request $request)
    {
        $discussion_rules = Validator::make($request -> all(), [
            "viewBody" => "required|min:10"
        ]);

        if($discussion_rules ->fails())
        {
            $discuss_err = $discussion_rules -> errors() -> first("viewBody");
            echo $discuss_err . "~ ";
        }
        else
        {
            $new_discuss = [
                "forum_id" => $forum -> id,
                "user_id" => auth() -> user() -> id,
                "body" => $request -> post("viewBody")
            ];

            $send_discuss = Discussion::create($new_discuss);

            echo "noerr~ " . $forum -> id ."~ " . $send_discuss -> id;
        }
    }

    public function discussion(Forum $forum, Discussion $discussion)
    {
        return view("forums.discussion", compact("forum", "discussion"));
    }

    public function create(Discussion $discussion, Request $request)
    {
        $sent_response = "";
        $response_rules = Validator::make($request -> all(),[
            "responseBody" => "required|min:10"
        ]);

        if($response_rules -> fails())
        {
            echo $response_rules -> errors() -> first("responseBody");
        }
        else
        {
            $new_response = [
                "discussion_id" => $discussion -> id,
                "user_id" => auth() ->user() -> id,
                "body" => $request -> post("responseBody")
            ];

            $create_response = Response::create($new_response);
            $sent_response .= '<div class="discussion_body">';
            $sent_response .= '<div class="discussion_user">';
            $sent_response .= '<img src="' . auth() -> user() -> info -> getPic() . '" alt="" class="main-img">';
            $sent_response .= '<span class="discussion_username"> <a href="/profile/' . auth() -> user() -> id  . '" class="sm-link">' .  auth() -> user() -> username . '</a> postado: </span></div>';
            $sent_response .= '<div class="discussion_main">';
            $sent_response .= $request -> post("responseBody");
            $sent_response .= '</div><div class="discussion_info">';
            $sent_response .= 'em' . date("m/d/Y g:i A", strtotime($create_response -> created_at)) . '</div></div>';

            echo "noerr~ " . $sent_response;
        }
    }
}
