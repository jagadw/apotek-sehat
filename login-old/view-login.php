<?php
        @include '../template/cookies.php';
    ?>
    <title>Tabel Login</title>
	<h1 align="center">TABEL LOGIN</h1>
    <br>
	<div class="containtable">
    <table class="datatable" align="center">
        <thead>
            <tr>
                <th>Username</th>
                <th>Level User</th>
                <th>Nama Karyawan</th>
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
            $query = mysqli_query($koneksi, "SELECT * FROM tb_login INNER JOIN tb_karyawan USING(idkaryawan)");
            while($baris = mysqli_fetch_assoc($query)) {
                if ( $_COOKIE['leveluser']=='admin') {
                    $delete_button = "<td id='delete'><a href='./login/delete.php?username=".$baris['username']."'>Del</a></td>";
                    $edit_button = "<td id='edit'><a href='dashboard.php?page=editlogin&username=".$baris['username']."'>Edit</a></td>";
                }
            ?>
            <tr>
                <td><?= @$baris['username']; ?></td>
                <td><?= @$baris['leveluser']; ?></td>
                <td><?= @$baris['namakaryawan']; ?></td>
                <?= @$delete_button; ?>
                <?= @$edit_button; ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
	</div>