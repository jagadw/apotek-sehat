<?php
    include "koneksi.php";
	if(!@$_COOKIE['username']){
        echo "<script>alert('Login terlebih dahulu!');window.location.href='index.php'</script>";
    } 
    
    // echo $_COOKIE['leveluser'];
    // $_COOKIE;

    if($_COOKIE['leveluser']=='admin') {
        $page = $_GET['page'];
        $addbtn = "<div class='addbtn'><a href='dashboard.php?page=add$page'>Tambah</a></div>";
        // echo "test";
    }elseif($_COOKIE['leveluser']!='admin') {
        $page = $_GET['page'];
        $addbtn = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="baseui.css">
    <!-- <title>Dashboard</title> -->