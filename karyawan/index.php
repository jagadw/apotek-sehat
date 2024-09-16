<?php
	@include '../template/cookies.php';
?>
    <title>Tambah Karyawan</title>
<h1 align="center">ADD KARYAWAN</h1>
<form action="./karyawan/proses.php" method="post">
    <table class="formtable" align="center">
        <!-- <tr>
            <td>ID Karyawan</td>
            <td><input type="text" name="idkaryawan"></td>
        </tr> -->
        <tr>
            <td>Nama Karyawan</td>
            <td><input type="text" name="namakaryawan"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td><input type="text" name="telp"></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="submit" value="Simpan" id="submit"></td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
    </table>
    </form>
<!-- </body>
</html> -->