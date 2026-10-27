let carouselIdx = 0;
function getCarousel() { return document.getElementById('featuredCarousel'); }
function nextSlide() {
    const c = getCarousel(); if (!c) return;
    carouselIdx = Math.min(carouselIdx + 1, c.children.length - 1);
    c.scrollTo({ left: c.children[carouselIdx].offsetLeft - c.offsetLeft, behavior: 'smooth' });
}
function prevSlide() {
    const c = getCarousel(); if (!c) return;
    carouselIdx = Math.max(carouselIdx - 1, 0);
    c.scrollTo({ left: c.children[carouselIdx].offsetLeft - c.offsetLeft, behavior: 'smooth' });
}
document.addEventListener('DOMContentLoaded', () => {
    const c = getCarousel(); if (!c) return;
    setInterval(() => {
        if (carouselIdx >= c.children.length - 1) carouselIdx = -1;
        nextSlide();
    }, 6000);
});