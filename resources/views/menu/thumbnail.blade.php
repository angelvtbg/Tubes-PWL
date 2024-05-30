<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Makanan</title>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breezeStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>

<body>
    <div class="history__container">
    <span class="section-subtitle">Other's</span>
    <h2 class="section-title">All of the eateries</h2>
    <div class="menu__container bd-grid">
        @foreach ($thumbnail as $index => $menu)
            @if ($index > 4 && $index < 8)
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
            @endif
        @endforeach
        <div class="menu__cont">
            <a href="{{ route('lainnya') }}">
                <h2 class="section-title">Others...</h2>
            </a>
        </div>
    </div>

</body>

</html>
