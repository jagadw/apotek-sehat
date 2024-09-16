<?php
        @include '../template/cookies.php';
    ?> -->
    <title>Edit Supplier</title>
    <?php
        if(isset($_GET['idsupplier'])) {
        $idsupplier = $_GET['idsupplier'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE idsupplier=$idsupplier");
        $baris = mysqli_fetch_assoc($query);    
    ?>
    <h1 align="center">EDIT SUPPLIER</h1>
    <form action="dashboard.php?page=editsupplier" method="post">
        <table class="formtable" align="center">
            <tr>
                <!-- <td>ID Supplier</td> -->
                <td><input type="hidden" name="idsupplier" value="<?= $baris['idsupplier'];?>"></td>
            </tr>
            <tr>
                <td>Perusahaan</td>
                <td><input type="text" name="perusahaan" value="<?= $baris['perusahaan'];?>"></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telp" value="<?= $baris['telp'];?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?= $baris['alamat'];?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="<?= $baris['keterangan'];?>"></td>
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
        $idsupplier = $_POST['idsupplier'];
        $perusahaan = $_POST['perusahaan'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $keterangan = $_POST['keterangan'];
    
        $edit = mysqli_query($koneksi, "UPDATE tb_supplier SET idsupplier='$idsupplier', perusahaan='$perusahaan', telp='$telp', alamat='$alamat', keterangan='$keterangan' WHERE idsupplier='$idsupplier'");
    
        if ($edit) {
            header('location: dashboard.php?page=supplier&pesan=edit_berhasil');
        } else {
            header('location: dashboard.php?page=supplier&pesan=edit_gagal');
        }    
    }
    ?>
<!-- </body>
</html> -->