// hamburger menu -navbar
const hamburger = document.getElementById("hamburger");
const navLinks = document.getElementById("navLinks");

hamburger.addEventListener("click", () => {
navLinks.classList.toggle("active");
});
// hamburger menu


// hero section 
let current = 0;
                const slides = document.querySelectorAll(".hero-slide");
                const dotContainer = document.querySelector(".hero-dots");

                // Create dots
                slides.forEach((_, i) => {
                    let dot = document.createElement("div");
                    dot.onclick = () => showSlide(i);
                    dotContainer.appendChild(dot);
                });
                const dots = dotContainer.querySelectorAll("div");

                function showSlide(i) {
                    slides.forEach(s => s.classList.remove("active"));
                    dots.forEach(d => d.classList.remove("active-dot"));

                    slides[i].classList.add("active");
                    dots[i].classList.add("active-dot");
                    current = i;
                }

                function nextSlide() {
                    current = (current + 1) % slides.length;
                    showSlide(current);
                }

                function prevSlide() {
                    current = (current - 1 + slides.length) % slides.length;
                    showSlide(current);
                }

                showSlide(0); // Default first slide

                // Auto Slide
                setInterval(nextSlide, 5000);

                // Swipe Support for Mobile
                let startX = 0;

                document.querySelector(".hero-slider").addEventListener("touchstart", e => {
                    startX = e.touches[0].clientX;
                });

                document.querySelector(".hero-slider").addEventListener("touchend", e => {
                    let endX = e.changedTouches[0].clientX;
                    if (startX - endX > 50) nextSlide();
                    if (endX - startX > 50) prevSlide();
                });
// hero section


// featured sections
const filterLinks = document.querySelectorAll(".filter-links span");
const cards = document.querySelectorAll(".product-card");
const grid = document.getElementById("productGrid");

filterLinks.forEach(link => {
    link.addEventListener("click", () => {

        // active link styles
        filterLinks.forEach(l => l.classList.remove("active"));
        link.classList.add("active");

        // selected filter
        const type = link.getAttribute("data-filter");

        // shuffle cards every click
        let shuffled = [...cards].sort(() => Math.random() - 0.5);

        // clear old cards
        grid.innerHTML = "";

        if (type === "best") {
            // SHOW ALL 8 CARDS
            shuffled.forEach(card => {
                card.classList.add("shuffle");
                grid.appendChild(card);
            });
        }

        else if (type === "new") {
            // SHOW ONLY FIRST 4 NEW ARRIVAL CARDS
            let filtered = shuffled.filter(card => card.dataset.type.includes("new")).slice(0, 4);
            filtered.forEach(card => {
                card.classList.add("shuffle");
                grid.appendChild(card);
            });
        }

        else if (type === "hot") {
            // SHOW ONLY FIRST 4 HOT SALES CARDS
            let filtered = shuffled.filter(card => card.dataset.type.includes("hot")).slice(0, 4);
            filtered.forEach(card => {
                card.classList.add("shuffle");
                grid.appendChild(card);
            });
        }

    });
});
// featured section


// deal of the week timer
function startCountdown() {
    const endDate = new Date("2025-12-31 23:59:59").getTime();

    setInterval(() => {
        const now = new Date().getTime();
        const diff = endDate - now;

        if (diff <= 0) return;

        document.getElementById("days").innerText = Math.floor(diff / (1000 * 60 * 60 * 24));
        document.getElementById("hours").innerText = Math.floor((diff / (1000 * 60 * 60)) % 24);
        document.getElementById("minutes").innerText = Math.floor((diff / (1000 * 60)) % 60);
        document.getElementById("seconds").innerText = Math.floor((diff / 1000) % 60);
    }, 1000);
}

startCountdown();
// deal of the week timer