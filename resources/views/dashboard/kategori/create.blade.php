<!-- resources/views/kategori/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori Baru') }}
        </h2>
    </x-slot>

    <center>
        @guest
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-center">Anda belum login. Silakan <a href="{{ route('login') }}"
                                class="text-blue-500">login</a> untuk melanjutkan atau kembali ke <a
                                href="{{ url('/') }}" class="text-blue-500">halaman utama</a>.</h3>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    @auth
    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'chef')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="jumbotron dashboard">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-4">
                                        <label for="name" class="history__data jarak text-xl font-semibold">Tambah
                                            Kategori</label>
                                    <form action="{{ route('kategori.store') }}" method="POST">
                                        @csrf
                                        <input type="text" name="name" placeholder="Nama Kategori">
                                        <button type="submit" class="custom-button">Simpan</button>
                                    </form>
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
