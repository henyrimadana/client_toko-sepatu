<?php
include "client-pelanggan.php";
include "client-transaksi.php";

$dataTransaksi = $clientTransaksi->tampil_semua_transaksi();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pelanggan</title>

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
        $activePage = 'pelanggan';
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
                            <h1>Data Pelanggan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Data Pelanggan</li>
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
                                    <h3 class="card-title">Daftar Data Pelanggan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead class="table-secondary text-center">
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="col-1">ID Pelanggan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th class="col-2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border text-center align-middle text-wrap">
                                            <?php $no = 1;
                                            $data_array = $clientPelanggan->tampil_semua_pelanggan();
                                            foreach ($data_array as $r) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->id_pelanggan ?>
                                                    </td>

                                                    <td>
                                                        <?= $r->nama ?>
                                                    </td>

                                                    <td class="text-wrap">
                                                        <?= $r->alamat ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->no_hp ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->email ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->username ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->password ?>
                                                    </td>
                                                    <td>
                                                        <?= $r->role ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <!-- <a class="btn btn-outline-primary btn-sm" type="button" a href="ubah-pelanggan.php?id_pelanggan=<?= $r->id_pelanggan ?>"><i class="fas fa-edit"></i></a> -->
                                                        <a class="btn btn-outline-danger btn-sm" type="button" a href="proses-pelanggan.php?aksi=hapus&id_pelanggan=<?= $r->id_pelanggan ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')"><i class="fas fa-trash-alt"></i></a>
                                                    </td>

                                                </tr>
                                            <?php $no++;
                                            }
                                            unset($data_array, $r, $no);
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
            <strong>Copyright &copy; 2023 <a href="https://instagram.com/henyrmdn_" target="_blank">Heny Rimadana</a> &
                <a href="https://instagram.com/imamtl.k" target="_blank">Imamatul Khoiriyah</a>.</strong>
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