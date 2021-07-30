<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_psb";

    $koneksi = mysqli_connect($host, $user, $pass, $db);
    if (mysqli_connect_errno()){
        echo "Koneksi gagal:".mysqli_connect_error();
    }
?>