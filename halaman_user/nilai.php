<?php
    $query = mysqli_query($koneksi, "SELECT * FROM siswabaru JOIN user on siswabaru.id_akun = user.id WHERE username = '$user'");
    $siswa = mysqli_fetch_array($query);
    $id_siswa = $siswa['No_Pendaftaran'];
    $nilai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilaisiswa WHERE id_siswa = $id_siswa"));

    if($nilai == null){
    ?>
        <div class="alert alert-info">
			<strong>Info!</strong> Nilai masih kosong
		</div>
    <?php
    } else {
?>

<h2><i class="fas fa-archive"></i>&nbsp;&nbsp;Nilai</h2><br>
<table class="table table-striped table-hover w-100" style="margin-left: 0">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Mata Pelajaran</th>
        <th scope="col">Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Matematika</td>
            <td><?= $nilai['matematika'] ?></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Bahasa Indonesia</td>
            <td><?= $nilai['indonesia'] ?></td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Bahasa Inggris</td>
            <td><?= $nilai['inggris'] ?></td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Pendidikan Kewarganegaraan</td>
            <td><?= $nilai['pkn'] ?></td>
        </tr>
        <tr>
            <th scope="row">5</th>
            <td>Agama</td>
            <td><?= $nilai['agama'] ?></td>
        </tr>
    </tbody>
</table>
<?php
}
?>