<?php
include "client-detail-produk.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ubah Detail Produk - Admin</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" id="navigasi">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Toko Sepatu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="produk.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="produk.php">Data produk</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-produk.php">Tambah produk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="detail-produk.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Detail Produk</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="detail-produk.php">Data Detail Produk</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-detail-produk.php">Tambah Detail Produk</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="kategori.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="kategori.php">Data Kategori</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-kategori.php">Tambah Kategori</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="pelanggan.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pelanggan</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="pelanggan.php">Data Pelanggan</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-pelanggan.php">Tambah Pelanggan</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="transaksi.php">
                        <i class="bi-cart-fill me-1"></i>
                        Transaksi
                        <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Edit Detail</h1>
                <p class="lead fw-normal text-white-50 mb-0">hishoes</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="main-1">
            <?php
            $r = $clientDetail->tampil_detail_produk($_GET['id_detail']);
            ?>
            <form name="form" class="container" method="POST" action="proses-detail-produk.php">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="id_detail" value="<?= $r->id_detail ?>" />
                <div class="mb-3">
                    <label class="form-label">ID Detail</label>
                    <input type="text" class="form-control" name="id_detail" id="formGroupExampleInput" value="<?= $r->id_detail ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran" id="formGroupExampleInput2" value="<?= $r->ukuran ?>">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Bahan</label>
                    <input type="text" class="form-control" name="bahan" id="formGroupExampleInput2" value="<?= $r->bahan ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Warna</label>
                    <input type="text" class="form-control" name="warna" id="formGroupExampleInput2" value="<?= $r->warna ?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Merk</label>
                    <input type="text" class="form-control" name="merk" id="formGroupExampleInput2" value="<?= $r->merk ?>">
                </div>

                <div class="col-auto">
                    <button type="submit" name="ubah" class="btn btn-primary">Edit Detail</button>
                </div>
            </form>
        </div>

    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Heny Rimadana 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>