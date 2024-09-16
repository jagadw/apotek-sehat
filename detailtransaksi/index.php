<?php
        @include '../template/cookies.php';
    ?>
    <title>Detail Transaksi</title>
<h1 align="center">DETAIL TRANSAKSI</h1>
<form action="./detailtransaksi/proses.php" method="post">
    <table class="formtable" align="center">
        <tr>
            <!-- <td>ID Detail Transaksi</td> -->
            <td><input type="hidden" name="iddetailtransaksi"></td>
        </tr>
        <tr>
            <td>ID Transaksi</td>
            <td><select name="idtransaksi" id="">
                <?php
                include '../koneksi.php';
                $query = "SELECT * FROM tb_transaksi";
                $data = mysqli_query($koneksi, $query);
                while($baris = mysqli_fetch_assoc($data)) {
                ?>
                <option value="<?= $baris['idtransaksi']?>"><?= $baris['idtransaksi']?></option>
                <?php
                }
                ?>
            </select></td>
        </tr>
        <tr>
            <td>ID Obat</td>
            <td><select name="idobat" id="">
                <?php
                include '../koneksi.php';
                $query = "SELECT * FROM tb_obat";
                $data = mysqli_query($koneksi, $query);
                while($baris = mysqli_fetch_assoc($data)) {
                ?>
                <option value="<?= $baris['idobat']?>"><?= $baris['idobat']?></option>
                <?php
                }
                ?>
            </select>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah"></td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td><input type="text" name="hargasatuan"></td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td><input type="text" name="totalharga"></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Simpan" id="submit"></td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
    </table>
    </form>
<!-- </body>
</html> -->