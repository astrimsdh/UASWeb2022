<?php
    include 'koneksi.php';
    $id = $_POST['id'];
    $sql = "SELECT * FROM masakan_astri WHERE id_masakan = $id";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);

    echo $data["harga"];

?>