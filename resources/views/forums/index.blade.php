@extends("layout")

@section("tilte", "forums")

@section("content")

<div class="forum_wrapper wrapper">
    <h3 class="main-heading">Forums Disponiveis</h3>
    <div class="forum_create">
        @auth
            <a href="javascript:;" class="sm-link" onclick="showForum()">+ Create Forum</a>
        @endauth
    </div>
    <div class="forum_interior">
        @if(count($forums) < 1)
            <p class="no-data">Sem forums abertos</p>
        @else
            @foreach($forums as $f) 
                <div class="forum_list">
                    <div class="forum_title">
                       <a href="/forum/{{ $f -> id }}" class="main-link"> {{ $f -> title }} </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="forum_spot" id="forum_spot">
        <form name="forum_creation" method="post" onsubmit="event.preventDefault()">
            @csrf
            <div class="form-area">
                <input type="text" name="" id="forum_title" class="main-input" placeholder="Title">
                <p class="error" id="forum_err"></p>
            </div>
            <div class="forum_button">
                <button class="primary-button" onclick="createForum()">Criar</button>
            </div>
        </form>
    </div>
</div>

@endsection