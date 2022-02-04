<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM masakan_astri WHERE id_masakan ='$id'");
header("location:masakan.php");
?>