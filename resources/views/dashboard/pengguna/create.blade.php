<!-- resources/views/dashboard/pengguna/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('pengguna.store') }}">
                        @csrf
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama</label>
                            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Password</label>
                            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <label for="role" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Role</label>
                            <select id="role" name="role" class="block mt-1 w-full">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="chef">Chef</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-4">
                                {{ __('Simpan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
