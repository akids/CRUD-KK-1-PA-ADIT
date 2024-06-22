<div class="container">
    <h1 class="card-text text-center m-4">Selamat datang <b><?php echo $_SESSION['user']['nama']?></b> di Hotel Banda Neira</h1>
    
    <div class="container">
        <div class="card mb-3 mt-2 border-0 shadow">
            <div class="card-body">
                <div class="row">
                    <!-- Card 1: Total Kamar -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4 rounded-3">
                            <div class="card-body">
                                <i class="fas fa-bed fa-3x"></i>
                                <div class="h4 mt-3"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kamar")); ?></div>
                                <p class="text-uppercase mb-0">Total Kamar Hotel</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between bg-transparent border-top-0">
                                <a class="small text-white stretched-link" href="index.php?page=kamar">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Total Ulasan -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4 rounded-3">
                            <div class="card-body">
                                <i class="fas fa-comments fa-3x"></i>
                                <div class="h4 mt-3"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan")); ?></div>
                                <p class="text-uppercase mb-0">Ulasan</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between bg-transparent border-top-0">
                                <a class="small text-white stretched-link" href="index.php?page=ulasan">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Total User -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4 rounded-3">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x"></i>
                                <div class="h4 mt-3"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); ?></div>
                                <p class="text-uppercase mb-0">Total User</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between bg-transparent border-top-0">
                                <a class="small text-white stretched-link" href="index.php?page=users">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3 mt-2 border-0 shadow m-2">
        <div class="card-body">
            <div class="row g-0 align-items-center">
                <!-- Left side with text -->
                <div class="col-lg-6">
                    <div class="card-body">
                        <h1 class="card-title fw-bold">Tentang Kami</h1>
                        <p class="card-text">Kami adalah hotel penginapan berbasis web yang lokasinya berada di Banda Neira</p>
                        <a href="RumahBanda.html" class="btn btn-primary mt-3 btn-lg">Mulai</a>
                    </div>
                </div>
                <!-- Right side with image -->
                <div class="col-lg-6">
                    <div class="text-center">
                    </div><img src="assets/img/darr.jpg" alt="Library Image" class="img-fluid border shadow-sm m-2" style="width: 80%;">
                </div>
            </div>
        </div>
    </div>
</div>
