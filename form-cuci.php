<?php
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
            <div class="col-xl-5 col-lg-6 col-md-9 col-sm-11">
                <form name="form" class="container" method="POST" action="cuci/proses-transaksi.php">
                    <input type="hidden" name="aksi" value="tambah" />
                    <div class="form-group" hidden>
                        <label class="form-label" hidden>ID Transaksi</label>
                        <input type="text" class="form-control" name="id_transaksi" id="formGroupExampleInput" placeholder="Otomatis" hidden>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Paket</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_paket">
                            <option selected disabled>Pilih Paket</option>
                            <?php
                            include "./cuci/client-paket.php";
                            $dataPaket = $clientPaket->tampil_semua_paket();
                            foreach ($dataPaket as $paket) {
                            ?>
                                <option value="<?= $paket->id_paket ?>">
                                    <?= $paket->nama_paket ?>
                                </option>
                            <?php
                            }
                            unset($dataPaket, $paket);
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" id="formGroupExampleInput" value="<?php echo $_SESSION['nama']; ?>" hidden>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $_SESSION['nama']; ?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk" id="formGroupExampleInput2">
                    </div>
                    <div class="form-group mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tgl_keluar" id="formGroupExampleInput2">
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