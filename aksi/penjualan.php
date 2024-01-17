<?php
session_start();
include "../koneksi.php";
include "../function.php";

if ($_POST) {
    if($_POST['aksi']=='tambah-keranjang-bybarcode'){
        $id_user=$_SESSION['id'];
        $Barcode=$_POST['barcode'];
        $jumlah=$_POST['jumlah'];

        // Temukan Produk Berdasarkan Barcode
        $sql1="SELECT * FROM produk WHERE barcode='$Barcode'";
        $query1=mysqli_query($koneksi,$sql1);
        $Produk=mysqli_fetch_array($query1);
        if(mysqli_num_rows($query1)>=1){
            // echo "Produk ditemukan di Database";
            $ProdukID=$Produk['ProdukID'];
            // cek keranjang bila produk sudah ada hanya mengupdate jumlah, bila belum ada insert data
            $sql3="SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
            $query3=mysqli_query($koneksi,$sql3);
            $duplikat=mysqli_num_rows($query3);

            if($duplikat==0){
                $sql2="INSERT INTO keranjang(KeranjangID,ProdukID,jumlah,id_user) VALUES(DEFAULT,$ProdukID,$jumlah,$id_user)";
            } else {
                $sql2="UPDATE keranjang SET jumlah=jumlah+$jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
            }
            mysqli_query($koneksi,$sql2);
            header('location:../index.php?p=tambah');
        } else {
            // echo "Produk Tidak ditemukan di Database";
            header('location:../index.php?p=tambah&err=produk_tidak_ditemukan');
        }
    }
    else if($_POST['aksi']=='tambah-keranjang-bynama'){
        $ProdukID=$_POST['ProdukID'];
        $jumlah=$_POST['jumlah'];
        $id_user=$_SESSION['id'];

        $sql3="SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
        $query3=mysqli_query($koneksi,$sql3);
        $duplikat=mysqli_num_rows($query3);
// echo $sql3;
        if($duplikat==0){
            $sql2="INSERT INTO keranjang(KeranjangID,ProdukID,jumlah,id_user) VALUES(DEFAULT,$ProdukID,$jumlah,$id_user)";
        } else {
            $sql2="UPDATE keranjang SET jumlah=jumlah+$jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
        }
        mysqli_query($koneksi,$sql2);
        header('location:../index.php?p=tambah');
    }
    else if($_POST['aksi']=='simpan-penjualan'){
        $id_user=$_SESSION['id'];
        $PelangganID=$_POST['PelangganID'];
        $TanggalPenjualan=$_POST['TanggalPenjualan'];
        $TotalHarga=$_POST['TotalHarga'];

        $sql1="INSERT INTO penjualan(PenjualanID,TanggalPenjualan,TotalHarga,PelangganID) VALUES(DEFAULT,'$TanggalPenjualan',$TotalHarga,$PelangganID)";
        // echo $sql1;
        if(mysqli_query($koneksi,$sql1)){
            echo "Simpan penjualan sukses";
        }
    }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus-keranjang') {
        $produkID = $_GET['ProdukID'];
        $id_user=$_SESSION['id'];
        $sql = "DELETE FROM keranjang WHERE produkID=$produkID"; // Hard delete
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=tambah');
    }
}
