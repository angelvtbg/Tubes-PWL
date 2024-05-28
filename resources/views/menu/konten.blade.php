<!-- resources/views/menu/show.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menu->nama_menu }}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .menu-image {
            width: auto;
            height: 400px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #777;
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        <img src="{{ Storage::url($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" class="menu-image">
        <h1>{{ $menu->nama_menu }}</h1>
        <p>{{ $menu->berita_menu }}</p>
        <a href="{{ Storage::url($menu->file_resep) }}" class="card-button" target="_blank">Lihat Resep Lengkap</a>
    </div>
</body>
</html>
