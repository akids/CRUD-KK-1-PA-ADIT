<?php
include "koneksi.php";
if(!isset($_SESSION['user'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Banda Neira</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        @media (min-width: 992px) {
            .main-content {
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }
    </style>
</head>
<body class="">
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="index.html"><i class="fas fa-book me-1"></i>Banda Neira</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'home' ? 'active' : ''; ?>">
                    <a class="nav-link" href="?page=home"><i class="fas fa-home me-1"></i>Dashboard</a>
                </li>
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'kamar' ? 'active' : ''; ?>">
                    <a class="nav-link" href="?page=kamar"><i class="fas fa-book me-1"></i>Kamar</a>
                </li>
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'ulasan' ? 'active' : ''; ?>">
                    <a class="nav-link" href="?page=ulasan"><i class="fas fa-star me-1"></i>Ulasan</a>
                </li>
                <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'users' ? 'active' : ''; ?>">
                    <a class="nav-link" href="?page=users"><i class="fas fa-user me-1"></i>User</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-1"></i><?php echo $_SESSION['user']['nama']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')"><i class="fa fa-sign-out me-1"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="main-content row align-items-center">
        <main class="col-lg-10">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            if(file_exists($page . '.php')){
                include $page . '.php';
            }else{
                include '404.php';
            }
            ?>
        </main>
    </div>
</div>

<!-- Footer -->
<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">© <?php echo date("Y"); ?> Banda Neira</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
