<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<center>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="jumbotron dashboard">
                    <div class="row">
                        <div class="col-8">
                            <h1>Daftar Kategori</h1>
                            <a href="{{ route('kategori.create') }}">Tambah Kategori Baru</a>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>{{ $category->name }}
                                            <a href="{{ route('kategori.edit', $category->id) }}">Edit</a>
                                            <a href="{{ route('kategori.delete', $category->id) }}">Hapus</a>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</center>

</x-app-layout>
