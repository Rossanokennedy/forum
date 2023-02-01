<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/landing.css') }}">
    <script src="{{ url('/js/landing.js') }}"></script>
    <title>Entrar</title>
</head>

<body>
    <div class="singin_wrapper form-border">
        <h3 class="main-heading">Entrar</h3>
        <form onsubmit="event.preventDefault()" name="singin_form" method="POST">
            @csrf
            <div class="form-area">
                <input type="text" id="singin_cpf" class="main-input" placeholder="CPF">
                <p class="error" id="cpf_err"></p>
            </div>
            <div class="form-area">
                <input type="password" id="singin_password" class="main_input" placeholder="Senha">
                <p class="error" id="pass_err"></p>
            </div>
            <div class="singin_button">
                <div class="singin_link">
                    <a href="/singup" class="sm-link">Ainda não esta cadastrado?</a>
                </div>
                <div class="singin_button">
                    <button class="primary-button" onclick="singin()">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>