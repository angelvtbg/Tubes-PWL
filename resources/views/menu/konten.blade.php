<!-- resources/views/menu/show.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menu->nama_menu }}</title>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breezeStyles.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    @include('partials.navbar')
    <div class="history__boxx">
        <img src="{{ Storage::url($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" class="menu__photo">
        <h3 class="menu__name">{{ $menu->nama_menu }}</h3>
        <span class="menu__detail">{{ $menu->berita_menu }}</span>
    </div>
</body>
</html>
