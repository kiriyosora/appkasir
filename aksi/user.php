<?php
session_start();
include "../koneksi.php";
include "../function.php";

if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $nama_user = $_POST['nama_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hak_akses = $_POST['hak_akses'];

        $sql = "INSERT INTO user (id_user,nama_user,username,password,hak_akses,dibuat_pada,diubah_pada,dihapus_pada) VALUES(DEFAULT,'$nama_user','$username','$password','$hak_akses',DEFAULT,DEFAULT,DEFAULT)";
        // echo $sql; //cek perintah
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);

        header('location:../index.php?p=user');
    } else if ($_POST['aksi'] == 'ubah') {
        $id_user = $_POST['id_user'];
        $nama_user = $_POST['nama_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hak_akses = $_POST['hak_akses'];

        $sql = "UPDATE user SET nama_user='$nama_user', username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user=$id_user";
        // echo $sql; //cek perintah
        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);

        header('location:../index.php?p=user');
    }
    else if($_POST['aksi']=='login'){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
        $query=mysqli_query($koneksi,$sql);
        $ketemu=mysqli_num_rows($query);
        if($ketemu>=1){
            $user=mysqli_fetch_array($query);
            $_SESSION['user']=$user['username'];
            $_SESSION['nama']=$user['nama_user'];
            $_SESSION['id']=$user['id_user'];
            $_SESSION['akses']=$user['hak_akses'];
            $_SESSION['menu']="MANAJEMEN";
            $_SESSION['status_proses']='';

            header("location:../index.php");
        } else {
            header("location:../login.php?msg=err");
        }
    }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus') {
        $id_user = $_GET['id_user'];
        // $sql="DELETE FROM user WHERE id_user=$id_user";//hard delete
        $sql = "UPDATE user SET dihapus_pada=now() WHERE id_user=$id_user"; //soft delete

        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    } else if ($_GET['aksi'] == 'restore') {
        $id_user = $_GET['id_user'];
        $sql = "UPDATE user SET dihapus_pada= NULL WHERE id_user=$id_user";
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    } else if ($_GET['aksi'] == 'hapus-permanen') {
        $id_user = $_GET['id_user'];
        $sql = "DELETE FROM user WHERE id_user=$id_user"; //hard delete

        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=user');
    }
}
