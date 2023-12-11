<?php
require_once "./admin/client-produk.php";
$dataProduk = $clientProduk->tampil_semua_produk();
include "./admin/client-pelanggan.php";
$dataPelanggan = $clientPelanggan->tampil_semua_pelanggan();

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
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container-md">
            <a class="navbar-brand" href="./utama.php">HISHOES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./utama.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./form-transaksi.php">Tambah Transaksi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="user-transaksi.php?id_pelanggan=<?php echo $_SESSION['id_pelanggan']; ?>">Detail Transaksi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php?logout">Logout</a></li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header-->
    <header class="bg-dark py-3">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Selamat Datang, <?php echo $_SESSION['nama']; ?>!</h1>
                <p class="lead fw-normal text-white-50 mb-0">Menjual Sepatu termurah dan lengkap</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                foreach ($dataProduk as $produk) {
                ?>
                    <div class="col-4 mb-4">
                        <div class="card h-100">

                            <!-- Product image-->
                            <img class="card-img-top" src="admin/<?= $produk->image ?>" alt="<?= $produk->nama_produk ?>" />
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder mb-4">
                                        <?= $produk->nama_produk ?>
                                    </h5>
                                    <p class="card-subtitle py-2 small text-secondary">
                                        <?= $produk->nama_kategori ?>
                                    </p>
                                    <!-- Product price-->
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <p class="card-text ">Rp.
                                                <?= number_format($produk->harga, 0, ',', '.'); ?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-success mt-auto" href="./form-transaksi.php"><i class="fa-solid fa-cart-shopping"></i> Beli
                                        Sekarang</a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                }
                unset($dataProduk, $produk);
                ?>
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