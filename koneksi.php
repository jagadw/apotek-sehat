<?php

// $host = 'your_host';
// $username = 'root';
// $database = 'apotek';

// $koneksi = mysqli_connect("$host","$username","$password","$database");

$koneksi = mysqli_connect("localhost:3306","jomok","#sukajomok","apotek");

if(!$koneksi) {
    die ("Koneksi Ke Database Gagal!". mysqli_connect_error($koneksi));
}

?>
