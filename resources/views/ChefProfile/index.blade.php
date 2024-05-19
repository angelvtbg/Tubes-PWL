@php
    $chefProfile = auth()->user()->chefProfile;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profil Chef') }}
        </h2>
    </x-slot>

    <div class="container mt-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profil Chef') }}</div>
                    <div class="card-body">
                        @if($chefProfile)
                            <form action="{{ route('ChefProfile.update', ['chefProfile' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="profile_picture">{{ __('Foto Profil') }}</label>
                                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                </div>
                                
                                <div class="form-group">
                                    <label for="cover_photo">{{ __('Foto Sampul') }}</label>
                                    <input type="file" class="form-control" id="cover_photo" name="cover_photo">
                                </div>
                    
                                <div class="form-group">
                                    <label for="name">{{ __('Nama') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $chefProfile->name }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="skills">{{ __('Skill') }}</label>
                                    <textarea class="form-control" id="skills" name="skills">{{ $chefProfile->skills }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bio">{{ __('Bio') }}</label>
                                    <textarea class="form-control" id="bio" name="bio">{{ $chefProfile->bio }}</textarea>
                                </div>
                    
                                <button type="submit" class="btn btn-primary">{{ __('Simpan Perubahan') }}</button>
                            </form>
                        @else
                            <p>Profil koki tidak ditemukan. Silakan registrasi sebagai koki terlebih dahulu.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
