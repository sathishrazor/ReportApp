<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Level UP Digital:Atomic Tecnologies') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @yield('table')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                @if (Auth::check())
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/home">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-history"></i><span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" style="flex-direction: column-reverse" aria-labelledby="navbarDropdown">
                            @foreach (auth()->user()->RecentHistory->reverse() as $item)
                            <a class="dropdown-item" href="{{ $item->location }}">
                                <i class="fa fa-history" aria-hidden="true"></i> {{$item->name}}
                            </a>
                            @endforeach
                        </div>
                    </li>
                </ul>
                @endif

                <a class="navbar-brand" href="{{ url('/') }}">
                    Level UP Digital:<b>Atomic Tecnologies</b>
                </a>
                @if (Auth::check())
                <a class="nav-link d-flex">
                    <input id="global_search" class="form-control form-control-sm d-flex" placeholder="Search" />
                </a>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-print"></i> Reports <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('rtreport.index') }}">
                                    <i class="fa fa-eercast" aria-hidden="true"></i> RT Report
                                </a>
                                <a class="dropdown-item" href="{{ route('mptreport.index') }}">
                                    <i class="fa fa-magnet" aria-hidden="true"></i> MPT Report
                                </a>
                                <a class="dropdown-item" href="{{ route('mptreport.index') }}">
                                    <i class="fa fa-tint" aria-hidden="true"></i> LPT Report
                                </a>
                                <a class="dropdown-item" href="{{ route('mptreport.index') }}">
                                    <i class="fa fa-ravelry" aria-hidden="true"></i> UTA Report(ASME)
                                </a>
                                <a class="dropdown-item" href="{{ route('mptreport.index') }}">
                                    <i class="fa fa-ravelry" aria-hidden="true"></i> UTB Report(AWS)
                                </a>
                                <a class="dropdown-item" href="{{ route('mptreport.index') }}">
                                    <i class="fa fa-ravelry" aria-hidden="true"></i> UTC Report(Lamination)
                                </a>
                                <a class="dropdown-item" href="{{ route('mptreport.index') }}">
                                    <i class="fa fa-ravelry" aria-hidden="true"></i> UTGT Report(Thickness Gauge Test)
                                </a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-book"></i> Masters <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('picklist.index') }}">
                                    PickList
                                </a>
                                <a class="dropdown-item" href="{{ route('owners.index') }}">
                                    Owners
                                </a>
                                <a class="dropdown-item" href="{{ route('clients.index') }}">
                                    Clients
                                </a>
                                <a class="dropdown-item" href="{{ route('employees.index') }}">
                                    Employees
                                </a>
                                <a class="dropdown-item" href="{{ route('projects.index') }}">
                                    Projects
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="fa fa-cog fa-spin"></i> Settings
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="users">
                                    <i class="fa fa-users"></i> Users
                                </a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="fa fa-clock-o"></i> <span id="time">Mon, 10 Aug 2020 02:05:48 GMT</span></a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <input id="rooturl" class="d-none" value="{{URL::to('/')}}" />
            @yield('content')
        </main>
        @if (Auth::check())
        <script>
            var url = "{{route('PickList.record_history')}}"
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.post(url, {
                name: $("#page_name").text()||location.pathname,
                type: "view",
                location: location.href,
                _token: CSRF_TOKEN
            }, function(res) {
               // console.log("history", res);
            })


            $.widget("custom.catcomplete", $.ui.autocomplete, {
                _create: function() {
                    this._super();
                    this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
                },
                _renderMenu: function(ul, items) {
                    var that = this,
                        currentCategory = "";
                    $.each(items, function(index, item) {
                        var li;
                        if (item.category != currentCategory) {
                            ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                            currentCategory = item.category;
                        }
                        li = that._renderItemData(ul, item);
                        if (item.category) {
                            li.attr("aria-label", item.category + " : " + item.label);
                        }
                    });
                }
            });

            $("#global_search").catcomplete({
                delay: 0,
                minLength: 1,
                source: function(request, response) {
                    var _this = this;
                    // Fetch data
                    $.ajax({
                        url: "/app/search",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            q: request.term
                        },
                        success: function(data) {
                           // console.log(data);
                            var res = [];
                            data.forEach(function(x){
                              res =res.concat(x)
                            });
                            console.log(res);
                            response(res);
                        }
                    });
                }
            });
        </script>
        @endif

    </div>
</body>

</html>
