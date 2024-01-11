<?php
session_start();
include "../koneksi.php";
include "../function.php";

if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $produkID = $_POST['produkID'];
        $barcode = $_POST['barcode'];
        $namaproduk = $_POST['namaproduk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = "INSERT INTO produk (produkID,barcode,namaproduk,harga,stok) VALUES(DEFAULT,'$barcode','$namaproduk','$harga','$stok')";
        // echo $sql; //cek perintah
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);

        header('location:../index.php?p=produk');
    } else if ($_POST['aksi'] == 'ubah') {
        $produkID = $_POST['produkID'];
        $barcode = $_POST['barcode'];
        $namaproduk = $_POST['namaproduk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = "UPDATE produk SET barcode='$barcode', namaproduk='$namaproduk', harga='$harga', stok='$stok' WHERE produkID=$produkID";
        // echo $sql; //cek perintah
        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);

        header('location:../index.php?p=produk');
    }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus') {
        $produkID = $_GET['produkID'];
        $sql = "DELETE FROM produk WHERE produkID=$produkID";

        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');
    }
}
