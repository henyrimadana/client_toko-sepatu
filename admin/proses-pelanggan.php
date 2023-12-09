<?php
error_reporting(1);
include "client-pelanggan.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_pelanggan" => $_POST['id_pelanggan'],
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "no_hp" => $_POST['no_hp'],
        "email" => $_POST['email'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "aksi" => $_POST['aksi']
    );
    $clientPelanggan->tambah_pelanggan($data);
    header('location:pelanggan.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_pelanggan" => $_POST['id_pelanggan'],
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "no_hp" => $_POST['no_hp'],
        "email" => $_POST['email'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "aksi" => $_POST['aksi']
    );
    $clientPelanggan->ubah_pelanggan($data);
    header('location:pelanggan.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_pelanggan" => $_GET['id_pelanggan'],
        "aksi" => $_GET['aksi']
    );
    $clientPelanggan->hapus_pelanggan($data);
    header('location:pelanggan.php');
}
unset($clientPelanggan, $data);
?>