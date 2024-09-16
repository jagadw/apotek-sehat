<?php
        @include '../template/cookies.php';
    ?>
    <title>Tambah Supplier</title>
    <h1 align="center">TAMBAH SUPPLIER</h1>
    <form action="./supplier/proses.php" method="post">
    <table class="formtable" align="center">
        <!-- <tr>
            <td>ID Supplier</td>
            <td><input name="idsupplier" type="text"></td>
        </tr> -->
        <tr>
            <td>Perusahaan</td>
            <td><input name="perusahaan" type="text"></td>
        </tr>
        <tr>
            <td>Telp</td>
            <td><input name="telp" type="text"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input name="alamat" type="text"></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><input name="keterangan" type="text"></td>
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