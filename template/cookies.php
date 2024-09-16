<?php
    if(!@$_COOKIE['username']){
    echo "<script>alert('Login terlebih dahulu!');window.location.href='../index.php'</script>";
    }
    ?>