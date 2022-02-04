<?php
include 'koneksi.php';

$nama_masakan = $_POST['nama_masakan'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($koneksi, "INSERT INTO masakan_astri VALUES('', '$nama_masakan', '$harga', '$stok', 'abcd.jpg', 'biasa', 'Tidak ada')");

header("location:masakan.php");