<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ukk_perpus");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

$id = $_GET['id'];

// Hapus data user dari tabel user
$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");

if ($query) {
    echo 'Data berhasil dihapus.';
} else {
    echo 'Gagal menghapus data.';
}

mysqli_close($koneksi);
?>
