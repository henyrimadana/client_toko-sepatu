<?php
error_reporting(1);
include "client-detail-produk.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_detail" => $_POST['id_detail'],
        "ukuran" => $_POST['ukuran'],
        "bahan" => $_POST['bahan'],
        "warna" => $_POST['warna'],
        "merk" => $_POST['merk'],
        "aksi" => $_POST['aksi']
    );
    $clientDetail->tambah_detail_produk($data);
    header('location:detail-produk.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_detail" => $_POST['id_detail'],
        "ukuran" => $_POST['ukuran'],
        "bahan" => $_POST['bahan'],
        "warna" => $_POST['warna'],
        "merk" => $_POST['merk'],
        "aksi" => $_POST['aksi']
    );
    $clientDetail->ubah_detail_produk($data);
    header('location:detail-produk.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_detail" => $_GET['id_detail'],
        "aksi" => $_GET['aksi']
    );
    $clientDetail->hapus_detail_produk($data);
    header('location:detail-produk.php');
}
unset($clientDetail, $data);
