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
                                            <h3 class="dash-nama">{{ Auth::user()->nama }}</h3>
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
                                    <div class="row">
                                        <h3 class="text-dark mx-auto my-4">Tools</h3>
                                    </div>
                                    <div class="row">
                                        <div class="opsi col mb-4">
                                            <h2 class="mt-4" style="text-align: center;">Pengelola Menu</h2>
                                            <img class="sub-logo my-3" src="{{ asset('images/bg/news.png') }}" alt="logo">
                                            <a href="{{ route('menuset.index') }}"><button class="tombol mt-2"> Lihat </button></a>
                                        </div>
                                        <div class="opsi col mb-4">
                                            <h2 class="mt-4" style="text-align: center;">Moderasi komentar</h2>
                                            <img class="sub-logo my-3" src="{{ asset('images/bg/moderasi.png') }}" alt="logo">
                                            <a href="komentar.php"><button class="tombol mt-2"> Lihat </button></a>
                                        </div>
                                        <div class="opsi col mb-4">
                                            <h2 class="mt-4" style="text-align: center;">Kategori </h2>
                                            <img class="sub-logo my-3" src="{{ asset('images/bg/kategora.png') }}" alt="logo">
                                            <a href="{{ route('kategori.index') }}"><button class="tombol mt-2"> Lihat </button></a>
                                        </div>
                                        <div class="opsi col mb-4">
                                            <h2 class="mt-4" style="text-align: center;">Pengguna</h2>
                                            <img class="sub-logo my-3" src="{{ asset('images/bg/pengguna.png') }}" alt="logo">
                                            <a href="{{ route('pengguna.index') }}"><button class="tombol mt-2"> Lihat </button></a>
                                        </div>
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
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <!-- Tambahkan tombol untuk pergi ke halaman reservasi -->
                            <div class="text-center">
                                <h2 class="text-xl font-bold mb-4">Reservasi</h2>
                                <a href="{{ route('reservation.index') }}" class="btn btn-primary">Reservasi Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
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
                <!-- Tombol untuk mengelola profil chef -->
                <a href="{{ route('ChefProfile.index') }}" class="btn btn-primary mt-4">Kelola Profil Chef</a>
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
                                    <div class="row">
                                        <h3 class="text-dark mx-auto my-4">Tools</h3>
                                    </div>
                                    <div class="row my-4">
                                        <div class="opsi col mb-4">
                                            <h2 class="mt-4" style="text-align: center;">Pengelola Menu</h2>
                                            <img class="sub-logo my-3" src="{{ asset('images/bg/news.png') }}" alt="logo">
                                            <a href="{{ route('menuset.index') }}"><button class="tombol mt-2"> Lihat </button></a>
                                        </div>
                                        <div class="opsi col mb-4">
                                            <h2 class="mt-4" style="text-align: center;">Kategori </h2>
                                            <img class="sub-logo my-3" src="{{ asset('images/bg/kategora.png') }}" alt="logo">
                                            <a href="{{ route('kategori.index') }}"><button class="tombol mt-2"> Lihat </button></a>
                                        </div>
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
