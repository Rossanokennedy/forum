<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ url('css/main.css') }}">
  <link rel="stylesheet" href="{{ url('css/landing.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Bem vindo ao forum</title>
</head>
<body>
  <div class="landing_wrapper">
    <nav class="landing_header">
      <div class="landing_logo">
        <a href="/" class="logo">Forum</a>
      </div>
      <div class="landing_singin">
        <a href="/singin"><i class="far fa-user"></i></a>
      </div>
    </nav>
    <div class="landing_pic"></div>
  </div>
  <div class="landing_forum">
      <div class="landing_heading">
        <div class="landing_forum_heading"><h4>Featured Forums </h4></div>
      </div>
      <div class="landing_forum_listing">
        @if(count($forums) < 1)
        <p class="no-data"> Sem forums abertos</p>
        @else
          @foreach($forums as $f)
            <div class="landing_forum_show">
              <div class="landing_forum_title">
                <a href="/forum/{{ $f -> id }}">{{ $f -> title }}</a>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  
</body>
</html>