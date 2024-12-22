<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image']['name'];
    $alt_text = $_POST['alt_text'];

    // Tentukan folder upload
    $target_dir = "uploads/";

    // Ubah nama file agar lebih aman (menghindari spasi atau karakter khusus)
    $new_name = uniqid() . '-' . basename($image);
    $target_file = $target_dir . $new_name;

    // Periksa apakah folder 'uploads' ada dan memiliki izin yang benar
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);  // Membuat folder jika belum ada
    }

    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        echo "Gambar berhasil diupload.";
        // Menyimpan informasi ke database
        $sql = "INSERT INTO galeri (image, alt_text) VALUES ('$target_file', '$alt_text')";
        if ($conn->query($sql) === TRUE) {
            echo " Gambar berhasil ditambahkan ke galeri.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengupload gambar.";
    }
    
    $conn->close();
}
?>
