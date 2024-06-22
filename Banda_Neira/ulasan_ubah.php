<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Ulasan</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
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

// Memproses form jika ada pengiriman data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id_kamar = $_POST['id_kamar'];
        $ulasan = $_POST['ulasan'];
        $rating = $_POST['rating'];

        // Query untuk mengupdate ulasan berdasarkan id
        $query = mysqli_query($koneksi, "UPDATE ulasan SET id_kamar='$id_kamar', ulasan='$ulasan', rating='$rating' WHERE id_ulasan='$id_ulasan'");

        if ($query) {
            echo '<script>alert("Ubah ulasan berhasil.");</script>';
            echo '<script>window.location.href = "index.php?page=ulasan";</script>'; 
        } else {
            echo '<script>alert("Ubah ulasan gagal.");</script>';
        }
    }
}

// Mengambil data ulasan berdasarkan id
$result = mysqli_query($koneksi, "SELECT ulasan.id_ulasan, ulasan.id_kamar, ulasan.ulasan, ulasan.rating, kamar.kategori FROM ulasan JOIN kamar ON ulasan.id_kamar = kamar.id_kamar WHERE ulasan.id_ulasan='$id_ulasan'");
if (!$result) {
    echo "Query Error: " . mysqli_error($koneksi);
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Ulasan</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Sesuaikan dengan path Bootstrap CSS Anda -->
</head>
<body>
<div class="container">
    <h1 class="mt-4">Ubah Ulasan</h1>
    <div class="card mb-3 mt-2 border-0 shadow">
        <div class="card-body">
            <form id="form-ulasan" method="post" action="">
                <div class="col-md-6 mb-3">
                    <label for="id_kamar" class="form-label">Pilih Kamar</label>
                    <select name="id_kamar" id="id_kamar" class="form-control" required>
                        <?php
                        $kamar_query = mysqli_query($koneksi, "SELECT * FROM kamar");
                        if (!$kamar_query) {
                            echo "Query Error: " . mysqli_error($koneksi);
                        }
                        while ($kamar = mysqli_fetch_array($kamar_query)) {
                            $selected = ($kamar['id_kamar'] == $row['id_kamar']) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $kamar['id_kamar']; ?>" <?php echo $selected; ?>><?php echo $kamar['kategori']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            $selected = ($i == $row['rating']) ? 'selected' : '';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ulasan" class="form-label">Ulasan</label>
                    <textarea name="ulasan" rows="5" class="form-control" required><?php echo $row['ulasan']; ?></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary me-2" name="submit" value="submit">Simpan</button>
                    <a href="index.php?page=ulasan" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
