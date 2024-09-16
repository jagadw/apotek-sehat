<?php
if ($_SESSION['leveluser']=="admin") {
        $page = $_GET['page'];
        $addbtn = "<div class='addbtn'><a href='dashboard.php?page=add$page'>Tambah</a></div>";
}
?>