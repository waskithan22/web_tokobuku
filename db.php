<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_buku';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal Terhubung Ke Database')
?>