<?php
        @include '../template/cookies.php';
    ?>
    <title>Tabel Karyawan</title>
	<h1 align="center">TABEL KARYAWAN</h1>
    <?=
    $addbtn
    ?>
    <br>
    <table class="datatable" align="center">
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Alamat</th>
                <th>Telp</th>
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
            $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan ORDER BY idkaryawan DESC");
            while($baris = mysqli_fetch_assoc($query)) {
                $query_transaksi = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_transaksi WHERE idkaryawan = '".$baris['idkaryawan']."'");
                $query_login = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_login WHERE idkaryawan = '".$baris['idkaryawan']."'");

                $result_transaksi = mysqli_fetch_assoc($query_transaksi);
                $result_login = mysqli_fetch_assoc($query_login);

                if($result_transaksi['total'] > 0 && $_COOKIE['leveluser']=='admin') {
                    $delete_button = "";
                    $edit_button = "<td align='center' colspan='2' id='edit'><a href='dashboard.php?page=editkaryawan&idkaryawan=".$baris['idkaryawan']."'>Edit</a></td>";
                } elseif($result_login['total'] > 0 && $_COOKIE['leveluser']=='admin') {
                    $delete_button = "";
                    $edit_button = "<td align='center' colspan='2' id='edit'><a href='dashboard.php?page=editkaryawan&idkaryawan=".$baris['idkaryawan']."'>Edit</a></td>";
                } elseif ($result_transaksi['total'] == 0 && $result_login['total'] == 0 && $_COOKIE['leveluser']=='admin') {
                    $delete_button = "<td id='delete'><a href='./karyawan/delete.php?idkaryawan=".$baris['idkaryawan']."'>Del</a></td>";
                    $edit_button = "<td id='edit'><a href='dashboard.php?page=editkaryawan&idkaryawan=".$baris['idkaryawan']."'>Edit</a></td>";
                }
            ?>
            <tr>
				<td><?= @$baris['idkaryawan']; ?></td>
                <td><?= @$baris['namakaryawan']; ?></td>
                <td><?= @$baris['alamat']; ?></td>
                <td><?= @$baris['telp']; ?></td>
                <?= @$delete_button; ?>
                <?= @$edit_button; ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>