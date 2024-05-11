<!--===== Galeri SLIDER =======-->
<div class="gallery">
    <!-- =============== SWIPER GALLERY CARDS =============== -->
    <div class="swiper gallery-cards">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <article class="gallery__card">
                    <img src="{{ asset('images/img1.png') }}" class="gallery__img" alt="Uploaded Image">
                    <div class="gallery__data">
                        <h3 class="gallery__title">Ornament Vase</h3>
                        <span class="gallery__subtitle">Modern</span>
                    </div>
                </article>
            </div>

            <div class="swiper-slide">
                <article class="gallery__card">
                    <img src="{{ asset('images/img2.png') }}" class="gallery__img" alt="Uploaded Image">
                    <div class="gallery__data">
                        <h3 class="gallery__title">Ornament Vase</h3>
                        <span class="gallery__subtitle">Modern</span>
                    </div>
                </article>
            </div>

            <div class="swiper-slide">
                <article class="gallery__card">
                    <img src="{{ asset('images/img3.png') }}" class="gallery__img" alt="Uploaded Image">
                    <div class="gallery__data">
                        <h3 class="gallery__title">Ornament Vase</h3>
                        <span class="gallery__subtitle">Modern</span>
                    </div>
                </article>
            </div>

            <div class="swiper-slide">
                <article class="gallery__card">
                    <img src="{{ asset('images/img4.png') }}" class="gallery__img" alt="Uploaded Image">
                    <div class="gallery__data">
                        <h3 class="gallery__title">Ornament Vase</h3>
                        <span class="gallery__subtitle">Modern</span>
                    </div>
                </article>
            </div>

            <div class="swiper-slide">
                <article class="gallery__card">
                    <img src="{{ asset('images/img5.png') }}" class="gallery__img" alt="Uploaded Image">
                    <div class="gallery__data">
                        <h3 class="gallery__title">Ornament Vase</h3>
                        <span class="gallery__subtitle">Modern</span>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <!-- =============== SWIPER GALLERY THUMBNAIL =============== -->
    <div class="gallery__overflow">
        <div class="swiper gallery-thumbs">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="gallery__thumbnail">
                        <img src="{{ asset('images/img1.png') }}" alt="image thumbnail" class="gallery__thumbnail-img">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="gallery__thumbnail">
                        <img src="{{ asset('images/img2.png') }}" alt="image thumbnail" class="gallery__thumbnail-img">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="gallery__thumbnail">
                        <img src="{{ asset('images/img3.png') }}" alt="image thumbnail" class="gallery__thumbnail-img">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="gallery__thumbnail">
                        <img src="{{ asset('images/img4.png') }}" alt="image thumbnail" class="gallery__thumbnail-img">
                    </div>
                </div>
                
                <div class="swiper-slide">
                    <div class="gallery__thumbnail">
                        <img src="{{ asset('images/img5.png') }}" alt="image thumbnail" class="gallery__thumbnail-img">
                    </div>
                </div>
            </div>

            <!-- Swiper pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper arrows -->
        <div class="swiper-button-next">
            <i class="ri-arrow-right-line"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="ri-arrow-left-line"></i>
        </div>
    </div>
</div>