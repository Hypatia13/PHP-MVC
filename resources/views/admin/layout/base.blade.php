<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Using @yield to add dynamic content--}}
    <title>Admin page - @yield('title')</title>

    {{--Terry's line here is "css/all.css" -> how is this a path??? --}}
   {{-- Your css files need to be in /public so that a browser can request them.
    Like a /public/css folder--}}
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>

<div class="off-canvas position-left reveal-for-large" id="offCanvas" data-off-canvas>

 {{--   <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
    </button>--}}

    <!-- Menu -->
    <ul class="vertical menu">
        <li><a href="#">Foundation</a></li>
        <li><a href="#">Dot</a></li>
        <li><a href="#">ZURB</a></li>
        <li><a href="#">Com</a></li>
        <li><a href="#">Slash</a></li>
        <li><a href="#">Sites</a></li>
    </ul>

</div>

<div class="off-canvas-content" data-off-canvas-content>
    @yield('content')
</div>


{{--Terry's line here is "js/all.js" -> how is this a path??? --}}
<script src="/js/all.js"></script>
</body>
</html>