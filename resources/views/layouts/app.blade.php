<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tsujita-Group') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js')."?r=". date("Ymdhis") }}"  ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tcms.css').'?'.date('Ymd-Hi')  }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- icons from https://iconify.design/ -->

    <script src="https://code.iconify.design/1/1.0.3/iconify.min.js"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>


    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('js/tcms.js').'?'.date('Ymd-Hi') }}"></script>
    <script src="{{ asset('js/UltraDate.min.js') }}"></script>
    <script src="{{ asset('js/UltraDate.ja.min.js') }}"></script>
    <script src="{{ asset('js/md5.js') }}"></script>

    <link href="{{ asset('css/pikaday/pikaday.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pikaday/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pikaday/triangle.css') }}" rel="stylesheet">

    <script src="{{ asset('js/pikaday.js') }}" defer></script>
    <script src="{{ asset('js/pikaday.jquery.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/v8n/dist/v8n.min.js">

    </script>

</head>
<body>
    <div id="ajaxspinner" style="{width:0; height:0;position:relative}">
      <div id="overlay">
          <div class="cv-spinner">
              <span class="spinner"></span>
          </div>
      </div>    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Tsujita CMS') }}
                </a>
              @else
              <a class="navbar-brand" href="{{ url('/home') }}">
                  {{ config('app.name', 'Tsujita CMS') }}
              </a>
              @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @auth
                      <li class="nav-item">
                        <div class="card-header">
                          <a href="{{ url('/home') }}">Home</a>
                        </div>
                      </li>
                      <li class="nav-item"><div class="card-header"><a href="{{ url('/diary') }}">日報</a></div></li>
                      <li class="nav-item">
                        <div class="card-header">
                        <a href="{{ url('/contruct') }}">工事</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <div class="card-header dropdown">
                          <a clas="btn dropdown-toggle clickable" id="navi_dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">請求/支払</a>
                          <div class="dropdown-menu" aria-labelledby="navi_dropdownMenuButton" style="z-index:9999">
                                <a class="dropdown-item" href="{{ url('/claimlist') }}">請求：請求処理</a>
                                <a class="dropdown-item" href="{{ url('/deposits') }}">請求：入金処理</a>
                                <a class="dropdown-item" href="{{ url('/ballancesheet') }}">請求：未収一覧</a>
                                <a class="dropdown-item" href="{{ url('/orderlist') }}">発注：発注処理</a>
                                <a class="dropdown-item" href="{{ url('/paymentlist') }}">発注：支払処理</a>
                                <a class="dropdown-item" href="{{ url('/ballancesheet') }}">発注：未払一覧</a>
                          </div>
                        </div>
                      </li>
                      <li class="nav-item"><div class="card-header">集計</div></li>
                      <li class="nav-item"><div class="card-header">マスター管理</div></li>
                      @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">

                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
