<?php
    $halaman = array("home", "dashboard", "biodata", "biodata-update", "nilai", "logout");

    if(isset($_GET['hal'])) $hal = $_GET['hal'];
    else $hal = "home";

    foreach ($halaman as $h){
        if($hal == $h){
            include "$h.php";
            break;
        }
    }
?> 