<?php
    $query = mysqli_query($koneksi, "SELECT * FROM siswabaru JOIN user on siswabaru.id_akun = user.id WHERE username = '$user'");
    $siswa = mysqli_fetch_array($query);
?>

<h2><i class="far fa-id-card"></i>&nbsp;Biodata</h2><br>
<div id="bio" class="p-3 shadow-sm bg-light" style="width: 100%; margin: 0 auto">
  <div class="d-flex justify-content-around">
    <div class="p-4" id="card">
      <img src="../PSB/images/<?= $siswa['foto'] ?>" alt="pas foto" width="250">
      <h3 class="text-center" style="margin-top: 10px"><?= $siswa['nama'] ?></h3>
    </div>
    <br>
    <table class="table " >
      <tr>
        <td>No Pendaftaran</td>
        <td><?= $siswa['No_Pendaftaran'] ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><?= $siswa['nama'] ?></td>
      </tr>
      <tr>
        <td>NISN</td>
        <td><?= $siswa['nisn'] ?></td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td><?= $siswa['tgl_lahir'] ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td><?= $siswa['gender'] ?></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td><?= $siswa['agama'] ?></td>
      </tr>
      <tr>
        <td>Alamat Rumah</td>
        <td><?= $siswa['alamat'] ?></td>
      </tr>
      <tr>
        <td>Asal Sekolah</td>
        <td><?= $siswa['asal_sekolah'] ?></td>
      </tr>
      <tr>
        <td>Jurusan</td>
        <td><?= $siswa['jurusan'] ?></td>
      </tr>
      <tr>
        <td>Tahun Ajaran</td>
        <td><?= $siswa['tahun_ajaran'] ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?= $siswa['email'] ?></td>
      </tr>
      <tr>
        <td>No Telepon</td>
        <td><?= $siswa['no_telp'] ?></td>
      </tr>
    </table>
  </div>

  <a href="?hal=biodata-update&id=<?=$siswa['No_Pendaftaran']?>" type="button" class="btn btn-outline-primary btn-lg">
    <i class="fas fa-edit"></i>&nbsp;Edit
  </a>
</div>