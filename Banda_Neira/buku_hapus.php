<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kamar WHERE id_kamar=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href = "index.php?page=kamar";
    </script>