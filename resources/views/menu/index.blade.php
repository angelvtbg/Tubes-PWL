<!--========== MENU ==========-->
<section class="menu section bd-container" id="menu">
    <span class="section-subtitle">Special</span>
    <h2 class="section-title">Most Favorite Menu</h2>
    <div class="menu__container bd-grid">
        <ul class="carousel-indicators">
            @foreach($menus as $index => $menu)
                <li data-target="#menuCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ul>

        @foreach($menus as $index => $menu)
        @if ($index < 3)
        <div class="menu__content">
            <img src="{{ Storage::url($menu->gambar_menu) }}" alt="" class="menu__img">
            {{ $menu->nama_menu }}
            <p>{{ Str::limit($menu->berita_menu, 45) }}...</p>
            {{ $menu->harga_menu }}
            {{-- <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a> --}}
        </div>
        @endif
        @endforeach
    </div>
</section>
