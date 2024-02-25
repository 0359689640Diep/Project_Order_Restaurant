let currentIndex = 0;
const slides = document.querySelectorAll('.content_pro');
const totalSlides = slides.length;
const slideshow = document.getElementById('slideshow');

function showSlide(index) {
    slides.forEach((slide, i) => {
        const offset = (i - index) * 280; // 300px width + 40px margin
        slide.style.transform = `translateX(${offset}px)`;
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
}

const mc = new Hammer(slideshow);
mc.on('swipeleft', nextSlide);
mc.on('swiperight', () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    showSlide(currentIndex);
});

setInterval(nextSlide, 3000);

setTimeout(() => {
  window.location.reload();
  alert('msg');
}, 1 * 60* 1000)

