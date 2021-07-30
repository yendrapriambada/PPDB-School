<?php
session_start();
require 'Function/function.php';

//cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id 
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if ( isset($_SESSION["login"])) {
    header("Location: halaman_user/index.php");
    exit;
}



if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password  
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            //set session
            $_SESSION["login"] = true;
            $_SESSION["user"] = $username;
            // cek remember me
            if ( isset($_POST['remember'])) {
                //buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }
            header ("Location: halaman_user/index.php");
            exit;
        }   
    }
    $error = true;
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
    <link rel="icon" href="Asset/Logo/Hat, Halloween, Witch, Wizard, Magic.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleScript/style-login.css"/>
    <link rel="stylesheet" href="StyleScript/styleHF.css">
    <title>Login</title>
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
                <h1>Login</h1>    
            </div>
        </div>
    </header>

    <div class="container">
        <br>
        <br>
        <p><b style="color: #38687F; font-size: 40px;">Login Akun Siswa</b></p>
        <p id="garis"></p>
        <br>
        <div class="dasar-login">
            <div class="login-form">
                <center><img class="user-icon" src="Asset/Profil/user1.png"></center>
                <form action="" method="post">
                    <div class="wrap-form">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        
                        <div>
                        <?php if ( isset($error) ) : ?>
                            <p style="color: red; font-style: italic;">username/password salah!</p>
                        <?php endif; ?>
                        </div>
                        <div class="grid-btn">
                            <div id="signup" class="form-text">Belum Punya Akun? <a href="signup.php">Sign up</a></div>
                            <div id="signup" class="form-text">Login Sebagai Admin? <a href="halaman_admin/login_admin.php">Dashboard Login</a></div>
                            <br>
                            <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
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
