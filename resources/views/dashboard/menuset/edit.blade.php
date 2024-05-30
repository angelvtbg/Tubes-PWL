<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('menuset.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Form fields for menu attributes (same as create view but with filled values) -->
                        <!-- Penulis -->
                        <div class="mb-4">
                            <label for="penulis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                            <input type="text" name="penulis" id="penulis" class="mt-1 block w-full" value="{{ $menu->penulis }}" required>
                        </div>
                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="id_kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="mt-1 block w-full" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $menu->id_kategori == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Nama Menu -->
                        <div class="mb-4">
                            <label for="nama_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Menu</label>
                            <input type="text" name="nama_menu" id="nama_menu" class="mt-1 block w-full" value="{{ $menu->nama_menu }}" required>
                        </div>
                        <!-- Harga Menu -->
                        <div class="mb-4">
                            <label for="harga_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Menu</label>
                            <input type="text" name="harga_menu" id="harga_menu" class="mt-1 block w-full" value="{{ $menu->harga_menu }}" required>
                        </div>
                        <!-- Gambar Menu -->
                        <div class="mb-4">
                            <label for="gambar_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Menu</label>
                            <input type="file" name="gambar_menu" id="gambar_menu" class="mt-1 block w-full">
                        </div>
                        <!-- Berita Menu -->
                        <div class="mb-4">
                            <label for="berita_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Berita Menu</label>
                            <textarea name="berita_menu" id="berita_menu" class="mt-1 block w-full ckeditor" value="{{ $menu->berita_menu }}" required>{{ $menu->berita_menu }}</textarea>
                        </div>
                        <!-- Tanggal Menu -->
                        <div class="mb-4">
                            <label for="tanggal_menu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Menu</label>
                            <input type="date" name="tanggal_menu" id="tanggal_menu" class="mt-1 block w-full" value="{{ $menu->tanggal_menu }}" required>
                        </div>
                        <button type="submit" class="custom-button">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
