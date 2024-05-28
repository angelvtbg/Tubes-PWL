<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .sub-logo {
            width: 250px; /* Sesuaikan dengan ukuran yang Anda inginkan */
            height: auto; /* Biarkan tingginya menyesuaikan proporsi */
        }
    </style>

    @guest
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-center">Anda belum login. Silakan <a href="{{ route('login') }}" class="text-blue-500">login</a> untuk melanjutkan atau kembali ke <a href="{{ url('/') }}" class="text-blue-500">halaman utama</a>.</h3>
                    </div>
                </div>
            </div>
        </div>
    @elseauth
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->user()->role == 'admin')
            <center>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="jumbotron dashboard">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="welcome">Selamat Datang,</h5>
                                            <h3 class="dash-nama">{{ Auth::user()->name }}</h3>
                                        </div>
                                        <div class="card ml-2 col" style="width: 4rem;">
                                            <div class="card-title">
                                                <h1 class="mt-3 num" style="text-align: center;">{{ $jumlahPengguna }}</h1>
                                                <p style="text-align: center;">Pengguna</p>
                                            </div>
                                        </div>
                                        <div class="card ml-2 col" style="width: 4rem;">
                                            <div class="card-title">
                                                <h1 class="mt-3 num" style="text-align: center;">{{ $jumlahAdmin }}</h1>
                                                <p style="text-align: center;">Admin</p>
                                            </div>
                                        </div>
                                        <div class="card ml-2 mr-5 col" style="width: 4rem;">
                                            <div class="card-title">
                                                <h1 class="mt-3 num" style="text-align: center;">{{ $jumlahMenu }}</h1>
                                                <p style="text-align: center;">Total Menu</p>
                                            </div>
                                        </div>
                                        <div class="card ml-2 mr-5 col" style="width: 4rem;">
                                            <div class="card-title">
                                                <a href="{{ route('registrasiChef.index') }}" class="text-sm text-gray-700 underline">Registrasi Chef</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="container">
                                    <div class="newContent grid">
                                        <article class="newCard">
                                            <a href="{{ route('menuset.index') }}">
                                                <img src="{{ asset('images/food.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">Menu</h2>
                                        </article>
                                        <article class="newCard">
                                            <a href="{{ route('kategori.index') }}">
                                                <img src="{{ asset('images/bg/kategora.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">Category</h2>
                                        </article>
                                        <article class="newCard">
                                            <a href="{{ route('pengguna.index') }}">
                                                <img src="{{ asset('images/bg/pengguna.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">User</h2>
                                        </article>
                                        <article class="newCard">
                                            @if(Auth::check() && Auth::user()->role == 'admin')
                                            <a href="{{ route('admin.reservadmin') }}">
                                                <img src="{{ asset('images/reservation.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">Reservation</h2>
                                            @endif
                                        </article>
                                        <article class="newCard">
                                            @if(Auth::check() && Auth::user()->role == 'admin')
                                            <a href="{{ route('order.admin') }}">
                                                <img src="{{ asset('images/course.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">Pemesanan Makanan</h2>
                                            @endif
                                        </article>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        @elseif(auth()->user()->role == 'user')
            {{-- Konten khusus user --}}
            <center>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="newContent grid">
                            <article class="newCard">
                                <a href="{{ route('reservation.index') }}">
                                    <img src="{{ asset('images/reservation.png') }}" alt="image" class="newImg">
                                </a>
                                <h2 class="newTitle">Reserve Now</h2>
                            </article>
                            <article class="newCard">
                                <a href="{{ route('order.index') }}">
                                    <img src="{{ asset('images/course.png') }}" alt="image" class="newImg">
                                </a>
                                <h2 class="newTitle">Order Now</h2>
                            </article>
                            <article class="newCard">
                                <a href="{{ route('history.reservhistory') }}">
                                    <img src="{{ asset('images/reservation.png') }}" alt="image" class="newImg">
                                </a>
                                <h2 class="newTitle">Reservation History</h2>
                            </article>
                            <article class="newCard">
                                <a href="{{ route('order.history') }}">
                                    <img src="{{ asset('images/course.png') }}" alt="image" class="newImg">
                                </a>
                                <h2 class="newTitle">Order History</h2>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            </center>
        @elseif(auth()->user()->role == 'chef')
            <center>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="jumbotron dashboard">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="welcome">Selamat Datang,</h5>
                                            <h3 class="dash-nama">{{ Auth::user()->nama }}</h3>
                                        </div>
                                
                                        <div class="card ml-2 mr-5 col" style="width: 4rem;">
                                            <div class="card-title">
                                                <h1 class="mt-3 num" style="text-align: center;">{{ $jumlahMenu }}</h1>
                                                <p style="text-align: center;">Total Menu</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="jumbotron dashboard">
                                    <div class="row">
                                        <article class="newCard">
                                            <a href="{{ route('Chefprofile.index') }}">
                                                <img src="{{ asset('images/profile.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">Edit Chef Profile</h2>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="container">
                                    <div class="newSection grid">
                                        <article class="newCard">
                                            <a href="{{ route('menuset.index') }}">
                                                <img src="{{ asset('images/food.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">Menu Edit</h2>
                                        </article>
                                        <article class="newCard">
                                            <a href="{{ route('kategori.index') }}">
                                                <img src="{{ asset('images/bg/kategora.png') }}" alt="image" class="newImg">
                                            </a>
                                            <h2 class="newTitle">Category</h2>
                                        </article>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        @endif
    @endauth
</x-app-layout>
