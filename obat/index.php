<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <?php
        @include '../template/cookies.php';
    ?>
    <title>Tambah Obat</title>
   
    <br>
    <h1 align="center">TAMBAH OBAT</h1>
    <form action="./obat/proses.php" method="post">
    <table class="formtable" border="0" align="center">
        <!-- <tr>
            <td>Id Obat</td>
            <td><input name="idobat" type="text"></td>
        </tr> -->
        <tr>
            <td>Id Supplier</td>
            <td><select name="idsupplier" value="" id="">
            <?php
        // include "../koneksi.php";
        $query = "SELECT * FROM tb_supplier";
        $data = mysqli_query($koneksi, $query);
        while($baris = mysqli_fetch_assoc($data)){
        ?>
        <option value="<?=$baris['idsupplier'];?>"><?=$baris['perusahaan'];?></option>
        <?php
        }
    ?>
            </select>
        </td>
        </tr>
        <tr>
            <td>Nama Obat</td>
            <td><input name="namaobat" type="text"></td>
        </tr>
        <tr>
            <td>Kategori Obat</td>
            <td><input name="kategoriobat" type="text"></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td><input name="hargajual" type="text"></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td><input name="hargabeli" type="text"></td>
        </tr>
        <tr>
            <td>Stok Obat</td>
            <td><input name="stok_obat" type="text"></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><input name="keterangan" type="text"></td>
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