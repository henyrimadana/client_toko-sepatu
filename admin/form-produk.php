<?php
include "client-kategori.php";
include "client-detail-produk.php";
include "client-transaksi.php";

$dataTransaksi = $clientTransaksi->tampil_semua_transaksi();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Sepatu - Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
              <h1>Tambah Produk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
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
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name="form" class="container" method="POST" action="proses-produk.php" enctype="multipart/form-data">
                  <input type="hidden" name="aksi" value="tambah" />
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label">ID Produk</label>
                      <input type="text" class="form-control" name="id_produk" id="formGroupExampleInput" placeholder="Otomatis" disabled>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2" class="form-label">Nama Produk</label>
                      <input type="text" class="form-control" name="nama_produk" id="formGroupExampleInput2" placeholder="Silahkan isi Nama Produk">
                    </div>
                    <div class="form-group">
                      <label for="image" class="form-label">Image:</label>
                      <input type="file" class="form-control" name="image" accept="image/*" placeholder="Silahkan Upload Gambar" required>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2" class="form-label">Harga</label>
                      <input type="text" class="form-control" name="harga" id="formGroupExampleInput2" placeholder="Silahkan isi Harga">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2" class="form-label">Stok</label>
                      <input type="text" class="form-control" name="stok" id="formGroupExampleInput2" placeholder="Silahkan isi Stok">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2" class="form-label">Detail Produk</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="id_detail">
                        <option selected disabled>Pilih Detail</option>
                        <?php
                        $dataDetail = $clientDetail->tampil_semua_detail_produk();
                        foreach ($dataDetail as $r) {
                        ?>
                          <option value="<?= $r->id_detail ?>"><?= $r->id_detail ?>. <?= $r->bahan ?> (<?= $r->ukuran ?>) - <?= $r->merk ?> <?= $r->warna ?></option>
                        <?php
                        }
                        unset($dataDetail, $r);
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="formGroupExampleInput2" class="form-label">Kategori</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="id_kategori">
                        <option selected disabled>Pilih Kategori</option>
                        <?php
                        $data_array = $clientKategori->tampil_semua_kategori();
                        foreach ($data_array as $r) {
                        ?>
                          <option value="<?= $r->id_kategori ?>"><?= $r->nama_kategori ?></option>
                        <?php
                        }
                        unset($data_array, $r);
                        ?>
                      </select>
                    </div>
                    <!-- <input type="text" class="form-control" name="id_kategori" id="formGroupExampleInput2" placeholder="Silahkan isi ID Kategori"> -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="simpan">Save</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
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
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>


  <!-- Page specific script -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>