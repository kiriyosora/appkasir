<?php

$server   ='localhost';
$user     ='root';
$password ='';
$db       ='kasir';

$koneksi=mysqli_connect($server,$user,$password,$db); // Koneksi secara prosedural
$mysqli= new mysqli($server,$user,$password,$db);
$mysqli->select_db($db);
$mysqli->query("SET NAMES 'utf8'");
$database=$db;

if($koneksi){
    // echo "Koneksi sukses";
} else {
    echo "Koneksi gagal";
    echo "<br>".mysqli_connect_error();
}