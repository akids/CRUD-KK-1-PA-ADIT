<h1 class="mt-4">Kamar</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $id_kamar = $_POST['id_kamar'];
                        $jumlah = $_POST['jumlah'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $query = mysqli_query($koneksi, "UPDATE kamar SET id_kategori='$id_kategori', id_kamar='$id_kamar', jumlah='$jumlah', harga='$harga', deskripsi='$deskripsi' WHERE id_kamar=$id");

                        if ($query) {
                            echo '<script>alert("Ubah data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Ubah data gagal.");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-control">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($kat)) {
                                    ?>
                                    <option <?php if ($kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?> value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">ID Kamar</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['id_kamar']; ?>" class="form-control" name="id_kamar"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Jumlah</div>
                        <div class="col-md-8"><input type="number" value="<?php echo $data['jumlah']; ?>" class="form-control" name="jumlah"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Harga</div>
                        <div class="col-md-8"><input type="number" value="<?php echo $data['harga']; ?>" class="form-control" name="harga"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" rows="5" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=kamar" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="mt-4">Kategori Kamar</h1>
    <div class="card mb-3 mt-2 border-0 shadow">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Tambah Kategori Kamar</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $kategori = $_POST['kategori'];
                                    $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values('$kategori')");

                                    if ($query) {
                                        echo '<script>alert("Tambah data berhasil.");</script>';
                                    } else {
                                        echo '<script>alert("Tambah data gagal.");</script>';
                                    }
                                }
                                ?>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="kategori" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="kategori">
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
                        <div class="table-responsive">
                            <h3 class="card-title fw-bold">Tabel Kategori Kamar</h3>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $data['kategori']; ?></td>
                                            <td>
                                                <a href="?page=kategori_ubah&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-info">Ubah</a>
                                                <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=kategori_hapus&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-danger">Hapus</a>
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
    </div>
</div>
