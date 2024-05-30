<header class="l-header" id="header">
    <nav class="nav bd-container">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="nav__logo">
            <img src="{{ asset('images/logo.png') }}" class="navLogo">
        </a>

        <!-- Navigation Menu -->
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="{{ url('/') }}" class="nav__link {{ request()->is('/') ? 'active-link' : '' }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav__item">
                    <a href="{{ route('dashboard') }}" class="nav__link {{ request()->routeIs('dashboard') ? 'active-link' : '' }}  active-link">
                        {{ __('Dashboard') }}
                    </a>
                </li>
                {{-- <li><i class='bx bx-moon change-theme' id="theme-button"></i></li> --}}
            </ul>
        </div>

        <!-- Authentication Links -->
        <ul class="navbar-nav ms-auto">
            @guest
                <div class="button-grid">
                    <button class="custom-button" onclick="location.href='{{ route('login') }}'">{{ __('Login') }}</button>
                    @if (Route::has('register'))
                        <button class="custom-button" onclick="location.href='{{ route('register') }}'">{{ __('Register') }}</button>
                    @endif
                </div>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
