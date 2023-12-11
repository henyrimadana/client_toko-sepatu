<?php
include "client-produk.php";
include "client-transaksi.php";

$dataTransaksi = $clientTransaksi->tampil_semua_transaksi();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
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

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="./dist/img/hishoes.png" alt="AdminLTELogo" height="200" width="200">
    </div>

    <!-- Navbar -->
    <?php
    include "navbar.php";
    ?>
    <!-- /.navbar -->

    <!-- Sidebar -->
    <?php
    $activePage = 'produk';
    include "sidebar.php";
    ?>
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Produk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item active">Produk</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar Sepatu Gemoy</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead class="table-secondary text-center">
                      <tr>
                        <th class="col-1">No</th>
                        <th class="col-1">ID Produk</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Detail</th>
                        <th>Kategori</th>

                        <th class="col-2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border text-center align-middle text-wrap">
                      <?php $no = 1;
                      $dataProduk = $clientProduk->tampil_semua_produk();
                      foreach ($dataProduk as $produk) {
                      ?>
                        <tr>
                          <td>
                            <?= $no ?>
                          </td>
                          <td>
                            <?= $produk->id_produk ?>
                          </td>
                          <td>
                            <img src="<?= $produk->image ?>" alt="<?php echo $item['name']; ?>" style="max-width: 150px; max-height: 150px;" class="rounded">
                          </td>
                          <td>
                            <?= $produk->nama_produk ?>
                          </td>
                          <td>
                            <?= $produk->harga ?>
                          </td>
                          <td>
                            <?= $produk->stok ?>
                          </td>
                          <td>
                            <?= $produk->bahan ?> (<?= $produk->ukuran ?>) - <?= $produk->merk ?> <?= $produk->warna ?>
                          </td>
                          <td>
                            <?= $produk->nama_kategori ?>
                          </td>
                          <td class="col-2 text-center">
                            <a class="btn btn-outline-primary btn-sm" type="button" a href="ubah-produk.php?id_produk=<?= $produk->id_produk ?>"><i class="fas fa-edit"></i> Ubah</a>
                            <a class="btn btn-outline-danger btn-sm" type="button" a href="proses-produk.php?aksi=hapus&id_produk=<?= $produk->id_produk ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                          </td>

                        </tr>
                      <?php $no++;
                      }
                      unset($dataProduk, $produk, $no);
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Footer -->
    <?php include "footer.php" ?>
    <!-- Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>


</body>

</html>