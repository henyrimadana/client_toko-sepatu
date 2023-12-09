<?php
error_reporting(1);
include "client-produk.php";

if ($_POST['aksi'] == 'tambah') {
    // Validasi apakah semua data telah diisi
    if (empty($_POST['nama_produk']) || empty($_POST['harga']) || empty($_POST['stok']) || empty($_POST['id_detail']) || empty($_POST['id_kategori'])) {
        echo '<script>alert("Semua data harus diisi!"); window.location.href = "form-produk.php";</script>';
        exit();
    } else {
        if ($_FILES['image']['size'] > 0) {
            //Batas maksimal ukuran gambar
            $max_file_size = 5000000; //5 MB

            if ($_FILES['image']['size'] > $max_file_size) {
                echo '<script>alert("Ukuran gambar lebih dari 5Mb"); window.location.href = "items.php";</script>';
                exit();
            }

            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Buat direktori "uploads" jika belum ada
            if (!file_exists($targetDir)) {
                mkdir($targetDir);
            }

            // pindah file upload ke folder
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                //simpan data
                $data = array(
                    "id_produk" => $_POST['id_produk'],
                    "image" => $targetFile,
                    "nama_produk" => $_POST['nama_produk'],
                    "harga" => $_POST['harga'],
                    "stok" => $_POST['stok'],
                    "id_detail" => $_POST['id_detail'],
                    "id_kategori" => $_POST['id_kategori'],
                    "aksi" => $_POST['aksi']
                );
                $clientProduk->tambah_produk($data);
                header('location:produk.php');
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
            }
        } else {
            // ketika tidak ada file di upload
            echo "Silakan pilih file gambar.";
        }
    }
} elseif ($_POST['aksi'] == 'ubah') {
    $dataProduk = $clientProduk->tampil_produk($_POST['id_produk']);

    // ketika gambar tidak diubah
    $data = array(
        "id_produk" => $_POST['id_produk'],
        "nama_produk" => $_POST['nama_produk'],
        "harga" => $_POST['harga'],
        "stok" => $_POST['stok'],
        "id_detail" => $_POST['id_detail'],
        "id_kategori" => $_POST['id_kategori'],
        "aksi" => $_POST['aksi']
    );

    if ($_FILES['image']['size'] > 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // pindah file upload ke folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            //simpan data
            $data['image'] = $targetFile;

            // Hapus gambar lama jika berhasil mengunggah gambar baru
            if (!empty($dataProduk->image) && file_exists($dataProduk->image)) {
                unlink($dataProduk->image);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
            exit();
        }
    } else {
        // Jika gambar tidak diunggah, gunakan gambar saat ini
        $data['image'] = $dataProduk->image;
    }

    $clientProduk->ubah_produk($data);
    header('location:produk.php');
} elseif ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_produk" => $_GET['id_produk'],
        "aksi" => $_GET['aksi']
    );
    $clientProduk->hapus_produk($data);
    header('location:produk.php');
}
unset($clientProduk, $data);
