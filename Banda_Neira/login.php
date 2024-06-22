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
    <title>Login ke Banda Neira</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/login-style.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
        .login-form {
            flex: 1;
        }
        .login-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-image img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row login-container">
            <div class="col-lg-5 login-form">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-info">
                        <h3 class="text-center text-light font-weight-light my-4">Kepulauan Banda Neira</h3>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_POST['login'])) {
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);

                                $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                                $cek = mysqli_num_rows($data);
                                if($cek > 0 ){
                                    $_SESSION['user'] = mysqli_fetch_array($data);
                        ?>
                                    <div class="card text-white bg-success mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Selamat Datang!</h5>
                                            <p class="card-text">Login berhasil. Anda akan diarahkan ke halaman utama...</p>
                                        </div>
                                    </div>
                                    <meta http-equiv="refresh" content="3;URL=index.php">
                        <?php
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">Maaf, username/password salah</div>';
                                }
                            }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="inputEmail">Username</label>
                                <input class="form-control" id="inputEmail" type="text" name="username" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="login" value="login">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Belum punya akun? <a href="register.php">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 login-image">
                <img src="assets/img/darr.jpg"" alt="Kepulauan Banda Neira">
            </div>
        </div>
    </div>
</body>
</html>
