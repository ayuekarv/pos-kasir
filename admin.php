<?php

require 'function01.php';

$h1 = mysqli_query($conn, "select * from user");
$h2 = mysqli_num_rows($h1); //jumlah admin


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kelola Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin.php">Cahaya Berkah Sejahtera</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index01.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Order
                        </a>
                        <a class="nav-link" href="stock01.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Barang
                        </a>
                        <a class="nav-link" href="masuk01.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="suplier.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Supplier
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Kelola Pelanggan
                        </a>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Kelola Admin
                        </a>
                        <a class="nav-link" href="laporan01.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Laporan Penjualan
                        </a>
                        <a class="nav-link" href="logout.php">
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Kelola Admin</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Jumlah Admin & User: <?= $h2; ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Admin
                    </button>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Admin & User
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" collspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Admin</th>
                                            <th>Email</th>
                                            <th>No Telepon</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $get = mysqli_query($conn, "select * from user");
                                        $i = 1;

                                        while ($p = mysqli_fetch_array($get)) {
                                            $namaadmin  = $p['namaadmin'];
                                            $email      = $p['email'];
                                            $username   = $p['username'];
                                            $pw         = $p['password'];
                                            $notelp     = $p['notelp'];
                                            $level      = $p['level'];
                                            $iduser     = $p['iduser'];

                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $namaadmin ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $notelp ?></td>
                                                <td><?= $level ?></td>
                                                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $iduser; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $iduser; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $iduser; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!--Modal Header-->
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <!--Modal Body-->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="text" name="namaadmin" class="form-control mb-4" placeholder="Nama Admin" value="<?= $namaadmin; ?>">
                                                                <input type="email" name="email" class="form-control mb-4" placeholder="Email" value=" <?= $email; ?>">
                                                                <input type="username" name="username" class="form-control mb-4" placeholder="Username" value="<?= $username; ?>">
                                                                <input type="password" name="password" class="form-control mb-4" placeholder="Password" value="<?= $pw; ?>">
                                                                <input type="text" name="notelp" class="form-control mb-4" placeholder="No Telepon" value="<?= $notelp; ?>">
                                                                <input type="text" name="level" class="form-control mb-4" placeholder="Level" value=" <?= $level; ?>">
                                                                <input type="hidden" name="iduser" value="<?= $iduser; ?>">
                                                            </div>

                                                            <!--Modal Footer-->
                                                            <div class=" modal-footer">
                                                                <button type="submit" class="btn btn-success" name="editadmin">Submit</button>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Delete Modal -->
                                            <div class="modal fade" id="delete<?= $iduser; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!--Modal Header-->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title fs-5" id="exampleModalLabel">Hapus User <?= $namaadmin; ?></h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <form method="post">

                                                            <!--Modal Body-->
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data ini?
                                                                <input type="hidden" name="iduser" value="<?= $iduser; ?>">
                                                            </div>

                                                            <!--Modal Footer-->
                                                            <div class=" modal-footer">
                                                                <button type="submit" class="btn btn-success" name="hapusadmin">Submit</button>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }; //end of while
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Ayu Eka Marviyanti 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal Header-->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post">

                <!--Modal Body-->
                <div class="modal-body">
                    <input type="text" name="namaadmin" class="form-control mb-4" placeholder="Nama Admin">
                    <input type="email" name="email" class="form-control mb-4" placeholder="Email">
                    <input type="username" name="username" class="form-control mb-4" placeholder="Username">
                    <input type="password" name="password" class="form-control mb-4" placeholder="Password">
                    <input type="text" name="notelp" class="form-control mb-4" placeholder="No Telepon">
                    <select name="level" id="level" class="form-control">
                        <option value="">-- Level --</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                </div>

                <!--Modal Footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="tambahuser">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


</html>