<?php
        include 'koneksi.php';
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];

        $sql = "INSERT INTO mahasiswa SET nim='$nim',nama='$nama',umur='$umur'";
        mysqli_query($conn, $sql);
        header("location:datasiswa.php");
?>