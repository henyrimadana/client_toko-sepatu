<?php
$activePage = isset($activePage) ? $activePage : '';
?>


<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container-md">
        <a class="navbar-brand" href="./utama.php">HISHOES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($activePage == 'home') ? 'active fw-semibold' : ''; ?>" aria-current="page" href="./utama.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo ($activePage == 'toko') ? 'active fw-semibold' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Toko Sepatu
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
                    <a class="nav-link dropdown-toggle <?php echo ($activePage == 'cuci') ? 'active fw-semibold' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cuci Sepatu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./form-cuci.php">Tambah Cuci Sepatu</a></li>
                        <li>
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