<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Menu') }}
        </h2>
    </x-slot>

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
                    <form action="{{ route('menuset.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields for menu attributes -->
                        <!-- Penulis -->
                        <div class="mb-4">
                            <label for="penulis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                            <input type="text" name="penulis" id="penulis" class="mt-1 block w-full" value="{{ old('penulis') }}" required>
                        </div>
                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="id_kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <!-- Nama Menu -->
                        <div class="mb-4">
                            <label for="nama_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Menu</label>
                            <input type="text" name="nama_menu" id="nama_menu" class="mt-1 block w-full" value="{{ old('nama_menu') }}" required>
                        </div>
                        <!-- Harga Menu -->
                        <div class="mb-4">
                            <label for="harga_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Menu</label>
                            <input type="text" name="harga_menu" id="harga_menu" class="mt-1 block w-full" value="{{ old('harga_menu') }}" required>
                        </div>
                        <!-- Gambar Menu -->
                        <div class="mb-4">
                            <label for="gambar_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Menu</label>
                            <input type="file" name="gambar_menu" id="gambar_menu" class="mt-1 block w-full" required>
                        </div>
                        <!-- Berita Menu -->
                        <div class="mb-4">
                            <label for="berita_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Berita Menu</label>
                            <textarea name="berita_menu" id="berita_menu" class="mt-1 block w-full ckeditor" required>{{ old('berita_menu') }}</textarea>
                        </div>
                        
                        <!-- Tanggal Menu -->
                        <div class="mb-4">
                            <label for="tanggal_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Menu</label>
                            <input type="date" name="tanggal_menu" id="tanggal_menu" class="mt-1 block w-full" required>
                        </div>
                        <!-- Dilihat -->
                        <div class="mb-4">
                            <label for="dilihat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dilihat</label>
                            <input type="number" name="dilihat" id="dilihat" class="mt-1 block w-full" value="{{ old('dilihat') }}" required>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endauth
</x-app-layout>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil elemen input tanggal
            var tanggalMenuInput = document.getElementById('tanggal_menu');

            // Buat objek tanggal saat ini
            var today = new Date();

            // Format tanggal ke format ISO (YYYY-MM-DD)
            var isoDate = today.toISOString().split('T')[0];

            // Atur nilai input tanggal menjadi tanggal saat ini
            tanggalMenuInput.value = isoDate;
        });
    </script>
    <script src="{{ asset('vendor/ckeditor4/ckeditor.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            CKEDITOR.replace('berita_menu');
        });
    </script>
@endpush
