<?php
error_reporting(1);
include "client-transaksi.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_transaksi" => $_POST['id_transaksi'],
        "id_produk" => $_POST['id_produk'],
        "id_pelanggan" => $_POST['id_pelanggan'],
        "tanggal" => $_POST['tanggal'],
        "jumlah" => $_POST['jumlah'],
        "aksi" => $_POST['aksi']
    );
    $clientTransaksi->tambah_transaksi($data);
    echo '<script>alert("Transaksi Berhasil"); window.location.href = "../user-transaksi.php";</script>';
    exit();
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_transaksi" => $_POST['id_transaksi'],
        "id_produk" => $_POST['id_produk'],
        "id_pelanggan" => $_POST['id_pelanggan'],
        "tanggal" => $_POST['tanggal'],
        "jumlah" => $_POST['jumlah'],
        "aksi" => $_POST['aksi']
    );
    $clientTransaksi->ubah_transaksi($data);
    header('location:transaksi.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_transaksi" => $_GET['id_transaksi'],
        "aksi" => $_GET['aksi']
    );
    $clientTransaksi->hapus_transaksi($data);
    header('location:transaksi.php');
}
unset($clientTransaksi, $data);
