    <title>Tambah Transaksi</title>
    <h1 align="center">TAMBAH TRANSAKSI</h1>
    <form action="proses.php" method="post">
    <table class="formtable" align="center">
        <tr>
            <td>ID Transaksi</td>
            <td><input name="idtransaksi" type="text"></td>
        </tr>
        <tr>
            <td>ID Pelanggan</td>
            <td><select name="idpelanggan" value="" id="">
            <?php
        include "../koneksi.php";
        $query = "SELECT * FROM tb_pelanggan";
        $data = mysqli_query($koneksi, $query);
        while($baris = mysqli_fetch_assoc($data)){
        ?>
        <option value="<?=$baris['idpelanggan'];?>"><?=$baris['namapelanggan'];?></option>
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
        include "../koneksi.php";
        $query = "SELECT * FROM tb_karyawan";
        $data = mysqli_query($koneksi, $query);
        while($baris = mysqli_fetch_assoc($data)){
        ?>
        <option value="<?=$baris['idkaryawan'];?>"><?=$baris['namakaryawan'];?></option>
        <?php
        }
    ?>
            </select>
        </td>
        </tr>
        <tr>
            <td>Tanggal Transaksi</td>
            <td><input name="tgltransaksi" type="date"></td>
        </tr>
        <tr>
            <td>Kategori Pelanggan</td>
            <td><input name="kategoripelanggan" type="text"></td>
        </tr>
        <tr>
            <td>Total Bayar</td>
            <td><input name="totalbayar" type="text"></td>
        </tr>
        <tr>
            <td>Bayar</td>
            <td><input name="bayar" type="text"></td>
        </tr>
        <tr>
            <td>Kembali</td>
            <td><input name="kembali" type="text"></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Simpan" id="submit"></td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>

    </table>
    </form>

</body>
</html>