<?php
include "cuci/client-transaksi.php";
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

$dataTransaksi = $clientTransaksi->tampil_semua_transaksi();

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
    $activePage = 'cuci';
    include "navbar-user.php";
    ?>

    <!-- Header-->
    <header class="bg-dark py-3">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Cuci Sepatu</h1>
                <p class="lead fw-normal text-white-50 mb-0">Mencuci Sepatu termurah dan terbersih</p>
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
                            <th>Paket</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Harga</th>
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
                                    <?= $r->nama_paket ?>
                                </td>
                                <td>
                                    <?= $r->nama_pelanggan ?>
                                </td>

                                <td>
                                    <?= $r->tgl_masuk ?>
                                </td>

                                <td>
                                    <?= $r->tgl_keluar ?>
                                </td>
                                <?php $total = $r->jumlah * $r->harga ?>
                                <td class="col-2 text-center">
                                    Rp. <?php echo number_format($r->harga, 0, ',', '.'); ?>
                                </td>


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