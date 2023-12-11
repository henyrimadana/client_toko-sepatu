<?php
include "admin/client-transaksi.php";
include "admin/client-pelanggan.php";

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

// Dapatkan ID pengguna yang sedang login
$idPelanggan = $_SESSION['id_pelanggan'];

// Ambil transaksi hanya untuk pengguna yang sedang login
$dataTransaksi = $clientTransaksi->tampil_transaksi_by_pelanggan($idPelanggan);

// Ambil semua data pelanggan
$dataPelanggan = $clientPelanggan->tampil_semua_pelanggan();
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
                <h1 class="display-4 fw-bolder">Transaksi</h1>
                <p class="lead fw-normal text-white-50 mb-0">Menjual Sepatu termurah dan lengkap</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5 mb-5">
        <div class="row justify-content-center align-items-center">
            <div class="col px-5">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th class="col-1">No</th>
                            <th class="col-1">ID Transaksi</th>
                            <th>Produk</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th class="col-2">Harga</th>
                            <th class="col-2">Total</th>
                        </tr>
                    </thead>
                    <tbody class="table-border text-center align-middle text-wrap">
                        <?php $no = 1;
                        foreach ($dataTransaksi as $r) {
                        ?>
                            <tr>
                                <td>
                                    <?= $no ?>
                                </td>
                                <td>
                                    <?= $r->id_transaksi ?>
                                </td>
                                <td>
                                    <?= $r->nama_produk ?>
                                </td>
                                <td>
                                    <?= $r->nama ?>
                                </td>

                                <td>
                                    <?= $r->tanggal ?>
                                </td>

                                <td>
                                    <?= $r->jumlah ?>
                                </td>
                                <?php $total = $r->jumlah * $r->harga ?>
                                <td class="col-2 text-center">
                                    Rp. <?php echo number_format($r->harga); ?>
                                </td>
                                <td class="col-2 text-center">Rp. <?php echo number_format($total); ?></td> <!-- New column for total -->


                            </tr>
                        <?php $no++;
                        }
                        unset($dataTransaksi, $r, $no);
                        ?>
                    </tbody>
                </table>
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