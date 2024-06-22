<h1 class="mt-4">Edit User</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if(isset($_POST['submit'])) {
                        $nama = $_POST['nama'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $alamat = $_POST['alamat'];
                        $no_telepon = $_POST['no_telepon'];
                        
                        // Query untuk mengupdate data user berdasarkan id
                        $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', email='$email', alamat='$alamat', no_telepon='$no_telepon' WHERE id_user=$id");

                        if($query) {
                            echo '<script>alert("Ubah data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Ubah data gagal.");</script>';
                        }
                    }
                
                    // Mengambil data user berdasarkan id untuk ditampilkan di form
                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
                    $data = mysqli_fetch_array($query);            
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Nama</div>
                        <div class="col-md-8">
                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Username</div>
                        <div class="col-md-8">
                            <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Email</div>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Alamat</div>
                        <div class="col-md-8">
                            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">No Telepon</div>
                        <div class="col-md-8">
                            <input type="text" name="no_telepon" class="form-control" value="<?php echo $data['no_telepon']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=users" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
