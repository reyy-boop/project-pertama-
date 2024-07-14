<?php

    //koneksi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uas-hospitals";

    //buat koneksi
    $conn = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error($conn));
?>