<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register Banda Neira</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/login-style.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-info"><h3 class="text-center text-light font-weight-light my-4">Register Banda Neira</h3></div>
                    <div class="card-body">
                        <?php
                            if(isset($_POST['register'])) {
                                $nama = $_POST['nama'];
                                $email = $_POST['email'];
                                $no_telepon = $_POST['no_telepon'];
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);

                                $insert = mysqli_query($koneksi, "INSERT INTO user (nama,email,alamat,no_telepon,username,password) VALUES('$nama','$email','$alamat','$no_telepon','$username','$password')");

                                if($insert) {
                                    echo '<script>alert("Selamat, register berhasil. Silahkan Login."); location.href="login.php"</script>';
                                }else{
                                    echo '<script>alert("Register Gagal, Silahkan Ulangi Kembali.");</script>';
                                }
                            }
                        ?>
                        <form method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1">Nama Lengkap</label>
                                    <input class="form-control" type="text" required name="nama" placeholder="Masukkan Nama Lengkap" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1">Email</label>
                                    <input class="form-control" type="text" required name="email" placeholder="Masukkan Email" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1">No. Telepon</label>
                                    <input class="form-control" type="text" required name="no_telepon" placeholder="Masukkan No. Telepon" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1">Alamat</label>
                                    <textarea class="form-control" rows="3" required name="alamat" placeholder="Masukkan Alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1">Username</label>
                                    <input class="form-control" type="text" required name="username" placeholder="Masukkan Username" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="inputpassword">Password</label>
                                    <input class="form-control" required name="password" type="password" placeholder="Password" />
                                </div>
                            </div>
                            <input name="level" type="hidden" value="peminjam"/>
                            <button class="btn btn-primary btn-block" type="submit" name="register" value="register">Register</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Sudah punya akun? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            &copy;2024 Banda Neira
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
