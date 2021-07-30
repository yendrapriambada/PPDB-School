<?php 
require 'Function/function.php';    

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert ('user baru berhasil ditambahkan! silahkan mengisi formulir pendaftaran siswa baru');
                document.location.href = 'PSB/ppdb-form.php';
            </script>";
    }   
    else {
        echo mysqli_error($koneksi);
    }
}
 ?>


<?php
if (isset($_GET['msg'])) {
    $pesan =$_GET["msg"];
    echo "<script>alert('$pesan')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" 
    crossorigin="anonymous"></script>
    <link rel="icon" href="Asset-HeadFoot/Hat, Halloween, Witch, Wizard, Magic.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleScript/style-signup.css"/>
    <link rel="stylesheet" href="StyleScript/styleHF.css">
    <title>Signup</title>
</head>
<body>
	<header style="background-image: url(Asset/asset-images/SRjZtxsK3Os.jpg);">
        <div class="headline">
            <a href=""><i class="fas fa-phone"></i>&nbsp;+6281283397013</a>
            <a href=""><i class="far fa-envelope"></i>&nbsp;info@sman5ambis.sch.id</a>
        </div>
        <nav aria-label="Main navigation">
            <img src="Asset/Logo/logo2.svg" alt="">
            <button class="navbar-toggler ms-auto p-2 bd-highlight p-0 border-0" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <li><a href="home.html">Home</a></li>
                <li><a href="history.html">History</a></li>
                <li class="nav-item dropdown">
                    <a href="#"  class="nav-link dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0px;">Profile</a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="visimisi.html">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="about.html">Tentang Sekolah</a></li>
                        <li><a class="dropdown-item" href="strukturPemimpin.html">Struktur Pimpinan</a></li>
                        <li><a class="dropdown-item" href="salamredaksi.html">Salam Redaksi</a></li>
                    </ul>
                </li>
                <li><a href="artikel.php">Artikel</a></li>
                <li><a href="psb.php">PSB</a></li>
                <li><a href="download.php">Download</a></li>
                <li><a href="kontak.html">Kontak</a></li>
                <li><a href="search.php"><i class="fas fa-search"></i></a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0px;">
                        <img src="Asset/Profil/images.jfif" alt="profil" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="login.php">Log In</a></li>
                        <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
                        <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="jumbotron">
            <div class="container">
                <h1>Signup</h1>    
            </div>
        </div>
    </header>
    
    <div class="container">
        <br>
        <br>
        <p><b style="color: #38687F; font-size: 40px;">Daftar Akun Siswa</b></p>
        <p id="garis"></p>
        <br>
        <div class="dasar-login">
        	<div class="login-form">
        		<center><img class="user-icon" src="Asset/Profil/user1.png"></center>
        		<form action="" method="post">
        			<div class="wrap-form">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Username </label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
				        
				        <div class="mb-3">
        				    <label for="exampleInputEmail" class="form-label">Masukkan E-mail</label>
        				    <input type="email" class="form-control" name="email" id="email">
				        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password2" id="password2">
                        </div>
                        <div id="signup" class="form-text">Sudah Punya Akun? <a href="login.php">Log in</a></div>
				        <br>
                        <div style="text-align: right;">

				            <button style="align-self: flex-end;" type="submit" class="btn btn-primary" name="register">Register</button>
                        </div>
				  	</div>
				</form>
        	</div>
        </div>
        <br><br><br>
    </div>
    
    <footer>
        <div class="school-sos">
            <h5>Find Us!</h5>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/channel/UCMfUrxep6EiLooS9cF1PyuA"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/kemakom/"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/UPIfess?s=08"><i class="fab fa-facebook"></i></a>
            <h5>&copy;Copyright All Right</h5>
        </div>
        <div class="designer-box">
            <div class="sos-box">
                <img src="Asset/Profil/yendra.jpeg" alt="profil">
                <h5>M Yendra</h5>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href="https://web.facebook.com/mochyendra"><i class="fab fa-facebook"></i></a>
            </div>
            <div class="sos-box">
                <img src="Asset/Profil/warda.jpeg" alt="profil">
                <h5>Warda A</h5>
                <a href="https://www.instagram.com/wardaazr/"><i class="fab fa-instagram"></i></a>
                <a href="https://web.facebook.com/wardazzahra"><i class="fab fa-facebook"></i></a>
            </div>
            <div class="sos-box">
                <img src="Asset/Profil/putri.jpeg" alt="profil">
                <h5>Putri Z</h5>
                <a href="https://www.instagram.com/putrizukhruf/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100031661610967"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </footer> 
    <script src="StyleScript/script.js"></script>
</body>
</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
