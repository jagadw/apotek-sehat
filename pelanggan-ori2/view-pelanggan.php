<?php
    // include '../koneksi.php';
    // if(!@$_COOKIE['username']){
    //     echo "<script>alert('Login terlebih dahulu!');window.location.href='view-pelanggan.php'</script>";
    // } else if(@$_COOKIE['leveluser']=='karyawan'){
    //     echo "<script>alert('Login terlebih dahulu!');window.location.href='index.php'</script>";
    // }

    $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan ORDER BY idpelanggan DESC");
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Tabel Pelanggan</title>
    <style>
        /* * {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        } */
        td {
            margin: 8px;
        }
        table {
            border-collapse: collapse;
            box-shadow: 0 3px 20px rgba(0,0,0,0.3);
            /* padding: 20px;
            padding-bottom: 30px;
            font-weight: bolder; */
            border-radius: 8px;
        }
        h1 {
            color: #ff9800;
        }
        #edit {
            background-color: #ffc107;
        }
        #delete {
            background-color: #dc3545;
        }
        .addpelanggan {
            text-align: center;
            display: flex;
            justify-content: center;
        }
        .addpelanggan a {
            background-color: #00adef;
            border-radius: 8px;
            color: #fff;
            padding: 8px;
            font-weight: bold;
        }
    </style>
<!-- </head>
<body> -->
    <?php
    // echo "Selamat Datang! Kak ".$_COOKIE['leveluser']." ".$_COOKIE['username'];
    ?>
    <!-- <p><a id="logout" href="../logout-cookies.php">Logout</a></p> -->

    <h1 align="center">TABEL PELANGGAN</h1>
    <?=
    $addbtn
    ?>
    <br>
    <table border="3" cellpadding="3" width="80%" align="center">
        <thead>
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Usia</th>
                <th>Bukti Foto Resep</th>
                <?php
                if ($_COOKIE['leveluser']=='admin') {
                    echo "<th colspan='2'>Aksi</th>";
                } else {
                    echo "";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            while($baris = mysqli_fetch_assoc($query)) {
            $idpelanggan = $baris['idpelanggan'];
            $query2 = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_pelanggan USING (idpelanggan) WHERE idpelanggan = $idpelanggan");
            $cek = mysqli_num_rows($query2);
            ?>
            <tr>
                <td><?= $baris['idpelanggan']; ?></td>
                <td><?= $baris['namapelanggan']; ?></td>
                <td><?= $baris['alamat']; ?></td>
                <td><?= $baris['telp']; ?></td>
                <td><?= $baris['usia']; ?></td>
                <td><a href="./pelanggan/images/<?= $baris['buktifotoresep']; ?>">
                <img src="./pelanggan/images/<?= $baris['buktifotoresep']; ?>" alt="<?= $baris['buktifotoresep']; ?>" width="300px" height="300px">
            </a></td>
            <?php
            if ($cek==0 && $_COOKIE['leveluser']=='admin') {
                ?>
                <td id="edit"><a href="dashboard.php?page=editpelanggan&idpelanggan=<?= $baris['idpelanggan']; ?>">Edit</a></td>
                <td id="delete"><a href="./pelanggan/delete.php?idpelanggan=<?= $baris['idpelanggan']; ?>">Del</a></td>
                <?php
            } elseif ($cek>0 && $_COOKIE['leveluser']=='admin') {
                ?>
                <td colspan="2" id="edit"><a href="dashboard.php?page=editpelanggan&idpelanggan=<?= $baris['idpelanggan']; ?>">Edit</a></td>
                <?php
                }
            ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<!-- </body>
</html> -->