<nav class="navbar navbar-expand-md navbar-light">
    <ul class="navbar-nav mr-auto">
        <li class="navbar-brand">LaraTest</li>
        <li class="nav-item"><a href="/" class="{{setActive('home')}}">@lang('Home')</a></li>
        <li class="nav-item"><a href="/contact" class="{{setActive('contact')}} ">@lang('Contact')</a></li>
        <li class="nav-item"><a href="/about" class="{{setActive('about')}}">@lang('About')</a></li>
        @if(auth()->check())
            <li class="nav-item"><a href="/projects" class="{{setActive('projects.index')}}">@lang('Portfolio')</a></li>
            <li class="nav-item"><a href="{{route('projects.create')}}"
                                    class="{{setActive('projects.create')}}">@lang('New project')</a></li>
            @if(auth()->user()->hasRoles(['admin']))
                <li class="nav-item"><a href="/users" class="{{setActive('users')}}">@lang('Users')</a></li>
            @endif
        @endif
    </ul>
    <ul class="navbar-nav">
        @if(auth()->guest())
            <li class="nav-item"><a href="/login" class="{{setActive('login')}}">@lang('Login')</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="/users/{{auth()->id()}}" class="{{setActive('logoff')}}">@lang('Mi cuenta')</a></li>
                    <li class="nav-item"><a href="/logout" class="{{setActive('logoff')}}">@lang('Logout')</a></li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
<script src="/js/all.js"></script>