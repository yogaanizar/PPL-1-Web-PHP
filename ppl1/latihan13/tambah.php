<?php
        include 'koneksi.php';
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $nama_file = $_FILES['ppl1']['name'];
        $source = $_FILES['ppl1']['tmp_name'];    
        $folder = './foto/';
        
        move_uploaded_file($source, $folder.$nama_file);
        $insert = mysqli_query($conn,"INSERT INTO mahasiswa(nama,nim,umur,foto) VALUES ('$nama', '$nim', '$umur','$nama_file')");
        if($insert){
            echo '<center>berhasil upload</center>';
        }else{
            echo '<center>Gagal Upload</center>';
        }

        header("location:datasiswa.php");


?>
