<?php
        @include '../template/cookies.php';
    ?>
    <title>Tabel Obat</title>
    <h1 align="center">TABEL OBAT</h1>
    <?php
    // $page = $_GET['page'];
    // $addbtn = "<div class='addbtn'><a href='dashboard.php?page=add$page'>Tambah</a></div>";
    echo $addbtn;
    // var_dump($_SESSION['leveluser']);
    ?>
    <br>
    <table class="datatable" align="center">
        <thead>
            <tr>
                <th>ID Obat</th>
                <th>Perusahaan</th>
                <th>Nama Obat</th>
                <th>Kategori Obat</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok Obat</th>
                <th>Keterangan</th>
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
            $query = mysqli_query($koneksi, "SELECT *, tb_obat.keterangan AS keteranganobat FROM tb_obat INNER JOIN tb_supplier USING(idsupplier) ORDER BY idobat DESC");
            while($baris = mysqli_fetch_assoc($query)) {
            $idobat = $baris['idobat'];
            $hide_delete = mysqli_query($koneksi, "SELECT * FROM tb_obat INNER JOIN tb_detail_transaksi ON tb_obat.idobat = tb_detail_transaksi.idobat WHERE tb_obat.idobat = $idobat");
            $cek = mysqli_num_rows($hide_delete);
            ?>
            <tr>
				<td><?= $baris['idobat']; ?></td>
                <td><?= $baris['perusahaan']; ?></td>
                <td><?= $baris['namaobat']; ?></td>
                <td><?= $baris['kategoriobat']; ?></td>
                <td><?= $baris['hargajual']; ?></td>
                <td><?= $baris['hargabeli']; ?></td>
                <td><?= $baris['stok_obat']; ?></td>
                <td><?= $baris['keteranganobat']; ?></td>
                <?php
            // var_dump($cek);
            if($cek==0 && $_COOKIE['leveluser']=='admin'){
                ?>
                <td id="delete"><a href="./obat/delete.php?idobat=<?=$idobat?>">Del</a></td>
                <td id="edit"><a href="dashboard.php?page=editobat&idobat=<?=$idobat?>">Edit</a></td>
                <?php
            } elseif ($cek>0 && $_COOKIE['leveluser']=='admin') {
                ?>
                <td colspan="2" id="edit"><a href="dashboard.php?page=editobat&idobat=<?=$idobat;?>">Edit</a></td>
                <?php
            } else {
                ?>
                <?php
                }
                ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>