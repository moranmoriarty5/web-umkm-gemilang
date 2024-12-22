<?php
include 'config.php';

// Query untuk mengambil data informasi
$sql_informasi = "SELECT * FROM informasi ORDER BY id DESC";
$result_informasi = $conn->query($sql_informasi);
if (!$result_informasi) {
    die("Query gagal: " . $conn->error);
}

// Query untuk galeri
$sql_galeri = "SELECT * FROM galeri ORDER BY id DESC";
$result_galeri = $conn->query($sql_galeri);
if (!$result_galeri) {
    die("Query gagal: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Gemilang</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <div class="container">
            <h1>Halaman Admin</h1>

            <!-- Form to upload Informasi -->
            <section>
                <h2>Upload Informasi</h2>
                <form action="upload_informasi.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" required>
                    <input type="text" name="alt_text" placeholder="Alt Text" required>
                    <textarea name="description" placeholder="Deskripsi" required></textarea>
                    <button type="submit">Upload Informasi</button>
                </form>
            </section>

            <!-- Form to upload Galeri -->
            <section>
                <h2>Upload Foto</h2>
                <form action="upload_galeri.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" required>
                    <input type="text" name="alt_text" placeholder="Alt Text" required>
                    <button type="submit">Upload Gambar</button>
                </form>
            </section>
        </div>
    </body>
</html>
