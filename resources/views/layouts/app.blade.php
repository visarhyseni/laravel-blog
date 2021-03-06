<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

         <div class="container">

             <div class="row">
                 @if(Auth::check())
                 <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('user.profile') }}">My Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('posts') }}">Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('posts.trashed') }}">Trashed Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('post.create') }}">Create new Post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('categories') }}">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('category.create') }}">Create new Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tags') }}">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tag.create') }}">Create new Tag</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('comments') }}">Comments</a>
                        </li>
                        @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('users') }}">Users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('user.create') }}">Create new user</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('settings') }}">Settings</a>
                            </li>
                        @endif
                    </ul>
                 </div>
                @endif
                 <div class="col-lg-8">
                     @yield('content')
                 </div>

             </div>

         </div>


        </main>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>

        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
            @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}")
            @endif
        </script>

        <script>
            $('#content').summernote({
                placeholder: '',
                tabsize: 2,
                height: 100
            });
        </script>


        {{--@yield('scripts')--}}
    </div>
</body>
</html>
