<x-app-layout>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Makanan</title>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breezeStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    <br><br><br><br><br><br>
    <center>
    <div class="history__container">
        <span class="section-subtitle">Other's</span>
        <h2 class="section-title">All of the eateries</h2>
        
        <!-- Form Pencarian -->
        <form action="{{ route('menu.search') }}" method="GET">
            <div class="search-box">
                <input type="text" name="query" class="input-search" placeholder="Cari menu..." required>
                <button type="submit" class="submit-btn">Cari</button>
            </div>
        </form>

        <div class="menu__container bd-grid">
            @foreach ($thumbnail as $menu)
                <div class="menuu__content">
                    <a href="{{ route('menu.konten', $menu->id_menu) }}">
                        <img src="{{ Storage::url($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" class="menu__img">
                    </a>
                    <div class="menu__name">
                        <h3>{{ $menu->nama_menu }}</h3>
                    </div>
                    <div class="menu__detail">
                        <p>{{ Str::limit($menu->berita_menu, 18) }}...</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </center>
</body>
</html>

</x-app-layout>