<?php
session_start();
include "../koneksi.php";
include "../function.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $namapelanggan=$_POST['namapelanggan'];
        $alamat=$_POST['alamat'];
        $nomortelepon=$_POST['nomortelepon'];


        $sql="INSERT INTO pelanggan (PelangganID,namapelanggan,alamat,nomortelepon) VALUES(DEFAULT,'$namapelanggan','$alamat','$nomortelepon')";

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=pelanggan');
    }
    else if($_POST['aksi']=='ubah'){
        $pelangganID=$_POST['pelangganID'];
        $namapelanggan=$_POST['namapelanggan'];
        $alamat=$_POST['alamat'];
        $nomortelepon=$_POST['nomortelepon'];


        $sql="UPDATE pelanggan SET namapelanggan='$namapelanggan', alamat='$alamat', nomortelepon='$nomortelepon' WHERE pelangganID=$pelangganID";

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=pelanggan');
    }

}

if($_GET){

     if ($_GET['aksi']=='hapus'){
        $pelangganID=$_GET['pelangganID'];
        $sql="DELETE FROM pelanggan WHERE pelangganID=$pelangganID"; // Hard Delete
        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=pelanggan');
    }

}

?>
