<?php
    require '../Function/function.php';
    $id = $_GET["id"];

    $siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswabaru WHERE No_Pendaftaran= $id"));

    if (isset($_POST["submit"])){
        
        //cek apakah data berhasil ditambahkan atau tidak
        if(update($_POST)>0){
            echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php?hal=biodata';
            </script>";
        }else{
            echo"Gagal Tambah dengan error <br><br>".mysqli_error($koneksi);
            echo "<script>
            alert('Data gagal ditambahkan');
            </script>";
        } 
    }
?>
    <!--bagian box formulir-->
    <section class="box-formulir">
        <h2><i class="fas fa-edit"></i>&nbsp;Update Data</h2>  
        <!--Bagian form-->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box">

                <br><h3 class="text-secondary">Kategori Jurusan</h3>
                <div class="row mb-3">
                    <label for="tahunAjaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-10">
                        <select name="tahunAjaran" value="<?= $siswa['tahunAjaran']; ?>" class="form-select" id="tahunAjaran">
                            <option  value="2021/2022">2021/2022</option>
                            <option  value="2022/2023">2022/2023</option>
                            <option  value="2023/2024">2023/2024</option>
                            <option  value="2024/2025">2024/2025</option>
                            <option  value="2025/2026">2025/2026</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select id="jurusan" name="jurusan" value="<?= $siswa['jurusan']; ?>" class="form-select">
                            <option  value="IPA">IPA</option>
                            <option  value="IPS">IPS</option>
                            <option  value="Bahasa">Bahasa</option>
                        </select>
                    </div>
                </div>
                
                <br><h3 class="text-secondary">Data Diri Calon Siswa</h3>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" value="<?= $siswa["nama"]; ?>" class="form-control" id="nama">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                        <input type="text" name="nisn"  value="<?= $siswa['nisn']; ?>" id="nisn" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" name="tl"  value="<?= $siswa['tl']; ?>" id="tl" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select id="jk" name="jk" value="<?= $mhs['jenis_kelamin']; ?>" class="form-control">
                            <option  value="Laki-Laki">Laki-laki</option>
                            <option  value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select id="agama" name="agama" value="<?= $siswa['agama']; ?>" class="form-select">
                            <option  value="Islam">Islam</option>
                            <option  value="Kristen Protestan">Kristen Protestan</option>
                            <option  value="Kristen Katolik">Kristen Katolik</option>
                            <option  value="Hindu" >Hindu</option>
                            <option  value="Budha" >Budha</option>
                            <option  value="Khonghucu" >Khonghucu</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea type="text" cols="27" name="alamat" id="alamat" placeholder="Masukkan Alamat" aria-label=".form-control-lg example" rows="3" required><?=htmlspecialchars($siswa["alamat"])?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" name="sekolah" id="sekolah" value="<?= $siswa['asal_sekolah']; ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telp" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="tel" name="telp" value="<?= $siswa['no_telp']; ?>"  class="form-control" id="telp">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="<?= $siswa['email']; ?>" class="form-control" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <img src="../PSB/images/<?= $siswa['foto'];?>" width="50">
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <input type="hidden" name="id" value="<?= $siswa["No_Pendaftaran"];?>">
                        <input type="hidden" name="oldfoto" value="<?= $siswa["foto"];?>">
                        <input type="hidden" name="id_user" value="<?= $siswa["id_akun"] ?>">
                    </div>
                    <div class="col-sm-10">
                        <br><button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                    </div>
                </div>
                <br>
            </div>
        </form>

    </section>
</body>
</html>