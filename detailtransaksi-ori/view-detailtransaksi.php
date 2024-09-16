    <title>Tabel Detail Transaksi</title>
    <h1 align="center">TABEL DETAIL TRANSAKSI</h1>
	<div class="addbtn">
        <a href="dashboard.php?page=adddetailtransaksi">Tambah</a>
    </div>
	<br>
    <table class="datatable" align="center">
        <thead>
            <tr>
                <th>ID Detail Transaksi</th>
                <th>ID Transaksi</th>
                <th>ID Obat</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // include '../koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi ORDER BY iddetailtransaksi DESC");
            while($baris = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $baris['iddetailtransaksi']?></td>
                <td><?= $baris['idtransaksi']?></td>
                <td><?= $baris['idobat']?></td>
                <td><?= $baris['jumlah']?></td>
                <td><?= $baris['hargasatuan']?></td>
                <td><?= $baris['totalharga']?></td>
                <td id="edit"><a href="dashboard.php?page=editdetailtransaksi&iddetailtransaksi=<?= $baris['iddetailtransaksi']?>">Edit</a></td>
                <td id="delete"><a href="./detailtransaksi/delete.php?iddetailtransaksi=<?= $baris['iddetailtransaksi']?>">Del</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<!-- </body>
</html> -->