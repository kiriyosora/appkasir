<?php

if (empty($_GET ['p'])){
    $title = "App Kasir";
    $konten = "konten/home.php";
}
else if($_GET['p']=='produk'){
    $title = "Data Produk";
    $konten = "konten/produk.php";
}
else if($_GET['p']=='pelanggan'){
    $title = "Data Pelanggan";
    $konten = "konten/pelanggan.php";
}
else if($_GET['p']=='user'){
    $title = "Data User";
    $konten = "konten/user.php";
}
else if($_GET['p']=='tambah'){
    $title = "Tambah Penjualan Baru";
    $konten = "konten/tambah.php";
}
else if($_GET['p']=='histori'){
    $title = "Histori Penjualan";
    $konten = "konten/histori.php";
}
else if($_GET['p']=='infojual'){
    $title = "Informasi Detail Penjualan";
    $konten = "konten/infojual.php";
}
else if($_GET['p']=='laporan'){
    $title = "Laporan Sistem";
    $konten = "konten/laporan.php";
}
else if($_GET['p']=='backup'){
    $title = "Backup Sistem";
    $konten = "konten/backup.php";
}
else if($_GET['p']=='restore'){
    $title = "Restore Sistem";
    $konten = "konten/restore.php";
}
else{
    $title = "Halaman tidak ditemukan";
    $konten = "konten/404.php";
}

?>