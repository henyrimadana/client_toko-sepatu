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
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="./index.php" class="brand-link">
        <img src="./dist/img/hishoes.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HISHOES</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="./dist/img/hishoes-160x160.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <p class="text-white">ADMIN</p>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="./index.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!-- Produk -->
            <li class="nav-header">Produk</li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fas fa-shoe-prints"></i>
                <p>
                  Produk
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./produk.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Data produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./form-produk.php" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>Tambah produk</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-digital-tachograph"></i>
                <p>
                  Detail Produk
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./detail-produk.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Data Detail Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./form-detail-produk.php" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>Tambah Detail Produk</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-poll-h"></i>
                <p>
                  Kategori
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./kategori.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Data Kategori Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./form-kategori.php" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>Tambah Kategori Produk</p>
                  </a>
                </li>
              </ul>
            </li>


            <!-- PELANGGAN -->
            <li class="nav-header">Pelangan</li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-id-badge"></i>
                <p>
                  Pelanggan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./pelanggan.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Data Pelanggan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./form-pelanggan.php" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>Tambah Pelanggan</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- TRANSAKSI -->
            <li class="nav-header">Transaksi</li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                <i class="fas fa-cart-arrow-down"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-success right"><?php echo count($dataTransaksi) ?></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./transaksi.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Data Transaksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./form-transaksi.php" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>Tambah Transaksi</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
          </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

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
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a href="https://instagram.com/henyrmdn_" target="_blank">Heny Rimadana</a> & <a href="https://instagram.com/imamtl.k" target="_blank">Imamatul Khoiriyah</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Sistem Terdistribusi & Keamanan</b> 2023
      </div>
    </footer>

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