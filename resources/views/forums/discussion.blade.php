@extends("layout")

@section("title", \Illuminate\Support\Str::limit($discussion -> body, 10))

@section("content")
<div class="discussion_wrapper wrapper">
    <h3 class="main-heading link_heading"><a href="/forum/{{ $forum -> id }}" class="main-link">{{ $forum -> title }}</a></h3>
    <div class="discussion_interior">
        <div class="discussion_body">
            <div class="discussion_user">
                <img src="{{ $discussion -> user -> info -> getPic() }}" alt="" class="main-img">
                <span class="discussion_username"> <a href="/profile/{{ $discussion -> user -> id }}" class="sm-link">{{ $discussion -> user -> username }}</a> postado: </span>
            </div>
            <div class="discussion_main">
                {{ $discussion -> body }}
            </div>
            <div class="discussion_info">
                em {{ date("m/d/Y g:i A", strtotime($discussion -> created_at)) }}
            </div>
        </div>
        <div class="discussion_list" id="discussion_list">
            @foreach($discussion -> response as $dr)
            <div class="discussion_body">
            <div class="discussion_user">
                <img src="{{ $dr -> user -> info -> getPic() }}" alt="" class="main-img">
                <span class="discussion_username"> <a href="/profile/{{ $dr -> user -> id }}" class="sm-link">{{ $dr -> user -> username }}</a> postado: </span>
            </div>
            <div class="discussion_main">
                {{ $dr -> body }}
            </div>
            <div class="discussion_info">
                em {{ date("m/d/Y g:i A", strtotime($dr -> created_at)) }}
            </div>
        </div>
            @endforeach
        </div>
    </div>
    @auth
    <div class="discussion_replies">
        <form onsubmit="event.preventDefault()" method="post">
            @csrf
            <div class="form-texarea">
                <textarea id="reply_body" class="main-textarea" placeholder="Reply?"></textarea>
                <p class="error" id="reply_err"></p>
                <p class="success" id="reply_success"></p>
            </div>
            <div class="discussion_button">
                <button class="primary-button" onclick="sendReply({{ $discussion -> id }})">Responder</button>
            </div>
        </form>
    </div>
    @endauth
</div>
@endsection