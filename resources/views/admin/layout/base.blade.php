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
    <script src="https://use.fontawesome.com/4988f9ad5c.js"></script>

</head>
<body>
@include('includes.admin-sidebar')

{{--Main content starts--}}

<div class="off-canvas-content admin_title_bar" data-off-canvas-content>

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            {{--{{Blade syntax for echoing}}--}}
            <span class="title-bar-title">{{getenv('APP_NAME')}}</span>
        </div>
    </div>

    @yield('content')
</div>

<script src="/js/all.js"></script>

</body>
</html>