<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/layout.css') }}">
    <link rel="stylesheet" href="{{ url('css/pages.css') }}">
    <script src="{{ url('js/layout.js') }}"></script>
    <script src="{{ url('js/pages.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Forum: @yield("title")</title>
</head>

<body>
    @auth
    <nav class="user_header">
        <div class="user_logo">
            <a href="/dashboard/{{ auth() -> user() -> id }}" class="logo">Forum</a>
        </div>
        <div class="user_forum" >
            <a href="/forum" class="layout-link">Forum</a>
        </div>
        <div class="user_spot" onclick="showHeader()">
            <img src="/public/img/user/default.jpg" alt="">
        </div>
    </nav>
    <nav class="user_subheader" id="subheader">
        <div class="user_subprofile">
            <a href="/profile/{{ auth() -> user() ->id }}" class="layout-link">Perfil</a>
        </div>
        <div class="user_subedit">
            <a href="/profile/{{ auth() -> user() ->id }}/edit" class="layout-link">Editar perfil</a>
        </div>
        <div class="user_logout">
            <a href="/logout" class="layout-link">Sair</a>
        </div>
    </nav>
    @endauth

    @guest
    <nav class="guestheader">
        <div class="guesthome">
            <a href="/" class="logo">Forum</a>
        </div>
        <div class="guestsingin">
            <a href="/singin" class="main-link"><i class="far fa-user"></i></a>
        </div>
    </nav>
    @endguest
    <div class="wrapper">
        @yield("content")
    </div>
</body>

</html>