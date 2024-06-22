<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ukk_perpus");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Kamar</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Sesuaikan dengan path Bootstrap CSS Anda -->
</head>
<body>
<div class="container">
    <h1 class="mt-4">Rating Kamar</h1>
    <div class="card mb-3 mt-2 border-0 shadow">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <form id="form-ulasan" method="post" action="">
                                <?php
                                if (isset($_POST['submit'])) {
                                    if (isset($_POST['id_kamar']) && isset($_POST['ulasan']) && isset($_POST['rating'])) {
                                        $id_kamar = $_POST['id_kamar'];
                                        $ulasan = $_POST['ulasan'];
                                        $rating = $_POST['rating'];

                                        $query = mysqli_query($koneksi, "INSERT INTO ulasan (id_kamar, ulasan, rating) VALUES ('$id_kamar', '$ulasan', '$rating')");

                                        if ($query) {
                                            echo '<script>alert("Tambah ulasan berhasil.");</script>';
                                        } else {
                                            echo '<script>alert("Tambah ulasan gagal.");</script>';
                                        }
                                    } else {
                                        echo '<script>alert("Mohon lengkapi semua field.");</script>';
                                    }
                                }
                                ?>
                                <div class="col-md-6 mb-3">
                                    <label for="id_kamar" class="form-label">Pilih Kamar</label>
                                    <select name="id_kamar" id="id_kamar" class="form-control" required>
                                        <?php
                                        $kamar_query = mysqli_query($koneksi, "SELECT * FROM kamar");
                                        if (!$kamar_query) {
                                            echo "Query Error: " . mysqli_error($koneksi);
                                        }
                                        while ($kamar = mysqli_fetch_array($kamar_query)) {
                                            ?>
                                            <option value="<?php echo $kamar['id_kamar']; ?>"><?php echo $kamar['kategori']; ?></option>
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
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="ulasan" class="form-label">Ulasan</label>
                                    <textarea name="ulasan" rows="5" class="form-control" required></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary me-2" name="submit" value="submit">Simpan</button>
                                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Ulasan</th>
                                <th>Kategori Kamar</th>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $ulasan_query = mysqli_query($koneksi, "SELECT ulasan.id_ulasan, ulasan.ulasan, ulasan.rating, kamar.kategori FROM ulasan JOIN kamar ON ulasan.id_kamar = kamar.id_kamar");
                            if (!$ulasan_query) {
                                echo "Query Error: " . mysqli_error($koneksi);
                            } else {
                                while ($ulasan = mysqli_fetch_array($ulasan_query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $ulasan['id_ulasan']; ?></td>
                                        <td><?php echo $ulasan['kategori']; ?></td>
                                        <td><?php echo $ulasan['ulasan']; ?></td>
                                        <td><?php echo $ulasan['rating']; ?></td>
                                        <td>
                                            <a href="ulasan_ubah.php?id=<?php echo $ulasan['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
                                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="ulasan_hapus.php?id=<?php echo $ulasan['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success" onclick="showForm()">Tambah Ulasan Baru</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showForm() {
        var form = document.getElementById("form-ulasan");
        form.style.display = "block";
    }
</script>
</body>
</html>
