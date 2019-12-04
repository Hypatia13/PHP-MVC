<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Using @yield to add dynamic content--}}
    <title>Admin page - @yield('title')</title>

    {{-- Look for the file style.css in the folder css at the root level of my website
    In Laravel the 'public' directory is a root level == your document root--}}
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>

{{--Sidebar--}}
<div class="off-canvas position-left reveal-for-large" id="offCanvas" data-off-canvas>

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
{{--Sidebar ends--}}

{{--Main content starts--}}

<div class="off-canvas-content" data-off-canvas-content>

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon" type="button" data-open="offCanvas"></button>
            {{--{{Blade syntax for echo}}--}}
            <span class="title-bar-title">{{getenv('APP_NAME')}}</span>
        </div>
    </div>

    @yield('content')
</div>

<script src="/js/all.js"></script>

</body>
</html>