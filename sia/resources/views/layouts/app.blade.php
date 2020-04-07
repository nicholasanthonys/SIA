<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('menu.title')</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" charset="utf-8"></script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand"> SIA </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">


            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-colapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link">@lang('menu.home')</a>

                </li>

                <li class="nav-item">
                    <a href="/majors" class="nav-link">@lang('menu.majors')</a>
                </li>

                <li class="nav-item">
                    <a href="/students" class="nav-link">@lang('menu.students')</a>
                </li>

            </ul>

        </div>

        <!--- Menu Pilihan Bahasa -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    @if(Session::has('app_locale'))
                    {{ Str::upper(Session::get('app_locale')) }}

                    @else

                    {{ Str::upper(App::getLocale()) }}

                    @endif
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a href="/locale/en" class="dropdown-item">EN</a>
                    <a href="/locale/id" class="dropdown-item">ID</a>
                </div>

            </li>
        </ul>

    </nav>

    <div class="container" style="padding-top: 80px">
        @yield('content')
    </div>

</body>

</html>