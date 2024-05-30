<!--========== MENU ==========-->
<section class="menu section bd-container" id="menu">
    <span class="section-subtitle">Special</span>
    <h2 class="section-title">Our Most Seen Menu</h2>
    <div class="menu__container bd-grid">
        <ul class="carousel-indicators">
            @foreach ($menus as $index => $menu)
                <li data-target="#menuCarousel" data-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ul>

        @foreach ($menus as $index => $menu)
            @if ($index < 3)
                <div class="menu__content">
                    <a href="{{ route('menu.konten', $menu->id_menu) }}">
                        <center>
                            <img src="{{ Storage::url($menu->gambar_menu) }}" alt="" class="menu__img">
                        </center>
                    </a>
                    <h3 class="menu__name">{{ $menu->nama_menu }}</h3>
                    <p class="menu__detail">{{ Str::limit($menu->berita_menu, 18) }}...</p>
                    <p class="menu__preci">Rp {{ $menu->harga_menu }}</p>
                    {{-- <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a> --}}
                </div>
            @endif
        @endforeach
    </div>
</section>
