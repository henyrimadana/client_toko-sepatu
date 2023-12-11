<?php
include "admin/client-transaksi.php";
$dataTransaksi = $clientTransaksi->tampil_semua_transaksi();

include "admin/client-pelanggan.php";
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
                        <a class="nav-link " aria-current="page" href="./utama.php">Home</a>
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
                            <li><a class="dropdown-item" href="./user-transaksi.php">Detail Transaksi</a></li>
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
                <h1 class="display-4 fw-bolder">Transaksi</h1>
                <p class="lead fw-normal text-white-50 mb-0">Menjual Sepatu termurah dan lengkap</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5 mb-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-5 col-lg-6 col-md-9 col-sm-11">
                <form name="form" class="container" method="POST" action="admin/proses-transaksi.php">
                    <input type="hidden" name="aksi" value="tambah" />
                    <div class="form-group" hidden>
                        <label class="form-label" hidden>ID Transaksi</label>
                        <input type="text" class="form-control" name="id_transaksi" id="formGroupExampleInput" placeholder="Otomatis" hidden>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Produk</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_produk">
                            <option selected disabled>Pilih Produk</option>
                            <?php
                            include "admin/client-produk.php";
                            $dataProduk = $clientProduk->tampil_semua_produk();
                            foreach ($dataProduk as $produk) {
                            ?>
                                <option value="<?= $produk->id_produk ?>">
                                    <?= $produk->nama_produk ?>
                                </option>
                            <?php
                            }
                            unset($dataProduk, $produk);
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Pelanggan</label>
                        <input type="text" class="form-control" name="id_pelanggan" id="formGroupExampleInput" value="<?php echo $_SESSION['id_pelanggan']; ?>" hidden>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $_SESSION['nama']; ?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="formGroupExampleInput2">
                    </div>
                    <div class="form-group mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="formGroupExampleInput2" placeholder="Silahkan isi Jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="simpan">Save</button>
                </form>
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