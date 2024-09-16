<?php
    include '../koneksi.php';
    if(isset($_GET['username'])) {
        $username = $_GET['username'];
        // show form edit dengan data yang sudah diambil dari db
        $query = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username='$username'");
        $baris = mysqli_fetch_array($query);
        ?>
        <?php
    } else {
        // echo "Username tidak ditemukan";
		echo "<script>alert('Username tidak ditemukan');window.location.href='dashboard.php?page=login'</script>";
    }
    ?>

<?php
    if(isset($_GET['username'])) {
        $username = $_GET['username'];
        // $perusahaan = $_POST['perusahaan'];
        // $namalogin = $_POST['namalogin'];
        // $kategorilogin = $_POST['kategorilogin'];
        // $hargajual = $_POST['hargajual'];
        // $hargabeli = $_POST['hargabeli'];
        // $stok_login = $_POST['stok_login'];
        // $keterangan = $_POST['keterangan'];

        // Cara ambil sintaks mysql lewat var_dump($delete);
        // mysqli_query($koneksi dihilangin
        // $delete = "DELETE FROM tb_login WHERE username='$username'";

        $delete = mysqli_query($koneksi, "DELETE FROM tb_login WHERE username='$username'");

        if($delete) {
            header('location: ../dashboard.php?page=login&pesan=berhasil_diubah');
        } else {
            header('location: ../dashboard.php?page=login&pesan=gagal_diubah');
        }
        // var_dump($delete);
    }
?>