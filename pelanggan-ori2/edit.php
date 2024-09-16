<?php
// include '../koneksi.php';
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Edit Pelanggan</title>
    <style>
        /* * {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        } */
        table {
            box-shadow: 0 3px 20px rgba(0,0,0,0.3);
            padding: 20px;
            padding-bottom: 30px;
            font-weight: bolder;
            border-radius: 8px;
        }
        td input, select {
            margin-bottom: 8px;
            margin-left: 10px;
            border-radius: 5px;
            padding-bottom: 8px;
        }
        h1 {
            color: #ff9800;
        }
        #submit {
            margin-top: 10px;
            background-color: #00adef;
            border-radius: 8px;
            color: #fff;
            border-color: #019eed;
            padding: 10px;
            font-weight: bold;
        }
        hr {
            margin-top: 20px;
        }
    </style>
<!-- </head>
<body> -->
    <?php
    if(isset($_GET['idpelanggan'])) {
        $idpelanggan = $_GET['idpelanggan'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE idpelanggan=$idpelanggan");
        $baris = mysqli_fetch_assoc($query);
        ?>
        <h1 align="center">EDIT PELANGGAN</h1>
        <form action="dashboard.php?page=editpelanggan" method="post" enctype="multipart/form-data">
        <table align="center">
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
                <td><img src="./pelanggan/images/<?= $baris['buktifotoresep']?>" width="100px" height="100px"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="file" name="buktifotoresep" value="<?= $baris['buktifotoresep']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="edit" id="submit"></td>
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