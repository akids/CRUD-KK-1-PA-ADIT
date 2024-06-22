<div class="container">
    <h1 class="mt-4">User</h1>
    <div class="card mb-3 mt-2 border-0 shadow">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM user");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['no_telepon']; ?></td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="?page=user_edit&id=<?php echo $data['id_user']; ?>" class="btn btn-primary">Edit</a>
                                    <!-- Delete button with confirmation -->
                                    <button onclick="deleteUser(<?php echo $data['id_user']; ?>)" class="btn btn-danger">Hapus</button>
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
    function deleteUser(userId) {
        if (confirm('Apakah anda yakin menghapus data ini?')) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Response from the server
                    alert(this.responseText); // You can use this to alert the response
                    // Reload the page after deletion
                    location.reload();
                }
            };
            // Send a GET request to the server
            xhttp.open("GET", "user_hapus.php?id=" + userId, true);
            xhttp.send();
        }
    }
</script>
