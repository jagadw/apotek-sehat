    <?php
        @include '../template/cookies.php';
    ?>->
    <title>Edit Karyawan</title>
    <?php
        if(isset($_GET['idkaryawan'])) {
        $idkaryawan = $_GET['idkaryawan'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE idkaryawan=$idkaryawan");
        $baris = mysqli_fetch_assoc($query);    
    ?>
    <h1 align="center">EDIT KARYAWAN</h1>
    <form action="dashboard.php?page=editkaryawan" method="post">
        <table class="formtable" align="center">
            <tr>
                <!-- <td>ID karyawan</td> -->
                <td><input type="hidden" name="idkaryawan" value="<?= $baris['idkaryawan'];?>"></td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td><input type="text" name="namakaryawan" value="<?= $baris['namakaryawan'];?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?= $baris['alamat'];?>"></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telp" value="<?= $baris['telp'];?>"></td>
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
        $idkaryawan = $_POST['idkaryawan'];
        $namakaryawan = $_POST['namakaryawan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];

        $edit = mysqli_query($koneksi, "UPDATE tb_karyawan SET idkaryawan='$idkaryawan', namakaryawan='$namakaryawan', alamat='$alamat',telp='$telp' WHERE idkaryawan='$idkaryawan'");

        if ($edit) {
            header('location: dashboard.php?page=karyawan&pesan=edit_berhasil');
        } else {
            header('location: dashboard.php?page=karyawan&pesan=edit_gagal');
        }    
    }
    ?>
<!-- </body>
</html> -->