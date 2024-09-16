<?php
        @include '../template/cookies.php';
    ?>
    <title>Edit Detail Transaksi</title>
    <?php
            if(isset($_GET['iddetailtransaksi'])) {
            $iddetailtransaksi = $_GET['iddetailtransaksi'];
            $query = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi JOIN tb_transaksi ON tb_detail_transaksi.idtransaksi = tb_transaksi.idtransaksi JOIN tb_obat ON tb_detail_transaksi.idobat = tb_obat.idobat WHERE iddetailtransaksi = '$iddetailtransaksi'");
            $baris = mysqli_fetch_assoc($query);
        ?>
            <h1 align="center">EDIT DETAIL TRANSAKSI</h1>
            <form action="dashboard.php?page=editdetailtransaksi" method="post">
            <table class="formtable" align="center">
            <tr>
                <!--<td>ID Detail Transaksi</td>-->
                <td><input type="hidden" name="iddetailtransaksi" value="<?= $baris['iddetailtransaksi']?>"></td>
            </tr>
            <td>ID Transaksi</td>
            <td><select name="idtransaksi" value="" id="">
            <?php
                // include "../koneksi.php";
                $idtransaksibaris = $baris['idtransaksi'];
                $querytransaksibaris = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE idtransaksi=$idtransaksibaris");
                $baristransaksi = mysqli_fetch_assoc($querytransaksibaris);
                $query2 = "SELECT * FROM tb_transaksi";
                $data = mysqli_query($koneksi, $query2);
                while($baristran = mysqli_fetch_assoc($data)){
                ?>
                <option value="<?=$baristran['idtransaksi'];?>" <?php if($baristransaksi['idtransaksi']==$baristran['idtransaksi']){echo "selected";}?>><?=$baristran['idtransaksi'];?></option>
                <?php
                }
            ?>
            </select>
            </td>
            </tr>
                <tr>
                <td>ID Obat</td>
                <td><select name="idobat" value="" id="">
                <?php
                    // include "../koneksi.php";
                    $idobatbaris = $baris['idobat'];
                    $queryobatbaris = mysqli_query($koneksi, "SELECT * FROM tb_obat WHERE idobat=$idobatbaris");
                    $barisobat = mysqli_fetch_assoc($queryobatbaris);
                    $query3 = "SELECT * FROM tb_obat";
                    $data2 = mysqli_query($koneksi, $query3);
                    while($barisobat = mysqli_fetch_assoc($data2)){
                    ?>
                    <option value="<?=$barisobat['idobat'];?>" <?php if($barisobat['idobat']==$barisobat['idobat']){echo "selected";}?>><?=$barisobat['idobat'];?></option>
                    <?php
                    }
                ?>
            </select>
        </td>
        </tr>

        <tr>
                <td>Jumlah</td>
                <td><input type="text" name="jumlah" value="<?= $baris['jumlah']?>"></td>
            </tr>
            <tr>
                <td>Harga Satuan</td>
                <td><input type="text" name="hargasatuan" value="<?= $baris['hargasatuan']?>"></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="text" name="totalharga" value="<?= $baris['totalharga']?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Simpan" name="edit" id="submit"></td>
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
            $iddetailtransaksi = $_POST['iddetailtransaksi'];
            $idtransaksi = $_POST['idtransaksi'];
            $idobat = $_POST['idobat'];
            $jumlah = $_POST['jumlah'];
            $hargasatuan = $_POST['hargasatuan'];
            $totalharga = $_POST['totalharga'];

            $edit = mysqli_query($koneksi, "UPDATE tb_detail_transaksi SET idtransaksi='$idtransaksi', idobat='$idobat', jumlah='$jumlah', hargasatuan='$hargasatuan', totalharga='$totalharga' WHERE iddetailtransaksi='$iddetailtransaksi'");

            echo $edit;            
            if ($edit) {
                header('location: dashboard.php?page=detailtransaksi&pesan=edit_berhasil');
                } else {
                header('location: dashboard.php?page=detailtransaksi&pesan=edit_gagal');
                }
        }
        ?>

<!-- </body>
</html> -->