<?php
$activePage = isset($activePage) ? $activePage : '';
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./index.php" class="brand-link">
        <img src="./dist/img/hishoes.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HISHOES-JASA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./dist/img/hishoes-160x160.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p class="text-white">ADMIN-CUCI</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="./index.php" class="nav-link <?php echo ($activePage == 'home') ? 'active' : ''; ?>">
                        <div class="row align-items-start">
                            <div class="col-2 p-0">
                                <i class="nav-icon fas fa-tachometer-alt col-3"></i>
                            </div>
                            <div class="col-8">
                                <p>Dashboard</p>
                            </div>
                        </div>
                    </a>
                </li>

                <!-- Produk -->
                <li class="nav-header">Paket</li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($activePage == 'paket-cuci') ? 'active' : ''; ?>">
                        <div class="row align-items-start">
                            <div class="col-2">
                                <i class="fas fa-soap"></i>
                            </div>
                            <div class="col-8">
                                <p>Paket</p>
                            </div>
                            <div class="col-0 text-start">
                                <i class="fas fa-angle-left right col-4"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./paket.php" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Data Paket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./form-paket.php" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Tambah Paket</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Kategori -->
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($activePage == 'kategori-cuci') ? 'active' : ''; ?>">
                        <div class="row align-items-start">
                            <div class="col-2">
                                <i class="fas fa-poll-h"></i>
                            </div>
                            <div class="col-8">
                                <p>Kategori</p>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./kategori.php" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Data Kategori Paket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./form-kategori.php" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Tambah Kategori Paket</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Transaksi -->
                <li class="nav-header">Transaksi</li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($activePage == 'transaksi-cuci') ? 'active' : ''; ?>">
                        <div class="row align-items-start">
                            <div class="col-2">
                                <i class="fas fa-cart-arrow-down"></i>
                            </div>
                            <div class="col-7">
                                <p>Transaksi</p>
                            </div>
                            <div class="col-1">
                                <span class="badge badge-success right">
                                    <?php echo count($dataTransaksi) ?>
                                </span>
                            </div>
                            <div class="col-1">
                                <i class="fas fa-angle-left right"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./transaksi.php" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Data Transaksi</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Cuci Sepatu -->
                <div class="border-bottom my-3"></div>
                <li class="nav-header">Toko Sepatu</li>
                <li class="nav-item">
                    <a href="../admin/index.php" class="nav-link <?php echo ($activePage == 'toko') ? 'active' : ''; ?>">
                        <div class="row align-items-start">
                            <div class="col-2">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                            <div class="col-8">
                                <p>Toko Sepatu</p>
                            </div>
                        </div>
                    </a>

                </li>
            </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>