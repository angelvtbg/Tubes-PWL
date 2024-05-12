<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                                <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                                <a href="{{ route('menuset.index') }}"><button class="tombol mt-2"> Lihat </button></a>
                            </div>
                            <div class="opsi col mb-4">
                                <h2 class="mt-4" style="text-align: center;">Moderasi komentar</h2>
                                <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                                <a href="komentar.php"><button class="tombol mt-2"> Lihat </button></a>
                            </div>
                            <div class="opsi col mb-4">
                                <h2 class="mt-4" style="text-align: center;">Kategori </h2>
                                <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                                <a href="{{ route('kategori.index') }}"><button class="tombol mt-2"> Lihat </button></a>
                            </div>
                            <div class="opsi col mb-4">
                                <h2 class="mt-4" style="text-align: center;">Pengguna</h2>
                                <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
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
@endif

@if(auth()->user()->role == 'user')
    {{-- Konten khusus user --}}
@endif

@if(auth()->user()->role == 'chef')
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
                <div class="container">
                    <div class="row">
                        <h3 class="text-dark mx-auto my-4">Tools</h3>
                    </div>
                    <div class="row my-4">
                        <div class="opsi col mb-4">
                            <h2 class="mt-4" style="text-align: center;">Pengelola Berita</h2>
                            <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                            <a href="pengelola_berita.php"><button class="tombol mt-2"> Lihat </button></a>
                        </div>
                        <div class="opsi col mb-4">
                            <h2 class="mt-4" style="text-align: center;">Moderasi komentar</h2>
                            <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                            <a href="komentar.php"><button class="tombol mt-2"> Lihat </button></a>
                        </div>
                        <div class="opsi col mb-4">
                            <h2 class="mt-4" style="text-align: center;">Kategori </h2>
                            <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                            <a href="kategori.php"><button class="tombol mt-2"> Lihat </button></a>
                        </div>
                        <div class="opsi col mb-4">
                            <h2 class="mt-4" style="text-align: center;">Edit Profil</h2>
                            <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                            <a href="edit_profil.php"><button class="tombol mt-2"> Lihat </button></a>
                        </div>
                        <div class="opsi col mb-4">
                            <h2 class="mt-4" style="text-align: center;">Beranda</h2>
                            <img class="sub-logo my-3" src="{{ asset('img/bg/news.png') }}" alt="logo">
                            <a href="../index.php"><button class="tombol mt-3"> Lihat </button></a>
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

</x-app-layout>
