<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ukk_perpus");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Memeriksa apakah parameter id telah diterima dari URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID ulasan tidak valid.";
    exit();
}

$id_ulasan = $_GET['id'];

// Query untuk menghapus ulasan berdasarkan id
$query = mysqli_query($koneksi, "DELETE FROM ulasan WHERE id_ulasan='$id_ulasan'");

if ($query) {
    echo '<script>alert("Hapus ulasan berhasil.");</script>';
    echo '<script>window.location.href = "index.php?page=ulasan";</script>'; // Ganti index.php dengan halaman utama yang sesuai
} else {
    echo '<script>alert("Hapus ulasan gagal.");</script>';
}
?>
