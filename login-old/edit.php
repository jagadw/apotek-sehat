    <?php
        @include '../template/cookies.php';
    ?>->
    <title>Edit Karyawan</title>
    <?php
        if(isset($_GET['username'])) {
        $username = $_GET['username'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_login INNER JOIN tb_karyawan USING(idkaryawan) WHERE username='$username'");
        $baris = mysqli_fetch_assoc($query);  
    ?>
    <h1 align="center">EDIT USER</h1>
    <form action="dashboard.php?page=editlogin" method="post">
        <table class="formtable" align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?= $username;?>" readonly></td>
            </tr>
			<tr>
                <td>Nama Karyawan</td>
				<td><input type="text" value="<?=$baris['namakaryawan'];?>" readonly></td>
            </tr>            
            <tr>
                <td>Level User</td>
                <td><select name="leveluser" value="" id="">
					<?php
					$leveluserbaris = $baris['leveluser'];
					?>
					<option value="admin" <?php if($leveluserbaris=='admin'){echo "selected";}?>>admin</option>
                    <option value="karyawan" <?php if($leveluserbaris=='karyawan'){echo "selected";}?>>karyawan</option>
					<?php
					}
				?>
            </select></td>
            </tr
            <tr>
                <td colspan="2"><input type="submit" value="Simpan" name="edit" id="submit"></td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
        </table>
    </form>
    <?php
    

    if(isset($_POST['edit'])) {
        $username = $_POST['username'];
        $leveluser = $_POST['leveluser'];
        $edit = mysqli_query($koneksi, "UPDATE tb_login SET leveluser='$leveluser' WHERE username='$username'");

        if ($edit) {
            header('location: dashboard.php?page=login&pesan=edit_berhasil');
        } else {
            header('location: dashboard.php?page=login&pesan=edit_gagal');
        }    
    }
    ?>
<!-- </body>
</html> -->