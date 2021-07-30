<?php

require '../Function/function.php';
$id = $_GET["id"];

if(delete($id) > 0){
    echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'utama.php';
        </script>";
}else{
    echo"Gagal Dihapus dengan error <br><br>".mysqli_error($koneksi);
    echo "<script>
        alert('Data gagal dihapus');
        //document.location.href = 'utama.php';
        </script>";
}

?>