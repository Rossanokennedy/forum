@extends("layout")

@section("title", "Editar Perfil")

@section("content")

<div class="edit_wrapper wrapper">
    <h3 class="main-heading">Editar seu perfil</h3>
    <form action="/profile/{{ $user -> id }}/update" method="post" enctype="multipart/form-data">
        @csrf 
        @method("PATCH")
        <div class="form-area">
            <input type="text" name="edit_firstname" id="" class="main-input" @if($user -> info -> firstname == "" ) placeholder = "First Name" @else value = {{ $user -> info -> firstname }} @endif >
            <p class="error"> @if($errors -> has("edit_firstname")) {{ $errors -> first("edit_firstname") }} @endif </p>
        </div>
        <div class="form-area">
            <input type="text" name="edit_lastname" id="" class="main-input" @if($user -> info -> lastname == "" ) placeholder = "Last Name" @else value = {{ $user -> info -> lastname }} @endif >
            <p class="error"> @if($errors -> has("edit_lastname")) {{ $errors -> first("edit_lastname") }} @endif </p>
        </div>
        <div class="form-area">
            <input type="text" name="edit_location" id="" class="main-input" @if($user -> info -> location == "" ) placeholder = "Location" @else value = {{ $user -> info -> location }} @endif >
            <p class="error"> @if($errors -> has("edit_location")) {{ $errors -> first("edit_location") }} @endif </p>
        </div>
        <div class="form-area">
            <input type="file" name="edit_pic">
            <p class="error"> @if($errors -> has("edit_pic")) {{ $errors -> first("edit_pic") }} @endif </p>
        </div>
        <div class="edit-button">
            <input type="submit" value="Edit" class="primary-button">
        </div>
    </form>
</div>

@endsection