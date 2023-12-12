<?php
include "./admin/client-produk.php";
$dataProduk = $clientProduk->tampil_semua_produk();
include "./admin/client-pelanggan.php";
$dataPelanggan = $clientPelanggan->tampil_semua_pelanggan();
include "./cuci/client-paket.php";
$dataPaket = $clientPaket->tampil_semua_paket();


session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: ./login.php");
    exit();
}

// Check user role
$role = $_SESSION['role'];
if ($role !== 'user') {
    header("Location: ./admin/index.php"); // Redirect non-admin users
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HISHOES</title>
    <!-- Font-Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!-- Navigation-->
    <?php
    $activePage = 'home';
    include "navbar-user.php";
    ?>

    <!-- Header-->
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h2 class="fw-bold">Selamat Datang, <?php echo $_SESSION['nama']; ?>!</h2>
                <p class="lead fw-normal text-white-50 mb-0">Menjual Sepatu termurah dan lengkap</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="container-fluid mb-5 px-4">
            <div class="row">
                <!-- Toko Sepatu -->
                <div class="col-8">
                    <div class="card text-center h-100">
                        <h4 class="card-header">Toko Sepatu</h4>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                foreach ($dataProduk as $produk) {
                                ?>
                                    <div class="col-4 mb-4">
                                        <div class="card h-100">
                                            <img src="admin/<?= $produk->image ?>" class="card-img-top" alt="<?= $produk->nama_produk ?>">
                                            <div class="card-body">
                                                <h6 class="card-title mb-4"><?= $produk->nama_produk ?></h6>
                                                <p class="card-subtitle py-2 text-secondary"><?= $produk->nama_kategori ?></p>
                                                <ul class="list-group list-group-flush ">
                                                    <li class="list-group-item py-1">
                                                        <p class="card-text ">Rp.
                                                            <?= number_format($produk->harga, 0, ',', '.'); ?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-footer">
                                                <a href="./form-transaksi.php" class="btn btn-outline-success mt-auto"><i class="fa-solid fa-cart-shopping"></i> Beli
                                                    Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                unset($dataProduk, $produk);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cuci Sepatu -->
                <div class="col-4">
                    <div class="card h-100">
                        <h4 class="card-header text-center">Cuci Sepatu</h4>
                        <div class="card-body">
                            <?php
                            foreach ($dataPaket as $paket) {
                            ?>
                                <div class="list-group mb-2">
                                    <a href="form-cuci.php" class="list-group-item list-group-item-action" aria-current="true">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1"><?= $paket->nama_paket ?></h6>
                                            <small>3 days ago</small>
                                        </div>
                                        <p class="mb-1 text-secondary"><?= $paket->nama_kategori ?></p>
                                        <small>Rp. <?= number_format($paket->harga, 0, ',', '.'); ?></small>
                                    </a>
                                </div>
                            <?php
                            }
                            unset($dataProduk, $produk);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"><strong>Copyright &copy; 2023 <a href="https://instagram.com/henyrmdn_" target="_blank">Heny Rimadana</a> & <a href="https://instagram.com/imamtl.k" target="_blank">Imamatul Khoiriyah</a>.</strong>
                All rights reserved.</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>