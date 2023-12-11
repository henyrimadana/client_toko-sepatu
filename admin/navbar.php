<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li <?php echo ($activePage == 'home') ? 'class="nav-item active"' : ''; ?>>
            <a href="./index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="wa.me/6285156663729" class="nav-link">Contact</a>
        </li>
        <li class="nav-item">
            <a href="../logout.php?logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->