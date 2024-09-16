<?php
    include '../koneksi.php';

    // $iddetailtransaksi = $_POST['iddetailtransaksi'];
    $idtransaksi = $_POST['idtransaksi'];
    $idobat = $_POST['idobat'];
    $jumlah = $_POST['jumlah'];
    $hargasatuan = $_POST['hargasatuan'];
    $totalharga = $_POST['totalharga'];

    $query = "INSERT INTO tb_detail_transaksi VALUES (NULL,'$idtransaksi','$idobat','$jumlah','$hargasatuan','$totalharga')";
    $push = mysqli_query($koneksi, $query);

    if ($push) {
        header('location: ../dashboard.php?page=detailtransaksi&pesan=berhasil_ditambahkan');
    } else {
        header('location: ../dashboard.php?page=detailtransaksi&pesan=gagal_ditambahkan');
    }
?>