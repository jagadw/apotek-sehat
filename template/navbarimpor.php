<link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.min.css" />
    <!-- Responsive CSS Navbar -->
    <nav class="topnav" id="myTopnav">
        <a href="dashboard.php" id="homebtn" class="active"><img class="logoapotek" src="Apotek Sehat Terus-long.svg"></a>
		<div class="corenav">
		<div>
		<a class="navlink" href="dashboard.php?page=obat"><i class="fa-solid fa-pills"></i> Obat</a>
        <a class="navlink" href="dashboard.php?page=karyawan"><i class="fa-solid fa-people-group"></i>Karyawan</a>
        <a class="navlink" href="dashboard.php?page=pelanggan"><i class="fa-solid fa-person"></i>Pelanggan</a>
        <a class="navlink" href="dashboard.php?page=supplier"><i class="fa-solid fa-building"></i>Supplier</a>
        <a class="navlink" href="dashboard.php?page=detailtransaksi"><i class="fa-solid fa-scroll"></i>Detail Transaksi</a>
        <a class="navlink" href="dashboard.php?page=transaksi"><i class="fa-solid fa-right-left"></i>Transaksi</a>
        <?php
        if ($_COOKIE['leveluser']=="admin") {
        ?>
            <a class="navlink" href="dashboard.php?page=login"><i class="fa-solid fa-user"></i>Login</a></td>
            <a class="navlink" href="register/index.php"><i class="fa-solid fa-clipboard-list"></i>Register</a></td>
            <a class="navlink" href="recovery/index.php"><i class="fa-solid fa-rotate-right"></i>Recovery</a></td>    
        <?php
            }
        ?>
		</div>
		<div><a class="navlink" onclick="showdropdown()"><?=$_COOKIE['username']?></a>
			<div class="dropdowncontent">
				<a class="navlink" href="profile.php">Profile</a>
				<br>
				<a id="logoutbtn" class="navlink" href="logout-cookies.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
			</div>
		</div>
		</div>
    <a href="#" class="icon" onclick="show()">
        <i class="fa fa-bars"></i>
    </a>
    </nav>

    <!-- Content Here -->

    <script>
    function myFunction() {
    var x = document.querySelector(".corenav");
    if (x.className === "corenav") {
        x.className += " responsive";
    } else {
        x.className = "corenav";
    }
    }
    </script>