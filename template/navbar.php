<link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.min.css" />
    <!-- Responsive CSS Navbar -->
    <nav class="topnav" id="myTopnav">
		<div style="width: 100%;display:flex;justify-content: space-between;">
        <a href="dashboard.php?page=main" id="homebtn" class="active"><img class="logoapotek" src="Apotek Sehat Terus-long.svg"></a>
		<a href="javascript:void(0);" class="icon" onclick="show()">
			<i class="fa fa-bars"></i>
		</a>
		</div>
		<div class="corenav">
		<div style="background: white;">
        <a class="navlink" href="dashboard.php?page=obat"><i class="fa-solid fa-pills"></i> Obat</a>
        <a class="navlink" href="dashboard.php?page=karyawan"><i class="fa-solid fa-people-group"></i>Karyawan</a>
        <a class="navlink" href="dashboard.php?page=pelanggan"><i class="fa-solid fa-person"></i>Pelanggan</a>
        <a class="navlink" href="dashboard.php?page=supplier"><i class="fa-solid fa-building"></i>Supplier</a>
        <a class="navlink" href="dashboard.php?page=detailtransaksi"><i class="fa-solid fa-scroll"></i>Detail Transaksi</a>
        <a class="navlink" href="dashboard.php?page=transaksi"><i class="fa-solid fa-right-left"></i>Transaksi</a>
        <?php
        if ($_COOKIE['leveluser']=="admin") {
        ?>
            <a class="navlink" href="dashboard.php?page=login"><i class="fa-solid fa-user"></i>Akun</a></td>
            <a class="navlink" href="register/index.php"><i class="fa-solid fa-clipboard-list"></i>Register</a></td>
            <a class="navlink" href="recovery/index.php"><i class="fa-solid fa-rotate-right"></i>Recovery</a></td>    
        <?php
            }
        ?>
		</div>
		
		<div class="dropdownbox"><a class="navlink" onclick="showdropdown()" href="#"><i class="fa-solid fa-user"></i> <?=$_COOKIE['username']?></a>
			<div class="dropdowncontent">
				<a id="logoutbtn" class="navlink" href="logout-cookies.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
			</div>
		</div>
		</div>
		
    </nav>

    <!-- Content Here -->
