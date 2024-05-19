<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('registrasiChef.store') }}">
            @csrf

            <!-- Nama Chef -->
            <div>
                <x-label for="name" :value="__('Nama Chef')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Nama Pengguna (User) -->
            <div class="mt-4">
                <x-label for="user_name" :value="__('Nama Pengguna')" />
                <x-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" required />
            </div>

            <!-- Keahlian -->
            <div class="mt-4">
                <x-label for="skills" :value="__('Keahlian')" />
                <x-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills')" required />
            </div>

            <!-- Bio -->
            <div class="mt-4">
                <x-label for="bio" :value="__('Bio')" />
                <textarea id="bio" class="block mt-1 w-full" name="bio" required>{{ old('bio') }}</textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button color="black">
                    {{ __('Registrasi Chef') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
