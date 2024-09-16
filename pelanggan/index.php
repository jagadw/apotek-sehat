    <?php
        @include '../template/cookies.php';
    ?>
    <title>Tambah Pelanggan</title>
<h1 align="center">TAMBAH PELANGGAN</h1>
<form action="./pelanggan/proses.php" method="post" enctype="multipart/form-data">
    <table class="formtable" align="center">
        <!-- <tr>
            <td>ID Pelanggan</td>
            <td><input type="text" name="idpelanggan"></td>
        </tr> -->
        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" name="namapelanggan"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td><input type="text" name="telp"></td>
        </tr>
        <tr>
            <td>Usia</td>
            <td><input type="text" name="usia"></td>
        </tr>
        <tr>
            <td>Bukti Foto Resep</td>
            <td><input type="file" name="buktifotoresep"></td>
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