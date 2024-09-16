<?php
        @include '../template/cookies.php';
    ?>
    <title>Tabel Transaksi</title>
    <h1 align="center">TABEL TRANSAKSI</h1>
    <?=
    $addbtn
    ?>
    <br>
	<div class="containtable">
    <table class="datatable" align="center">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Pelanggan</th>
                <th>ID Karyawan</th>
                <th>Tanggal Transaksi</th>
                <th>Kategori Pelanggan</th>
                <th>Total Bayar</th>
                <th>Bayar</th>
                <th>Kembali</th>
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
            $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi ORDER BY idtransaksi DESC");
            while($baris = mysqli_fetch_assoc($query)) {
            $idtransaksi = $baris['idtransaksi'];
            $hide_delete = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_detail_transaksi ON tb_transaksi.idtransaksi = tb_detail_transaksi.idtransaksi WHERE tb_transaksi.idtransaksi = $idtransaksi");
            $cek = mysqli_num_rows($hide_delete);
            ?>
            <tr>
                <td><?= $baris['idtransaksi']; ?></td>
                <td><?= $baris['idpelanggan']; ?></td>
                <td><?= $baris['idkaryawan']; ?></td>
                <td><?= $baris['tgltransaksi']; ?></td>
                <td><?= $baris['kategoripelanggan']; ?></td>
                <td><?= $baris['totalbayar']; ?></td>
                <td><?= $baris['bayar']; ?></td>
                <td><?= $baris['kembali']; ?></td>
                <?php
            // var_dump($cek);
            if($cek==0 && $_COOKIE['leveluser']=='admin'){
                ?>
                <td id="delete"><a href="./transaksi/delete.php?idtransaksi=<?=$idtransaksi?>">Del</a></td>
                <td id="edit"><a href="dashboard.php?page=edittransaksi&idtransaksi=<?=$idtransaksi?>">Edit</a></td>
                <?php
            } elseif ($cek>0 && $_COOKIE['leveluser']=='admin') {
                ?>
                <td colspan="2" id="edit"><a href="dashboard.php?page=edittransaksi&idtransaksi=<?=$idtransaksi?>">Edit</a></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
	</div>