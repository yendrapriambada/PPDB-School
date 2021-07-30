<?php
    include '../Function/function.php';
    $calon_siswa = query("SELECT * FROM siswabaru");

    if (isset($_POST["cari"])){
        $calon_siswa = update($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" i
    ntegrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
</head>
<body style=" font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">

    <div class="container-sm"> <br><br>
    <h2>Daftar Calon Siswa</h2>
    <h3>SMAN 5 Ambis</h3>
    <br>
        <a type="button" class="btn btn-success" href="tambah.php">Tambah Data</a>
        <br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead> 
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($calon_siswa as $row):?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["nisn"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["tgl_lahir"]; ?></td>
                    <td><?= $row["gender"]; ?></td>
                    <td><?= $row["asal_sekolah"]; ?></td>
                    <td><?= $row["alamat"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                    <td><img src="images/<?= $row["foto"];?>" width="80"></td>
                    <td>
                        <a type="button" class="btn btn-success" href="biodata-update.php?id=<?= $row['No_Pendaftaran']?>">Update</a>
                        <br><br>
                        <a type="button" class="btn btn-success" href="hapus.php?id=<?= $row['No_Pendaftaran']?>">Delete</a>
                        </a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <br><br><br>
</body>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
        } );
    </script>
</html>