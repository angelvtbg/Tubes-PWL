<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengelolaan Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200">
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
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($menuset as $menu)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->id_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->penulis }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->id_kategori }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->nama_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->harga_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $menu->gambar_menu }}" alt="{{ $menu->nama_menu }}" class="w-12 h-12">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->berita_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->tanggal_menu }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $menu->dilihat }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
