<head>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
</head>

<x-app-layout>
<section class="menu section menusection" id="menu">
    <div class="menulist__container" id="menulist">
        <div>
            <h2 class="section-title">{{ $menu->nama_menu }}</h2>
            <div class="menu__content">
                <img src="{{ Storage::url($menu->gambar_menu) }}" alt="" class="menu__photo">
                <h3 class="menu__name">{{ $menu->nama_menu }}</h3>
                <span class="menu__detail">Delicious dish</span>
                <span class="menu__preci">Rp {{ number_format((float)$menu->harga_menu, 0, ',', '.') }}</span>
                <p>{{ $menu->berita_menu }}</p> <!-- Assuming there's a description column in your menu table -->
            </div>
            <form action="{{ route('order.addToCart') }}" method="POST">
                @csrf
                <input type="hidden" name="namaMenu" value="<?= $menu['nama_menu'] ?>">
                <input type="hidden" name="hargaMenu" value="<?= $menu['harga_menu'] ?>">
                <label for="quantity">Banyak pesanan :
                    </label><input type="number" name="quantity" id="quantity" value=1 style="width: 50px" min="1">
                <button type="submit" name="order" class="custom-button">Add to Cart</button>
            </form>
        </div>
    </div>
</section>
</x-app-layout>