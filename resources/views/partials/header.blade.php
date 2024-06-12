<nav class="navbar navbar-expand-md bg-dark fixed-top shadow-sm header-nav navbar-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('projects.index') }}">
            <div class="logo_laravel">
                <img src="{{Vite::asset('resources/img/swan.png')}}" alt="">
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- <li>
                    <a class="nav-link" href="{{route('projects.index')}}">{{ __('Projects') }}</a>
                </li>
                @auth
                <li>
                    <a class="nav-link" href="{{ route('projects.create')}}">{{ __('New Project') }}</a>
                </li>
                @endif -->
                <!-- <li>
                    <a class="nav-link" href="{{route('types.index')}}">{{ __('Types') }}</a>
                </li>
                @auth
                <li>
                    <a class="nav-link" href="{{route('types.create')}}">{{ __('New Types') }}</a>
                </li>
                @endif -->
                @auth
                <li>
                    <ul class="navbar-nav ml-auto project-page">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Project Page
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('projects.index')}}">{{ __('Projects') }}</a>
                                <a class="dropdown-item" href="{{ route('projects.create')}}">{{ __('New Project') }}</a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                </li>
                @else
                <li>
                    <a class="nav-link" href="{{route('projects.index')}}">{{ __('Projects') }}</a>
                </li>
                @endif
                @auth
                    <li>
                        <ul class="navbar-nav ml-auto type-page">

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Type Page
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('types.index')}}">{{ __('Types') }}</a>

                                    <a class="dropdown-item" href="{{ route('types.create')}}">{{ __('New Type') }}</a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </li>
                @else
                <li>
                    <a class="nav-link" href="{{route('types.index')}}">{{ __('Types') }}</a>
                </li>
                @endif
                @auth
                <li>
                    <ul class="navbar-nav ml-auto technology-page">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Technologies Page
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('technologies.index')}}">{{ __('Technologies') }}</a>
                                <a class="dropdown-item" href="{{ route('technologies.create')}}">{{ __('New Technology') }}</a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                </li>
                @else
                <li>
                    <a class="nav-link" href="{{route('technologies.index')}}">{{ __('Technologies') }}</a>
                </li>
                @endif
            </ul>

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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>