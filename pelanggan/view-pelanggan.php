<?php
        @include '../template/cookies.php';
    ?>
    <title>Tabel Pelanggan</title>
    <?php
    // echo "Selamat Datang! Kak ".$_COOKIE['leveluser']." ".$_COOKIE['username'];
    ?>
    <!-- <p><a id="logout" href="../logout-cookies.php">Logout</a></p> -->

    <h1 align="center">TABEL PELANGGAN</h1>
    <?=
	$addbtn
	?>
    <br>
	<div class="containtable">
    <table class="datatable" align="center">
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
			$query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan ORDER BY idpelanggan DESC");
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
                <img src="./pelanggan/images/<?= $baris['buktifotoresep']; ?>" alt="<?= $baris['buktifotoresep']; ?>" width="300px">
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
	</div>