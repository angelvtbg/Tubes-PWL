<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengelolaan Menu') }}
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
                    <div class="row">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="history__data text-xl font-semibold">Tambah Menu</h1>
                        <a href="{{ route('menuset.create') }}" class="custom-button">Tambah Menu Baru</a>
                    </div>
                    <div class="">
                    <form method="GET" action="{{ route('menuset.index') }}" class="center mb-4">
                        <input type="text" name="search" value="{{ request('search') }}" class="bg-gray-200 text-black rounded py-2 px-4" placeholder="Cari Nama Menu">
                        <button type="submit" class="soft-button">Cari</button>
                    </form>
                    </div>
                    </div>
                    <div class="tableKategori">
                    <table class="tableKategori min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Penulis
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Menu
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga Menu
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gambar Menu
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Berita Menu
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Menu
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dilihat
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($menus as $menu)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->id_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->penulis }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->kategori ? $menu->kategori->name : 'Kategori Tidak Ditemukan' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->nama_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->harga_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ Storage::url($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" class="w-12 h-12">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ Str::limit($menu->berita_menu, 35) }}...
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->tanggal_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->dilihat }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('menuset.edit', $menu->id_menu) }}" class="soft-button">Edit</a>
                                    <form action="{{ route('menuset.destroy', $menu->id_menu) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="danger-button">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endauth
</x-app-layout>
