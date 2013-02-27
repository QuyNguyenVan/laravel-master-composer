<!doctype html>
<html dir="{{ $language_direction }}" lang="{{ $current_locale }}" class="no-js">
<head>
    <meta charset="utf-8">
    <title>{{ $page_title }}Site Name</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="robots" content="{{ $meta_robots }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="canonical" href="http://www.domain.com{{ $canonical }}">

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">

    {{-- Icons --}}
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"   href="/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"                 href="/img/ico/apple-touch-icon-57-precomposed.png">

    {{-- HTML5 shim, for IE6-8 support of HTML5 elements --}}
    <!--[if lt IE 9]>
        <script src="/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body class="{{ $body_class }}">

    {{-- Header --}}
    <header>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/">Logo</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Body --}}
    <div class="container main" role="main">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="container-fluid">
        <p>&copy; {{ date("Y") }} Company Name, LLC</p>
    </footer>

    {{-- Javascript --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="/js/libs/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>

    {{-- Analytics --}}

</body>
</html>
