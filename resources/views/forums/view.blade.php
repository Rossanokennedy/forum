@extends("layout")

@section("title", $forum -> title)

@section("content")

<div class="view_wrapper wrapper">
    <h3 class="main-heading">{{ $forum -> title }}</h3>
    <div class="view_interior">
        @auth
            <div class="view_link"><a href="javascript:;" class="sm-link" onclick="showDiscussion()">+ iniciar discussão</a></div>
        @endauth
        <div class="view_list">
            @if($forum -> discussion -> count() < 1)
                <p class="no-data">Sem discusões abertas</p>
            @else
                @foreach($forum -> discussion as $fd)
                    <div class="view_discussion">
                        <a href="/forum/{{ $fd -> forum_id }}/{{ $fd -> id }}" class="main-link">{{ \Illuminate\Support\Str::limit($fd -> body, 15) }}</a>
                        <span class="view_date">Publicado em {{ date("m/d/Y g:i A", strtotime( $fd -> created_at )) }} por <span class="view_user">{{ $fd -> user -> info -> username }}</span></span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="view_discussion_area" id="view_discuss">
        <form name="view_form" method="post" onsubmit="event.preventDefault()">
        @csrf
            <div class="form-textarea">
                <textarea id="view_body" class="main-textarea" placeholder="Comece uma discussão"></textarea>
                <p class="error" id="view_err"></p>
            </div>
            <div class="view_button">
                <button class="primary-button" onclick="newDiscussion({{ $forum -> id }})">Criar</button>
            </div>
        </form>
    </div>
</div>

@endsection