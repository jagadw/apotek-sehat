<?php
        @include '../template/cookies.php';
    ?>
    <title>Edit Pelanggan</title>
    <?php
    if(isset($_GET['idpelanggan'])) {
        $idpelanggan = $_GET['idpelanggan'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE idpelanggan=$idpelanggan");
        $baris = mysqli_fetch_assoc($query);
        ?>
        <h1 align="center">EDIT PELANGGAN</h1>
        <form action="dashboard.php?page=editpelanggan" method="post" enctype="multipart/form-data">
        <table class="formtable" align="center">
            <tr>
                <td><input type="hidden" name="idpelanggan" value="<?= $baris['idpelanggan']?>"></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td><input type="text" name="namapelanggan" value="<?= $baris['namapelanggan']?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?= $baris['alamat']?>"></td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td><input type="text" name="telp" value="<?= $baris['telp']?>"></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><input type="text" name="usia" value="<?= $baris['usia']?>"></td>
            </tr>
            <tr>
                <td>Bukti Foto Resep</td>
                <td><img src="./pelanggan/images/<?= $baris['buktifotoresep']?>" height="70px"></td>
            </tr>
            <tr>
			<td></td>
                <td ><input type="file" name="buktifotoresep" value="<?= $baris['buktifotoresep']?>"></td>
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

    if(isset($_POST['edit'])) {
        $idpelanggan = $_POST['idpelanggan'];
        $namapelanggan = $_POST['namapelanggan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $usia = $_POST['usia'];
        $buktifotoresep = $_FILES['buktifotoresep']['name'];
        $file_tmp = $_FILES['buktifotoresep']['tmp_name'];
        move_uploaded_file($file_tmp, "./pelanggan/images/".$buktifotoresep);

        // cara cek error : ketikan echo pada bagian kode yang dirasa mencurigakan
        // echo "UPDATE tb_pelanggan SET idpelanggan='$idpelanggan', namapelanggan='$namapelanggan', alamat='$alamat', telp='$telp', usia='$usia', buktifotoresep='$buktifotoresep' WHERE idpelanggan='$idpelanggan'";

        $edit = mysqli_query($koneksi, "UPDATE tb_pelanggan SET idpelanggan='$idpelanggan', namapelanggan='$namapelanggan', alamat='$alamat', telp='$telp', usia='$usia', buktifotoresep='$buktifotoresep' WHERE idpelanggan='$idpelanggan'");

        if ($edit) {
            header('location: dashboard.php?page=pelanggan&pesan=edit_berhasil');
        } else {
            header('location: dashboard.php?page=pelanggan&pesan=edit_gagal');
            }
    
}
    ?>
</body>
</html>