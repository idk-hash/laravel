<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/css/styles.css">

  <title>Future Fridge Smart Portal</title>

</head>

<body>

    @if (\Session::has('message'))
        <div id="message">
            {!! \Session::get('message') !!}
        </div>

        <script>
            document.getElementById('message').classList.toggle("a-close");
            setTimeout(() => {document.getElementById('message').classList.toggle("a-close");}, 3000);
        </script>
    @endif

    @auth
        <div class="nav-bar"></div>
        @include('components.nav-menu')

        <div class="main-cont">
            @yield('content')
        </div>
    @endauth

    @guest
        @include('components.login')
    @endguest

</body>
</html>
