<?php
include 'config.php';

// Query untuk mengambil data informasi
$sql_informasi = "SELECT * FROM informasi ORDER BY id DESC";  // Mengambil informasi yang diupload
$result_informasi = $conn->query($sql_informasi);

// Query untuk galeri
$sql_galeri = "SELECT * FROM galeri ORDER BY id DESC";  // Mengambil gambar dari tabel galeri
$result_galeri = $conn->query($sql_galeri);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemilang</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Header -->
    <header>
        <div class="container">
            <h1>Salak Gemilang</h1>
            <nav>
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#informasi">Informasi</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#bantuan">Bantuan</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Beranda -->
    <section id="home" class="section">
        <div class="home overlay">
            <h2>Selamat Datang di Website Gemilang</h2>
            <p>Gemilang merupakan sebuah Usaha Mikro, Kecil, Menengah yang terletak di Desa Srumbung, Kabupaten Magelang.</p>
        </div>
    </section>
    
    <!-- Bagian Informasi -->
    <section id="informasi" class="section">
        <div class="container">
            <h2>Informasi dan Berita</h2>
            <?php
            // Menampilkan data informasi
            if ($result_informasi->num_rows > 0) {
                while ($row = $result_informasi->fetch_assoc()) {
                    $image_path = $row['image'];  // Path gambar yang diupload
                    $alt_text = htmlspecialchars($row['alt_text']);  // Alt text dari gambar
                    $description = htmlspecialchars($row['description']);  // Deskripsi informasi

                    // Menampilkan gambar dan deskripsi
                    echo '<div class="info-box">';
                    echo '<div class="info-content">';
                    echo '<img src="' . htmlspecialchars($image_path) . '" alt="' . $alt_text . '" class="info-image">';
                    echo '<p>' . $description . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Belum ada informasi yang diupload.</p>";
            }
            ?>
        </div>
    </section>

    <section id="galeri">
        <div class="gallery-section">
            <h2>Galeri</h2>
            <div class="gallery">
                <?php
                    // Menampilkan gambar galeri
                    if ($result_galeri->num_rows > 0) {
                        while ($row = $result_galeri->fetch_assoc()) {
                            $image_path = $row['image'];  // Pastikan nama kolom di tabel sesuai
                            $alt_text = htmlspecialchars($row['alt_text']);
                            if (!empty($image_path)) {
                                echo '<div class="gallery-item">';
                                echo '<img src="' . htmlspecialchars($image_path) . '" alt="' . $alt_text . '">';
                                echo '</div>';
                            }
                        }
                    } else {
                        echo "<p>Galeri kosong.</p>";
                    }
                ?>
            </div>
        </div>
    </section>

    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
        <div id="caption"></div>
    </div> 

    <section id="bantuan" class="section">
        <div class="container">
            <h2>Bantuan</h2>
            <div class="social-icons">
                <div class="social-icon">
                    <a href="https://wa.me/+6285701502064" target="blank">
                        <img src="gambar/whatsapp.png" alt="Whatsapp">
                        <span class="social-tooltip">Whatsapp</span>
                    </a>
                </div>
                <div class="social-icon">
                    <a href="https://www.instagram.com/gemilang_sentosa/" target="blank">
                        <img src="gambar/instagram.png" alt="Instagram">
                        <span class="social-tooltip">Instagram</span>
                    </a>
                </div>
                <div class="social-icon">
                    <a href="https://maps.app.goo.gl/T91H8oWVQL725RRX9" target="blank">
                        <img src="gambar/placeholder.png" alt="Maps">
                        <span class="social-tooltip">Maps</span>
                    </a>
                </div>
                <div class="social-icon">
                    <a href="https://shopee.co.id/hola_olahansalak?entryPoint=ShopByPDP" target="blank">
                        <img src="gambar/shopee.jpeg" alt="Shopee">
                        <span class="social-tooltip">shopee</span>
                    </a>
                </div>
            </div>
        </div>
        <p>Jika Anda memerlukan bantuan, Anda dapat menemukan kami di lokasi berikut:</p>
        <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30072.58525832565!2d110.3685055!3d-7.602061!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6122ccf4b42f%3A0x4167d1c03004709c!2sHola%20olahan%20salak!5e1!3m2!1sid!2sid!4v1733854899229!5m2!1sid!2sid" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 UMKM Desa. Semua Hak Dilindungi.</p>
        </div>
    </footer>
    <script src="script.js" defer></script>
</body>
</html>
