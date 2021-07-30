<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<?php
    include "koneksi.php";

    session_start(); 
    
    if( !isset($_SESSION["login"]) ){
    ?>
        <div class="alert alert-warning">
			<strong>Warning!</strong> Anda harus login terlebih dahulu.
		</div>
    <?php
        echo "<meta http-equiv='refresh' content='2;url=gagalMasuk.php'>";
    } else {
        $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Siswa</title>
    <link rel="stylesheet" href="style-user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
    <header class="fixed-top d-block p-3 text-white" style="background-color: #38687F">
        <h4>
        <button  class="btn text-white" onclick="myFunction()" style="background-color: #38687F" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
            <i class="fas fa-bars"></i>
        </button >
        Halaman User
        </h4>
    </header>
    <div class="wrapper">
        <nav class="text-white bg-dark collapse show" id="collapseExample" style="margin-top: 4.2rem">
            <ul class="nav nav-pills flex-column mb-auto">
                <br>
                <li class="nav-item p-1">
                    <a class="nav-link" href="?hal=home"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link" href="?hal=dashboard"><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link" href="?hal=biodata"><i class="far fa-id-card"></i>&nbsp;&nbsp;Biodata</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link" href="?hal=nilai"><i class="fas fa-archive"></i>&nbsp;&nbsp;Nilai</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link" href="?hal=logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
                </li>
            </ul>
        </nav>
        <section class="container p-4 main-content">
            <?php include "konten.php" ?>
            <br><br>
        </section>
    </div>
    <footer class="d-block p-3 fixed-bottom bg-light text-center">&copy;2020 | SMAN 5 Ambis</footer>
</body>
<script>
    function myFunction() {
        var element = document.body;
        element.classList.toggle("no-collapsed");
    }
</script>
</html>
<?php
    }
?>
