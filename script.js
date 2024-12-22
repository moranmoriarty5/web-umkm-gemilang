// Ambil elemen dengan ID 'home'
const homeSection = document.getElementById('home');
if (!homeSection) {
    console.error("Elemen dengan ID 'home' tidak ditemukan.");
} else {
    console.log("Elemen #home ditemukan!");
}


// Array berisi path gambar
const images = [
    'gambar/zalaffood.jpg',
    'gambar/gemilang.jpg',
    'gambar/gemilang2.jpg',
    'gambar/gemilang3.jpg'
];

// Indeks gambar yang sedang ditampilkan
let currentIndex = 0;

// Fungsi untuk mengubah gambar latar belakang
function changeBackground() {
    if (homeSection) {
        const currentImage = images[currentIndex];
        homeSection.style.backgroundImage = `url('${currentImage}')`;

        console.log(`Gambar latar belakang diubah ke: ${currentImage}`);

        currentIndex = (currentIndex + 1) % images.length;
    } else {
        console.error("Elemen dengan ID 'home' tidak ditemukan.");
    }
}

// Setel interval untuk mengubah gambar setiap 5 detik
setInterval(changeBackground, 5000);

// Tampilkan gambar pertama segera setelah halaman dimuat
window.onload = changeBackground;

function openModal(element) {
    var modal = document.getElementById("imageModal");
    var modalImg = document.getElementById("modalImage");
    var captionText = document.getElementById("caption");

    modal.style.display = "block";
    modalImg.src = element.src;
    captionText.innerHTML = element.alt;
}

function closeModal() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "none";
}

document.querySelectorAll('.gallery-item img').forEach(img => {
    img.addEventListener('click', () => {
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.background = 'rgba(0, 0, 0, 0.8)';
        overlay.style.display = 'flex';
        overlay.style.alignItems = 'center';
        overlay.style.justifyContent = 'center';
        overlay.style.zIndex = '9999';

        const largeImage = document.createElement('img');
        largeImage.src = img.src;
        largeImage.style.maxWidth = '90%';
        largeImage.style.maxHeight = '90%';
        overlay.appendChild(largeImage);

        overlay.addEventListener('click', () => {
            overlay.remove();
        });

        document.body.appendChild(overlay);
    });
});
