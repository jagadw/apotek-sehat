<?php
    include '../koneksi.php';
    if(isset($_GET['iddetailtransaksi'])) {
        $iddetailtransaksi = $_GET['iddetailtransaksi'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi ORDER BY iddetailtransaksi DESC");
        $baris = mysqli_fetch_array($query);
        ?>
        <?php
    } else {
        echo "ID obat tidak ditemukan";
    }
    ?>

<?php
    if(isset($_GET['iddetailtransaksi'])) {
        $iddetailtransaksi = $_GET['iddetailtransaksi'];
        // $perusahaan = $_POST['perusahaan'];
        // $namaobat = $_POST['namaobat'];
        // $kategoriobat = $_POST['kategoriobat'];
        // $hargajual = $_POST['hargajual'];
        // $hargabeli = $_POST['hargabeli'];
        // $stok_obat = $_POST['stok_obat'];
        // $keterangan = $_POST['keterangan'];

        $delete = mysqli_query($koneksi, "DELETE FROM tb_detail_transaksi WHERE iddetailtransaksi='$iddetailtransaksi'");

        if($delete) {
            header('location: ../dashboard.php?page=detailtransaksi&pesan=berhasil_diubah');
        } else {
            header('location: ../dashboard.php?page=detailtransaksi&pesan=gagal_diubah');
        }
    }
?>