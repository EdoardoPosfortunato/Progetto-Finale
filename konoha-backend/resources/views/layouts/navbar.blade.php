
 <nav class="navbar navbar-expand-md navbar-light shadow-sm sfondo-verde">
     <div class="container d-flex justify-content-between">
         <a class="navbar-brand d-flex align-items-center" href="{{ url('/home') }}">
             <div class="logo_laravel">
                 <h1>Konoa</h1>
                </div>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mx-auto gap-2 pe-5">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('bonsai.index') }}">{{ __('Bonsiais') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('species.index') }}">{{ __('Specie') }}</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="{{route('tipology.index') }}">{{ __('Tipologie') }}</a>
                    </li>
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
