<div class="container">
    <h1 class="mt-4">Buku</h1>
    <div class="card mb-3 mt-2 border-0 shadow">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Ubah Buku</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post">
                                <?php
                                    $id = $_GET['id'];
                                    if(isset($_POST['submit'])) {
                                        $id_kamar = $_POST['id_kamar'];
                                        $kategori = $_POST['kategori'];
                                        $jumlah = $_POST['jumlah'];
                                        $harga = $_POST['harga'];
                                        $query = mysqli_query($koneksi, "UPDATE kamar SET id_kamar='$id_kamar', kategori='$kategori', jumlah='$jumlah', harga='$harga' WHERE id_kamar=$id");

                                        if($query) {
                                            echo '<script>alert("Ubah data berhasil.");</script>';
                                        }else{
                                            echo '<script>alert("Ubah data gagal.");</script>';
                                        }
                                    }
                                    $query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar=$id");
                                    $data = mysqli_fetch_array($query);            
                                ?>
                                <div class="row mb-3">
                                    <div class="col-md-2">ID Kamar</div>
                                    <div class="col-md-8"><input type="text" value="<?php echo $data['id_kamar']; ?>" class="form-control" name="id_kamar"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Kategori</div>
                                    <div class="col-md-8">
                                        <select name="kategori" class="form-control">
                                            <option <?php if($data['kategori'] == 'Standard Room') echo'selected'; ?> value="Standard Room">Standard Room</option>
                                            <option <?php if($data['kategori'] == 'Single Room') echo'selected'; ?> value="Single Room">Single Room</option>
                                            <option <?php if($data['kategori'] == 'Double Room') echo'selected'; ?> value="Double Room">Double Room</option>
                                            <option <?php if($data['kategori'] == 'Family Room') echo'selected'; ?> value="Family Room">Family Room</option>
                                            <option <?php if($data['kategori'] == 'Smoking Room') echo'selected'; ?> value="Smoking Room">Smoking Room</option>
                                            <option <?php if($data['kategori'] == 'Twin Room') echo'selected'; ?> value="Twin Room">Twin Room</option>
                                        </select>
                                    </div>
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
        </div>
    </div>
</div>

<script>
    document.getElementsByName('kategori')[0].addEventListener('change', function() {     
        var jumlah = document.getElementsByName('jumlah')[0].value;
        var harga = document.getElementsByName('harga')[0];
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

    document.getElementsByName('jumlah')[0].addEventListener('input', function() {
        updateTotalHarga();
    });

    function updateTotalHarga() {
        var jumlah = document.getElementsByName('jumlah')[0].value;
        var harga = document.getElementsByName('harga')[0].value;
        var totalHarga = document.getElementById('total_harga');
        totalHarga.value = harga * jumlah;
    }
</script>
