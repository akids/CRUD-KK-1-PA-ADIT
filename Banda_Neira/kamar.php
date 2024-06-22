<div class="container">
    <h1 class="mt-4">Kamar</h1>
    <div class="card mb-3 mt-2 border-0 shadow">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Tambah Kamar</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $id_kamar = $_POST['id_kamar'];
                                    $kategori = $_POST['kategori'];
                                    $jumlah = $_POST['jumlah'];
                                    $harga = $_POST['harga'];
                                    $query = mysqli_query($koneksi, "INSERT INTO kamar (id_kamar, kategori, jumlah, harga) VALUES ('$id_kamar', '$kategori', '$jumlah', '$harga')");

                                    if ($query) {
                                        echo '<script>alert("Tambah data berhasil.");</script>';
                                    } else {
                                        echo '<script>alert("Tambah data gagal.");</script>';
                                    }
                                }
                                ?>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="id_kamar" class="form-label">ID Kamar</label>
                                        <input type="text" class="form-control" name="id_kamar">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select id="kategori" name="kategori" class="form-control">
                                            <option value="Standard Room">Standard Room</option>
                                            <option value="Single Room">Single Room</option>
                                            <option value="Double Room">Double Room</option>
                                            <option value="Family Room">Family Room</option>
                                            <option value="Smoking Room">Smoking Room</option>
                                            <option value="Twin Room">Twin Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input id="harga" type="number" class="form-control" name="harga">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="total_harga" class="form-label">Total Harga</label>
                                        <input id="total_harga" type="number" class="form-control" name="total_harga" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <h3 class="card-title fw-bold">Tabel Kamar</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Kamar</th>
                                <th>Nama Kategori</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM kamar");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $data['id_kamar']; ?></td>
                                    <td><?php echo $data['kategori']; ?></td>
                                    <td><?php echo $data['jumlah']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['harga'] * $data['jumlah']; ?></td>
                                    <td>
                                        <a href="?page=buku_ubah&&id=<?php echo $data['id_kamar']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=buku_hapus&&id=<?php echo $data['id_kamar']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('kategori').addEventListener('change', function() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = document.getElementById('harga');
        switch (this.value) {
            case 'Standard Room':
                harga.value = 500000;
                break;
            case 'Single Room':
                harga.value = 400000;
                break;
            case 'Double Room':
                harga.value = 600000;
                break;
            case 'Family Room':
                harga.value = 1200000;
                break;
            case 'Smoking Room':
                harga.value = 700000;
                break;
            case 'Twin Room':
                harga.value = 650000;
                break;
            default:
                harga.value = 0;
                break;
        }
        updateTotalHarga();
    });

    document.getElementById('jumlah').addEventListener('input', function() {
        updateTotalHarga();
    });

    function updateTotalHarga() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = document.getElementById('harga').value;
        var totalHarga = document.getElementById('total_harga');
        totalHarga.value = harga * jumlah;
    }
</script>
