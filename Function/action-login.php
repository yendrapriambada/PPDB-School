<?php
    // memulai session
    session_start();
    include "koneksi.php";

    // Select tb_user
    $sql = "SELECT * FROM tb_user";
    $user = mysqli_query($con,$sql);

    while($data = mysqli_fetch_array($user)){

        // mengambil isian dari form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // pengecekan kredensial login
        if ($username == $data['username'] && $password == $data['password']) {
            $status = 0;
            $_SESSION['username'] = $username;
            $_SESSION['hak_akses'] = $data['hak_akses'];
            
            if ($_SESSION['hak_akses'] == 1) {
                header("Location:../index.php");
            } else if ($_SESSION['hak_akses'] == 2){
                header("Location:../index.php");
            } else {
                header("Location:../index.php");
            }
        } else if ($username == $data['username'] && $password != $data['password']){
            $status = 1;
        } else if ($username != $data['username'] && $password == $data['password']){
            $status = 2;
        } else if ($username != $data['username'] && $password != $data['password']){
            $status = 3;
        }
    }
    
    if($status == 3) {
        echo "
            <script>
                alert('Username dan password anda salah');
                document.location.href = '../login.php';
            </script>
        ";
    } else if ($status == 1) {
        echo "
            <script>
                alert('Password anda salah');
                document.location.href = '../login.php';
            </script>
        ";
    } else if ($status == 2) {
        echo "
            <script>
                alert('Username anda salah');
                document.location.href = '../login.php';
            </script>
        ";
    }   
?>