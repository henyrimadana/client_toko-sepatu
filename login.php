<?php
include "./admin/client-pelanggan.php";
$dataPelanggan = $clientPelanggan->tampil_semua_pelanggan();

// Login Pengguna
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $dataUser = $clientPelanggan->tampil_username($username);

    if ($dataUser->username == $username) {
        // Periksa apakah password benar
        if ($password === $dataUser->password) {
            session_start();
            $_SESSION['id_pelanggan'] = $dataUser->id_pelanggan;
            $_SESSION['nama'] = $dataUser->nama;
            $_SESSION['alamat'] = $dataUser->alamat;
            $_SESSION['no_hp'] = $dataUser->no_hp;
            $_SESSION['email'] = $dataUser->email;
            $_SESSION['username'] = $dataUser->username;
            $_SESSION['role'] = $dataUser->role;

            // Arahkan ke dashboard yang sesuai berdasarkan peran
            if ($dataUser->role == "user") {
                header("Location: utama.php");
            } elseif ($dataUser->role == "admin") {
                header("Location: admin/index.php");
            } else {
                // Peran tidak valid
                echo '<script>alert("Login gagal. Hubungi admin."); window.location.href = "login.php";</script>';
                exit();
            }
            exit();
        } else {
            echo '<script>alert("Login gagal. Password salah."); window.location.href = "login.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Login gagal. Pengguna tidak ditemukan."); window.location.href = "login.php";</script>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Toko Sepatu</title>
    <!-- Font-Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./index.php">HISHOES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li>
                        <a class="nav-link active fw-bold" href="./login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section-->
    <section class="bg-dark py-5">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6 col-md-9 col-sm-11">
                    <div class="card border-0 shadow p-5 rounded-3">
                        <div class="row">
                            <a href="./index.php" class="text-decoration-none text-dark"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <div class="card-body text-center p-4 p-sm-5">

                            <h3 class="card-title mb-5">Sign in</h3>

                            <form action="login.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan Username Anda">
                                    <label for="floatingInput">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password Anda">
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <button class="btn btn-primary btn-lg my-3 w-100" type="submit" name="login">Login</button>

                                <hr class="my-4">

                                <div>
                                    <p>Tidak Memiliki Akun? <a href="register.php" class="text-decoration-none">Daftar
                                            Sekarang</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-3 bg-light">
        <div class="container">
            <p class="m-0 text-center text-dark"><strong>Copyright &copy; 2023 <a href="https://instagram.com/henyrmdn_" target="_blank">Heny Rimadana</a> & <a href="https://instagram.com/imamtl.k" target="_blank">Imamatul Khoiriyah</a>.</strong>
                All rights reserved.</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>