let slideIndex = 0;
const slides = document.querySelector('.slides');
const totalSlides = slides.children.length;

const newsContent = @json($menus);

function showSlides() {
    if (slideIndex >= totalSlides) slideIndex = 0;
    if (slideIndex < 0) slideIndex = totalSlides - 1;
    slides.style.transform = `translateX(${-slideIndex * 100}%)`;
    document.getElementById('news-title').innerText = newsContent[slideIndex].nama_menu;
    document.getElementById('news-description').innerText = newsContent[slideIndex].berita_menu.substring(0, 250) + '...';
}

function moveSlides(n) {
    slideIndex += n;
    showSlides();
}

function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    sidebar.style.display = sidebar.style.display === "block" ? "none" : "block";
}

showSlides();
setInterval(() => {
    moveSlides(1);
}, 10000); // Ganti gambar setiap 10 detik