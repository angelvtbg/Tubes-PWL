        <!--========== HEADER ==========-->
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Test</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="nav bd-container">
        <a href="#" class="nav__logo">Tasty</a>
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="#menu" class="nav__link">Menu</a></li>
                <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>

                <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
            </ul>
        </div>

        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            <div class="button-grid">
                <button class="custom-button" onclick="location.href='{{ route('login') }}'">{{ __('login') }}</button>
                @if (Route::has('register'))
                <button class="custom-button" onclick="location.href='{{ route('register') }}'">{{ __('Register') }}</button>
            </div>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
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
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
