<?php
    $server     = 'localhost';
    $user       = 'root';
    $password   = '';
    $database   = 'db_selling';

    $connection = mysqli_connect($server, $user, $password, $database);

    if (mysqli_connect_errno()){
        echo "Koneksi Database Gagal : " .mysqli_connect_error();
    }
?>