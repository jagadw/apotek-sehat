<?php
        @include '../template/cookies.php';
    ?>
    <title>Tabel Supplier</title>
    <h1 align="center">TABEL SUPPLIER</h1>
    <?=
    $addbtn
    ?>
    <br>
    <table class="datatable" align="center">
        <thead>
            <tr>
                <th>ID Supplier</th>
                <th>Perusahaan</th>
                <th>Telp</th>
                <th>Alamat</th>
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
            $query = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
            while($baris = mysqli_fetch_assoc($query)) {
                // Memeriksa apakah idsupplier ditemukan pada tb_obat
                $query_obat = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_obat WHERE idsupplier = '".$baris['idsupplier']."'");
                $result_obat = mysqli_fetch_assoc($query_obat);
                if($result_obat['total'] > 0 && $_COOKIE['leveluser']=='admin') {
                    $delete_button = "";
                    $edit_button = "<td align='center' colspan='2' id='edit'><a href='dashboard.php?page=editsupplier&idsupplier=".$baris['idsupplier']."'>Edit</a></td>";
                } elseif ($result_obat['total'] == 0 && $_COOKIE['leveluser']=='admin') {
                    $delete_button = "<td id='delete'><a href='./supplier/delete.php?idsupplier=".$baris['idsupplier']."'>Del</a></td>";
                    $edit_button = "<td id='edit'><a href='dashboard.php?page=editsupplier&idsupplier=".$baris['idsupplier']."'>Edit</a></td>";
                }
            ?>
            <tr>
				<td><?= @$baris['idsupplier']; ?></td>
                <td><?= @$baris['perusahaan']; ?></td>
                <td><?= @$baris['telp']; ?></td>
                <td><?= @$baris['alamat']; ?></td>
                <td><?= @$baris['keterangan']; ?></td>
                <?= @$delete_button; ?>
                <?= @$edit_button; ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>