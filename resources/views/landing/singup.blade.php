<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/landing.css') }}">
    <script src="{{ url('js/landing.js') }}"></script>
    <title>Sing Up</title>
</head>

<body>
    <div class="singup_wrapper form-border">
        <h3 class="main_heading">Se inscreva abaixo</h3>
        <form onsubmit="event.preventDefault()" name="singup_form" method="post">
            @csrf
            <div class="form-area">
                <input type="text" class="main-input" id="singup_name" placeholder="Nome Completo">
                <p class="error" id="name_err"></p>
            </div>
            <div class="form-area">
                <input type="text" class="main-input" id="singup_socialname" placeholder="Nome Social">
                <p class="error" id="socialname_err"></p>
            </div>
            <div class="form-area">
                <input type="text" id="singup_cpf" class="main-input" placeholder="CPF">
                <p class="error" id="cpf_err"></p>
            </div>
            <div class="block w-full mt-1">
                <input type="date" id="singup_birthdate" class="main-input" placeholder="Data de nascimento">
                <p class="error" id="birthdate_err"></p>
            </div>
            <div class="form-area">
                <input type="text" class="main-input" id="singup_state" placeholder="Estado">
                <p class="error" id="state_err"></p>
            </div>
            <div class="form-area">
                <input type="text" class="main-input" id="singup_city" placeholder="Cidade">
                <p class="error" id="city_err"></p>
            </div>
            <div class="form-area">
                <input type="password" id="singup_password" class="main-input" placeholder="Senha">
                <p class="error" id="password_err"></p>
            </div>
            <div class="form-area">
                <input type="password" id="conf_password" class="main-input" placeholder="Confirmar senha">
                <p class="error" id="conf_err"></p>
            </div>

            <div class="singup_buttons">
                <div class="singup_link">
                    <a href="/singin" class="sm-link">Ja esta cadastrado?</a>
                </div>
                <div class="singup_button">
                    <button class="primary-button" onclick="singup()">Sing up</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>