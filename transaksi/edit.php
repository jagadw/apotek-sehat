<?php
        @include '../template/cookies.php';
    ?>
    <title>Edit Transaksi</title>
    <?php
            if(isset($_GET['idtransaksi'])) {
            $idtransaksi = $_GET['idtransaksi'];
            $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan JOIN tb_karyawan ON tb_transaksi.idkaryawan = tb_karyawan.idkaryawan WHERE idtransaksi = '$idtransaksi'");
            $baris = mysqli_fetch_assoc($query);
            // var_dump($baris);
        ?>
            <h1 align="center">EDIT TRANSAKSI</h1>
            <form action="dashboard.php?page=edittransaksi" method="post" enctype="multipart/form-data">
            <table class="formtable" align="center">
            <tr>
                <!-- <td>ID Transaksi</td> -->
                <td><input type="hidden" name="idtransaksi" value="<?= $idtransaksi ?>"></td>
            </tr>
            <td>ID Pelanggan</td>
            <td><select name="idpelanggan" value="" id="">
            <?php
        // include "../koneksi.php";
        $idpelangganbaris = $baris['idpelanggan'];
        $querypelangganbaris = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE idpelanggan=$idpelangganbaris");
        $barispelanggan = mysqli_fetch_assoc($querypelangganbaris);
        $query2 = "SELECT * FROM tb_pelanggan";
        $data = mysqli_query($koneksi, $query2);
        while($barispel = mysqli_fetch_assoc($data)){
        ?>
        <option value="<?=$barispel['idpelanggan'];?>" <?php if($barispelanggan['idpelanggan']==$barispel['idpelanggan']){echo "selected";}?>><?=$barispel['idpelanggan'];?></option>
        <?php
        }
    ?>
            </select>
        </td>
        </tr>
            <tr>
            <td>ID Karyawan</td>
            <td><select name="idkaryawan" value="" id="">
            <?php
        // include "../koneksi.php";
        $idkaryawanbaris = $baris['idkaryawan'];
        $querykaryawanbaris = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE idkaryawan=$idkaryawanbaris");
        $bariskaryawan = mysqli_fetch_assoc($querykaryawanbaris);
        $query3 = "SELECT * FROM tb_karyawan";
        $data2 = mysqli_query($koneksi, $query3);
        while($bariskar = mysqli_fetch_assoc($data2)){
        ?>
        <option value="<?=$bariskar['idkaryawan'];?>" <?php if($bariskaryawan['idkaryawan']==$bariskar['idkaryawan']){echo "selected";}?>><?=$bariskar['idkaryawan'];?></option>
        <?php
        }
    ?>
            </select>
        </td>
        </tr>

        <tr>
                <td>Tgl Transaksi</td>
                <td><input type="date" name="tgltransaksi" value="<?= $baris['tgltransaksi']?>"></td>
            </tr>
            <tr>
                <td>Kategori Pelanggan</td>
                <td><input type="text" name="kategoripelanggan" value="<?= $baris['kategoripelanggan']?>"></td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td><input type="text" name="totalbayar" value="<?= $baris['totalbayar']?>"></td>
            </tr>
            <tr>
                <td>Bayar</td>
                <td><input type="text" name="bayar" value="<?= $baris['bayar']?>"></td>
            </tr>
            <tr>
                <td>Kembali</td>
                <td><input type="text" name="kembali" value="<?= $baris['kembali']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="edit" id="submit"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
            </table>
        </form>
        <?php
    }
    ?>

    <?php
    if(isset($_POST['edit'])) {
            $idtransaksi = $_POST['idtransaksi'];
            $idpelanggan = $_POST['idpelanggan'];
            $idkaryawan = $_POST['idkaryawan'];
            $tgltransaksi = $_POST['tgltransaksi'];
            $kategoripelanggan = $_POST['kategoripelanggan'];
            $totalbayar = $_POST['totalbayar'];
            $bayar = $_POST['bayar'];
            $kembali = $_POST['kembali'];

            $edit = mysqli_query($koneksi, "UPDATE tb_transaksi SET idtransaksi='$idtransaksi', idtransaksi='$idtransaksi', idpelanggan='$idpelanggan', idkaryawan='$idkaryawan', tgltransaksi='$tgltransaksi', kategoripelanggan='$kategoripelanggan', totalbayar='$totalbayar', bayar='$bayar', kembali='$kembali' WHERE idtransaksi='$idtransaksi'");

            echo $edit;            
            if ($edit) {
                header('location: dashboard.php?page=transaksi&pesan=edit_berhasil');
                } else {
                header('location: dashboard.php?page=transaksi&pesan=edit_gagal');
                }
        }
        ?>

<!-- </body>
</html> -->