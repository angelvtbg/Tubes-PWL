<div class="card">
    <div class="card-header">
        Profil Chef
    </div>
    <div class="card-body">
        <p>Nama: {{ auth()->user()->chefProfile->name }}</p>
        <p>Skill: {{ auth()->user()->chefProfile->skills }}</p>
        <p>Bio: {{ auth()->user()->chefProfile->bio }}</p>
        <img src="{{ asset('storage/' . auth()->user()->chefProfile->profile_picture) }}" alt="Foto Profil">
        <img src="{{ asset('storage/' . auth()->user()->chefProfile->cover_photo) }}" alt="Foto Sampul">
    </div>
</div>
