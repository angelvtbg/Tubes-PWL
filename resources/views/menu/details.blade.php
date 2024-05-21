@extends('layouts.app')

@section('content')
<section class="menu section menusection" id="menu">
    <div class="menulist__container" id="menulist">
        <div>
            <h2 class="section-title">{{ $menu->namaMenu }}</h2>
            <div class="menu__content">
                <img src="{{ asset('img/menu/' . $menu->gambarMenu) }}" alt="" class="menu__img">
                <h3 class="menu__name">{{ $menu->namaMenu }}</h3>
                <span class="menu__detail">Delicious dish</span>
                <span class="menu__preci">Rp {{ number_format($menu->hargaMenu, 0, ',', '.') }}</span>
                <p>{{ $menu->berita_menu }}</p> <!-- Assuming there's a description column in your menu table -->
            </div>
        </div>
    </div>
</section>
@endsection
