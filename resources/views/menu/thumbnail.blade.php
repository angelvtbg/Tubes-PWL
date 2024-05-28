<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Makanan</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            margin: 20px;
            background-color: #fff;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-content {
            padding: 16px;
        }
        .card-content h3 {
            margin-top: 0;
            color: #333;
        }
        .card-content p {
            color: #777;
        }
    </style>
</head>
<body>
    <span class="section-subtitle">Other's</span>
    <h2 class="section-title">All of the eateries</h2>
    <div class="container">
        @foreach($thumbnail as $index => $menu)
        @if ($index < 10)
        <div class="card">
            <a href="{{ route('menu.konten', $menu->id_menu) }}">
                <img src="{{ Storage::url($menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}">
            </a>
            <div class="card-content">
                <h3>{{ $menu->nama_menu }}</h3>
                <p>{{ Str::limit($menu->berita_menu, 18) }}...</p>
            </div>
        </div>
        @endif
        @endforeach
        <div class="card">
            <div class="card-content">
                <h2 class="section-title">Others...</h2>
            </div>
        </div>
    </div>
</body>
</html>
