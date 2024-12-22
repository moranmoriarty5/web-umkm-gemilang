<?php
include 'config.php';  // Menyertakan koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $image = $_FILES['image']['name'];
    $alt_text = $_POST['alt_text'];
    $description = $_POST['description'];

    // Cek apakah gambar sudah dipilih dan tidak ada error
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Tentukan direktori upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        // Mendapatkan ekstensi file
        $image_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi ekstensi file (hanya gambar yang diperbolehkan)
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($image_extension, $allowed_extensions)) {
            // Membuat nama file unik untuk menghindari overwrite
            $new_image_name = uniqid('', true) . '.' . $image_extension;
            $new_target_file = $target_dir . $new_image_name;

            // Cek apakah ukuran file gambar tidak melebihi batas (misalnya 5MB)
            if ($_FILES['image']['size'] <= 5 * 1024 * 1024) {
                // Pindahkan file gambar ke direktori tujuan
                if (move_uploaded_file($_FILES['image']['tmp_name'], $new_target_file)) {
                    // Menyimpan data informasi ke dalam database
                    $sql = "INSERT INTO informasi (image, alt_text, description) 
                            VALUES ('$new_target_file', '$alt_text', '$description')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Informasi berhasil diupload.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Gagal meng-upload gambar.";
                }
            } else {
                echo "Ukuran gambar terlalu besar, maksimal 5MB.";
            }
        } else {
            echo "Hanya file gambar yang diperbolehkan (jpg, jpeg, png, gif).";
        }
    } else {
        echo "Gambar tidak ditemukan atau ada masalah dengan upload gambar.";
    }

    $conn->close();  // Menutup koneksi database
}
?>
