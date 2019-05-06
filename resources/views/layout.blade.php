<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', "Laravel test")</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="container-fluid">
    @include('partials.nav')
    <div class="container-fluid">
        <br>
        @yield('content')
    </div>
</div>
</body>
</html>