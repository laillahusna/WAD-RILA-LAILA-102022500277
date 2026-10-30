<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode       = $_POST['kode'];
    $tipe       = $_POST['tipe'];
    $panjang    = $_POST['panjang'];
    $lebar      = $_POST['lebar'];
    $harga      = $_POST['harga'];
    $status     = $_POST['status'];
    $keterangan = $_POST['catatan'];

    $fasilitas = isset($_POST['fasilitas']) ? implode(", ", $_POST['fasilitas']) : "";

    $sql  = "INSERT INTO kamar (kode_kamar, tipe, panjang, lebar, harga_sewa, status, fasilitas, keterangan)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param($stmt, "ssiiisss",
        $kode, $tipe, $panjang, $lebar, $harga, $status, $fasilitas, $keterangan);

    mysqli_stmt_execute($stmt);
    header("Location: index.php");
    exit;
}