<?php
    $host = 'localhost';

    $usn = 'kelasbex_yendra';

    $pwd = 'yendra1305';

    $nama_DB = 'kelasbex_kelompok9_UTSprak';

    

    $koneksi = mysqli_connect($host,$usn,$pwd,$nama_DB);

    

    if (!$koneksi) {

        die("Koneksi gagal: " . mysqli_connect_error());

    }
    else {
        echo "connected";
    }



    // $koneksi = mysqli_connect("localhost", "root", "", "db_psb");

    // $koneksi = mysqli_connect("localhost", "kelasbex", "1t-sZ5k[9U1OQa", "kelasbex_kelompok9_UTSprak");

    // if ($koneksi) {
    //     echo "<h1> we are connected </h1>";
    // }
    // else{
    //     echo "<h1> Not connected </h1>";   
    // }

    // FTP server 
    // $ftpHost   = 'ftp.kelasbe.xyz';
    // $ftpUsername = 'yendra@kelasbe.xyz';
    // $ftpPassword = 'E(5Owt2.!yz2';

    // // Membuat FTP connection
    // $koneksi = ftp_connect($ftpHost) or die("Couldn't connect to $ftpHost");

    // // login to FTP server
    // $ftpLogin = ftp_login($koneksi, $ftpUsername, $ftpPassword);

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    //function login ==========================================
    function registrasi($data){
        global $koneksi;
    
        $username = strtolower(stripslashes($data["username"]));
        $email = strtolower(stripslashes($data["email"]));
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    
        // cek username sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('username sudah terdaftar!');
            </script>";
            return false;
        }
    
        //cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                    </script>";
            return false;
        }
    
        //enkripsi password
        $no = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC LIMIT 1"));
        $id = $no['id'] + 1;
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        //tambahkan userbaru ke database
        mysqli_query($koneksi, "INSERT INTO user VALUES($id, '$username', '$email', '$password')");
    
        return mysqli_affected_rows($koneksi);
    }

    //function login admin ==========================================
    function registrasi_admin($data){
        global $koneksi;

        $kode_admin = strtolower(stripslashes($data["kode_admin"]));
        $username = strtolower(stripslashes($data["username"]));
        $email = strtolower(stripslashes($data["email"]));
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
        
        // cek kode admin sudah ada atau belum
        $isTersedia = mysqli_query($koneksi, "SELECT username FROM admin WHERE kode_admin = '$kode_admin'");
    
        if (mysqli_fetch_assoc($isTersedia)) {
            echo "<script>
                    alert('kode_admin sudah terdaftar!');
            </script>";
            return false;
        }

        // cek username sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT username FROM admin WHERE username = '$username'");
    
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('username sudah terdaftar!');
            </script>";
            return false;
        }
    
        //cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                    </script>";
            return false;
        }
    
        //enkripsi password
        // $no = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id DESC LIMIT 1"));
        // if ($no != null) {
        //     $id = $no['id'] + 1;    
        // }
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        //tambahkan userbaru ke database
        mysqli_query($koneksi, "INSERT INTO admin VALUES('', '$kode_admin', '$username', '$email', '$password')");
    
        return mysqli_affected_rows($koneksi);
    }

    //function for input ======================================
    function noUrut(){      //untuk mendapatkan nomor urut baru
        global $koneksi;

        $row_num = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswabaru"));      //menghitung jumlah kolom di table database
        $no = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswabaru ORDER BY No_Pendaftaran DESC LIMIT 1")); //select data paling terakhir diinput
    
        if ($row_num > 0){      //jika sudah ada datanya
            $no_id = $no['No_Pendaftaran'] + 1;         //menambahkan dari id terakhir (pendaftar paling baru)
        } 
        else{                 //jika belum ada datanya
            $no_id = 1001;     
        }
        return $no_id;
    }
    
    function input($data){
        global $koneksi;

        $no = noUrut();
        $nama = htmlspecialchars($data['nama']);
        $nisn = htmlspecialchars($data['nisn']);
        $tl = htmlspecialchars($data['tl']);
        $jk = htmlspecialchars($data['jk']);
        $agama = htmlspecialchars($data['agama']);
        $alamat = htmlspecialchars($data['alamat']);
        $sekolah = htmlspecialchars($data['sekolah']);
        $telp = htmlspecialchars($data['telp']);
        $email = htmlspecialchars($data['email']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $tahun = htmlspecialchars($data['tahunAjaran']);
        $id_user = htmlspecialchars($data['id_user']);

        $fotoData = upload();
        if(!$fotoData){
            return false; //apabila gagal upload maka berhenti
        }
        move_uploaded_file($fotoData['tmp'],'images/'. $fotoData['nama']);
        $foto = $fotoData['nama'];
        //input data ke database
        $query = mysqli_query($koneksi, "INSERT INTO siswabaru VALUES
                ($no, '$nama', '$nisn', '$tl', '$jk', '$sekolah', '$alamat', 
                '$agama', '$email', '$telp', '$foto', '$tahun', '$jurusan', $id_user)");
        return mysqli_affected_rows($koneksi);
    }

    // function for input articel
    function input_artikel($data){
        global $koneksi;

        $judul = htmlspecialchars($data['judul']);
        $tanggal = htmlspecialchars($data['tgl']);
        $isi = htmlspecialchars($data['isi']);
        // $id_siswa = htmlspecialchars($data['id_siswa']);

        $fotoData = upload();
        if(!$fotoData){
            return false; //apabila gagal upload maka berhenti
        }
        move_uploaded_file($fotoData['tmp'],'img_artikel/'. $fotoData['nama']);
        $foto = $fotoData['nama'];
        //input data ke database
        $query = mysqli_query($koneksi, "INSERT INTO artikel VALUES
                ('', '$judul', '$tanggal', '$foto', '$isi')");
        return mysqli_affected_rows($koneksi);
    }

    // function for input nilai
    function input_nilai($data){
        global $koneksi;

        $mtk = htmlspecialchars($data['mtk']);
        $indo = htmlspecialchars($data['indo']);
        $inggris = htmlspecialchars($data['inggris']);
        $agama = htmlspecialchars($data['agama']);
        $pkn = htmlspecialchars($data['pkn']);
        $id_siswa = htmlspecialchars($data['id_siswa']);

        //input data ke database
        $query = mysqli_query($koneksi, "INSERT INTO nilaisiswa VALUES
                ('', '$mtk', '$indo', '$inggris', '$agama', '$pkn', '$id_siswa');");
        return mysqli_affected_rows($koneksi);
    }



    // function for update ===========================================================
    function update($data){
        global $koneksi;

        $no = $data['id'];
        $nama = htmlspecialchars($data['nama']);
        $nisn = htmlspecialchars($data['nisn']);
        $tl = htmlspecialchars($data['tl']);
        $jk = htmlspecialchars($data['jk']);
        $agama = htmlspecialchars($data['agama']);
        $alamat = htmlspecialchars($data['alamat']);
        $sekolah = htmlspecialchars($data['sekolah']);
        $telp = htmlspecialchars($data['telp']);
        $email = htmlspecialchars($data['email']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $tahun = htmlspecialchars($data['tahunAjaran']);
        $oldfoto = htmlspecialchars($data['oldfoto']);

        if($_FILES['foto']['error'] === 4){
            $foto = $oldfoto;
        }else{
            $fotoData = upload();
            move_uploaded_file($fotoData['tmp'],'../PSB/images/'. $fotoData['nama']);
            $foto = $fotoData['nama'];
        }
        //update data ke database
        $query = mysqli_query($koneksi, "UPDATE siswabaru SET
                No_Pendaftaran = $no, nama = '$nama', nisn = '$nisn', tgl_lahir = '$tl', gender = '$jk', 
                asal_Sekolah = '$sekolah', alamat = '$alamat', agama = '$agama', email = '$email', 
                no_telp = '$telp', foto ='$foto', tahun_ajaran = '$tahun', jurusan = '$jurusan' 
                WHERE No_Pendaftaran = $no");
        return mysqli_affected_rows($koneksi);
    }


    // function for delete ===========================================================
    function delete($id){
        global $koneksi;
        
        mysqli_query($koneksi, "DELETE FROM siswabaru WHERE No_Pendaftaran = $id");
        return mysqli_affected_rows($koneksi);
    }


    //function for upload a foto =========================================================
    function upload(){
        //informasi foto dipecah
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];
        
        if($error === 4){
            echo "<script> alert('harap upload foto terlebih dahulu')</script>";
            return false;
        }
        
        $ekstenFileValid = ['jpg','jpeg','png'];        //ketentuan file foto yang harus diupload
        $ekstenFile = explode('.',$namaFile);

        //mengambil ektensi paling terakhir (end) dan menggunakan huruf kecil (strtolower)
        $ekstenFile = strtolower(end($ekstenFile));
        
        //mengecek ektensi file sesuai dengan $ekstenFileValid
        if(!in_array($ekstenFile,$ekstenFileValid)){
            echo "<script> alert('Harap masukan file berupa jpg,jpeg, dan png!')</script>";
            return false;
        }
        //cek gambar apakah ukurannya terlalu besar
        if( $ukuranFile > 1000000){
            echo "<script> alert('Ukuran gambar lebih dari 1 MB')</script>";
            return false;
        }
        //generate nama baru, agar file dengan nama yang sama tidak menimpa 
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstenFile;
        
        //apabila file lolos pengecekan, maka file akan diupload ke directory
        $fotoData = array("nama" => $namaFileBaru, "tmp" => $tmpName);      //tmpName dan namafilebaru disimpan di satu array
        return $fotoData;
    }

    function upload_file(){
        // Getting uploaded file
        $file = $_FILES["file"];

        // Uploading in "uploads" folder
        move_uploaded_file($file["tmp_name"], "../uploads/" . $file["name"]);

        // Redirecting back
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
?>