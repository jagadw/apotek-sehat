<?php
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="log-reg-recformui.css">
</head>

<body>
    <div class="formbox">
        <div class="box-half login">
            <h1>LOGIN</h1>
            <form action="proses-cookies.php" method="post">
			<div class="formarea">
                <div class="input-box">
                    <label>Username</label><br>
					<!--<img src="img/user.png" alt="" width="20px" height="20px">-->
                    <input type="text" name="username">
                </div>
                <div class="input-box">
                    <label>Password</label><br>
					<!--<img class="esvigi" src="img/padlock.png" alt="" width="27px" height="24px">-->
                    <input type="password" name="password">
                </div>

                <input type="submit" class="submit" value="Login">
			</div>

        </div>


        <div class="desc">
            <img src="img/Apotek Sehat Terus-long.svg" alt="" width="200px">
        </div>
    </div>
</body>

</html>