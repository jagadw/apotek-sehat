    <title>Tabel Pelanggan</title>
    <h1 align="center">TABEL PELANGGAN</h1>
    <div class="addbtn">
        <a href="dashboard.php?page=addpelanggan">Tambah</a>
    </div>
    <br>
    <table class="datatable" align="center">
        <thead>
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Usia</th>
                <th>Bukti Foto Resep</th>
                <th colspan="2">Aksi</th>
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
                <img src="./pelanggan/images/<?= $baris['buktifotoresep']; ?>" alt="<?= $baris['buktifotoresep']; ?>" width="300px" height="300px">
            </a></td>
            <?php
            if ($cek==0) {
                ?>
                <td id="edit"><a href="dashboard.php?page=editpelanggan&idpelanggan=<?= $baris['idpelanggan']; ?>">Edit</a></td>
                <td id="delete"><a href="./pelanggan/delete.php?idpelanggan=<?= $baris['idpelanggan']; ?>">Del</a></td>
                <?php
            } else {
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