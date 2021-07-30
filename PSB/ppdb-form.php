<?php
include '../Function/function.php';
if (isset($_POST["submit"])){
    //cek apakah data berhasil ditambahkan atau tidak
    if(input($_POST)>0){
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = '../psb.php';
        </script>";
    }else{
        echo"Gagal Tambah dengan error <br><br>".mysqli_error($koneksi);
        echo "<script>
        alert('Input data digagalkan, Mohon untuk mengisi dengan benar!');
        document.location.href = 'ppdb-form.php';
        </script>";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB - SMAN 5 Ambis</title>
    <link rel="stylesheet" type="text/css" href="styleIndex.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="assets/Hat, Halloween, Witch, Wizard, Magic.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <!--bagian box formulir-->
    <section class="box-formulir">
    <img src="../Asset/Logo/logo2.svg" style="width: 200px; height: 70px; margin: 0px 40%; margin-top:30px"><br>
        <h2 style="text-align: center;">Formulir Pendaftaran Siswa Baru SMAN 5 Ambis</h2><hr>
        <p style="text-align: center;">Dipastikan Anda telah membaca Syarat dan Ketentuan pada halaman sebelumnya, Silahkan isi data dengan benar!</p>
        <!--Bagian form-->
        <form action="" method="post"  enctype="multipart/form-data">
            <div class="box">
                <h4 >Kategori Jurusan</h4>

                <!-- input id user dari akun yang sudah di daftarkan tadi -->
                <?php $account = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC LIMIT 1")) ?>
                <input type="hidden" name="id_user" value="<?= $account["id"];?>">

                <table   class="table-form">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td>
                            <!-- <input type="text" name="tahunAjaran" class="input-control"> -->
                            <select name="tahunAjaran" class="input-control">
                                <option  value="2021/2022">2021/2022</option>
                                <option  value="2022/2023">2022/2023</option>
                                <option  value="2023/2024">2023/2024</option>
                                <option  value="2024/2025">2024/2025</option>
                                <option  value="2025/2026">2025/2026</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td>
                            <select id="jurusan" name="jurusan" class="input-control">
                                <option  value="Bahasa">Bahasa</option>
                                <option  value="IPA">IPA</option>
                                <option  value="IPS">IPS</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>
                <h4 >Data Diri Calon Siswa</h4>
                <table  class="table-form">
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><input type="text" name="nisn" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><input type="date" name="tl" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jk" class="input-control" value="Laki-laki">Laki-laki &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="jk" class="input-control" value="Perempuan">Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                        <td><input type="text" name="sekolah" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea class="input-control" cols="22"name="alamat" ></textarea></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select id="agama" name="agama" class="input-control">
                                <option  value="Islam">Islam</option>
                                <option  value="Kristen Protestan\">Kristen Protestan</option>
                                <option  value="Kristen Katolik">Kristen Katolik</option>
                                <option  value="Hindu" >Hindu</option>
                                <option  value="Budha" >Budha</option>
                                <option  value="Khonghucu" >Khonghucu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>:</td>
                        <td><input type="tel" name="telp" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><input type="file" name="foto" id="foto" class="input-control" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button class="btn-daftar" type="submit" name="submit">Tambah</button></td>
                    </tr>
                </table>
            </div>
        </form>
        <a  class="btn btn-danger" style="width: 310px;" href="../psb.html"> <<  Kembali ke Halaman utama</a><br> <br>
    </section>
</body>
</html>