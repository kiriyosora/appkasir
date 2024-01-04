<?php 
// Memulai Session
session_start();

// Menghapus Session
session_destroy();

header("location:../login.php");
