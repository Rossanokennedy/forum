@extends("layout")

@if(auth() -> user() -> id != $user -> id)
@section("title", $user -> name . "perfil")
@else
@section("title", "Seu perfil")
@endif

@section("content")
<div class="profile_wrapper">
    @if(auth() -> user() -> id != $user -> id)
    <h3 class="main-heading">{{ $user -> name }} perfil</h3>
    @else
    <h3 class="main-heading">Seu perfil</h3>
    @endif
    <div class="profile_interior">
        <div class="profile_info">
            <div class="profile_left">
                <div class="profile_picture"></div>
            </div>
            <div class="profile_right"></div>
        </div>
        <div class="profile_info">
            <div class="profile_left"><span class="profile_title">Nome completo: </span></div>
            <div class="profile_right"><span class="profile_information"> @if($user -> info -> name == "") <span class="no-data">Não esta disponivel</span> @else {{ $user -> info -> name }} @endif </span></div>
        </div>
        <div class="profile_info">
            <div class="profile_left"> <span class="profile_title">Data de nascimento: </span></div>
            <div class="profile_right"> <span class="profile_information"> {{ date("m/d/Y g:i A", strtotime($user -> birth_date)) }} </span></div>
        </div>
        <div class="profile_info">
            <div class="profile_left"><span class="profile_title">CPF: </span></div>
            <div class="profile_right"><span class="profile_information"> @if($user -> info -> cpf == "") <span class="no-data">Não esta disponivel</span> @else {{ $user -> info -> cpf }} @endif </span></div>
        </div>
        <div class="profile_info">
            <div class="profile_left"> <span class="profile_title">Subforuns associados: </span></div>
            <div class="profile_right"> <span class="profile_information"> @if($user -> info -> subforum == "") <span class="no-data">Não disponivel</span> @else {{ $user -> info -> subforum }} @endif </span></div>
        </div>
    </div>
</div>
@endsection