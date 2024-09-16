<?php
    include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../log-reg-recformui.css">
	

</head>

<body>
    <div class="formbox">
        <div class="box-half register">
            <!-- <table align="center"> -->
            <h1 align="center">REGISTER</h1>
            <form action="encrypt.php" method="post">
			<div class="formarea">
                <label class="karyawan">Nama Karyawan</label>
                <select name="idkaryawan" value="" id="">
                    <?php
						include "koneksi.php";
						$query = "SELECT * FROM tb_karyawan WHERE idkaryawan NOT IN (SELECT idkaryawan FROM tb_login);";
						$data = mysqli_query($koneksi, $query);
						$cek = mysqli_num_rows($data);
						if ($cek > 0) {
						while($baris = mysqli_fetch_assoc($data)){
						?>
									<option value="<?=$baris['idkaryawan'];?>"><?=$baris['namakaryawan'];?></option>
									<?php
						}
						} else {
						?>
									<option value="">Semua karyawan telah register</option>
									<?php
					}
					?>
                </select>
                    <label>Username</label>
                    <input type="text" name="username">

                    <label>Password</label>
                    <input type="password" name="password">

                    <label>Level User</label>
                    <select name="leveluser" id="">
                        <option value="admin">admin</option>
                        <option value="karyawan">karyawan</option>
                    </select>
                    <input type="submit" class="submit">

                <!-- <button type="button" class="button">Register</button> -->
					<div style="margin: 10px 0;">
					<!--<a class="btmlink" href="../login.php">Login</a>-->
					<a class="btmlink" href="../recovery/index.php">Recovery</a>
					</div>
				</div>
                <div class="skew">
                </div>
            </form>
            <!-- </table> -->
        </div>
				<div class="desc">
					<img src="../img/Apotek Sehat Terus-long.svg" alt="" width="250px">
					<!-- <h3>Apotek Sehat Terus</h3> -->
				</div>
    </div>

</body>

</html>