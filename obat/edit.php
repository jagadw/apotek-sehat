<?php
@include '../template/cookies.php';
?>
    <title>Edit Obat</title>
    <?php
    if(isset($_GET['idobat'])) {
        $idobat = $_GET['idobat'];
        $query = mysqli_query($koneksi, "SELECT *, tb_obat.keterangan AS keteranganobat FROM tb_obat INNER JOIN tb_supplier USING(idsupplier) WHERE idobat=$idobat");
        $baris = mysqli_fetch_assoc($query);
        ?>
        <h1 align="center">EDIT OBAT</h1>
        <form action="dashboard.php?page=editobat" method="post">
        <table class="formtable" align="center">
            <tr>
                <td><input type="hidden" name="idobat" value="<?= $baris['idobat']?>"></td>
            </tr>
            <tr>
            <td>Id Supplier</td>
            <td><select name="idsupplier" value="" id="">
            <?php
        // include "../koneksi.php";
        $idsupplierbaris = $baris['idsupplier'];
        $querysupplierbaris = mysqli_query($koneksi, "SELECT idsupplier,perusahaan FROM tb_supplier WHERE idsupplier=$idsupplierbaris");
        $barissupplier = mysqli_fetch_assoc($querysupplierbaris);
        $query2 = "SELECT * FROM tb_supplier";
        $data = mysqli_query($koneksi, $query2);
        while($barissup = mysqli_fetch_assoc($data)){
        ?>
        <option value="<?=$barissup['idsupplier'];?>" <?php if($barissupplier['idsupplier']==$barissup['idsupplier']){echo "selected";}?>><?=$barissup['perusahaan'];?></option>
        <?php
        }
    ?>
            </select>
        </td>
        </tr>
            <tr>
                <td>Nama Obat</td>
                <td><input type="text" name="namaobat" value="<?= $baris['namaobat']?>"></td>
            </tr>
            <tr>
                <td>Kategori Obat</td>
                <td><input type="text" name="kategoriobat" value="<?= $baris['kategoriobat']?>"></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td><input type="text" name="hargajual" value="<?= $baris['hargajual']?>"></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td><input type="text" name="hargabeli" value="<?= $baris['hargabeli']?>"></td>
            </tr>
            <tr>
                <td>Stok Obat</td>
                <td><input type="text" name="stok_obat" value="<?= $baris['stok_obat']?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="<?= $baris['keteranganobat']?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Simpan" name="edit" id="submit"></td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
        </table>
        </form>
        <?php
    }

    if(isset($_POST['edit'])) {
        $idobat = $_POST['idobat'];
        $idsupplier = $_POST['idsupplier'];
        $namaobat = $_POST['namaobat'];
        $kategoriobat = $_POST['kategoriobat'];
        $hargajual = $_POST['hargajual'];
        $hargabeli = $_POST['hargabeli'];
        $stok_obat = $_POST['stok_obat'];
        $keterangan = $_POST['keterangan'];

        $edit = mysqli_query($koneksi, "UPDATE tb_obat SET idsupplier='$idsupplier', namaobat='$namaobat', kategoriobat='$kategoriobat', hargajual='$hargajual', hargabeli='$hargabeli', stok_obat='$stok_obat', keterangan='$keterangan' WHERE idobat='$idobat'");

        if ($edit) {
            header('location: dashboard.php?page=obat&pesan=edit_berhasil');
            } else {
            header('location: dashboard.php?page=obat&pesan=edit_gagal');
            }        
    }
    ?>
<!-- </body>
</html> -->