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
                <div class="col-xl-8 col-lg-9 col-md-12 col-sm-14">
                    <div class="card border-0 shadow p-5 rounded-3">
                        <div class="row">
                            <a href="./index.php" class="text-decoration-none text-dark"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <div class="card-body p-4 p-sm-5">

                            <h3 class="card-title text-center mb-5">Sign Up</h3>

                            <form action="./admin/proses-pelanggan.php" method="post">
                                <input type="hidden" name="aksi" value="tambah" />
                                <input type="hidden" name="role" value="user" />
                                <div class="row mb-3">
                                    <label for="formGroupExampleInput2" class="col-sm-4 col-form-label">ID Pelanggan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="id_pelanggan" class="form-control" id="formGroupExampleInput2" placeholder="Otomatis" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formGroupExampleInput2" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama" class="form-control" id="formGroupExampleInput2">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formGroupExampleInput2" class="col-sm-4 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="alamat" class="form-control" id="formGroupExampleInput2">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formGroupExampleInput2" class="col-sm-4 col-form-label">No HP</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_hp" class="form-control" id="formGroupExampleInput2">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formGroupExampleInput2" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" id="formGroupExampleInput2">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formGroupExampleInput2" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="username" class="form-control" id="formGroupExampleInput2">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formGroupExampleInput2" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control" id="formGroupExampleInput2">
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-lg my-3 w-100" type="submit" name="simpan">Daftar</button>
                            </form>


                            <hr class="my-4">

                            <div>
                                <p>Sudah Memiliki Akun? <a href="login.php" class="text-decoration-none">Login
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