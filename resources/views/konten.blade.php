<section>
    <div class="containerKonten">
        
        <div class="sliderKonten">
            @foreach($menus as $menu)
        <div class="slidesKonten">
        
        <div class="newsKonten">
            <h2 id="news-title">{{ $menu->nama_menu }}</h2>
            <p id="news-description">{{ \Illuminate\Support\Str::limit($menus[0]->berita_menu, 250, '...') }}</p>
        </div>
        @endforeach
        <div class="navigationKonten">
            <button class="prev" onclick="moveSlides(-1)">&#10094;</button>
            <button class="next" onclick="moveSlides(1)">&#10095;</button>
        </div>
    </div>
    </div>
</section>
