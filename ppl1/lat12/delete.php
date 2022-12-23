<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_akademik";

    $connection = mysqli_connect($servername,$username,$password,$dbname);
    if(!$connection){
        die("Koneksi Gagal: ".mysqli_connect_error());
    }

    if(isset($_GET['nim'])){
        $nim = $_GET['nim'];
    }else{
        die("Error! nim tidak ditemukan");
    }

    $query = mysqli_query($connection, "SELECT*FROM mahasiswa WHERE nim = '$nim'");
    $data = mysqli_fetch_array($query);

    unlink("foto/$data[foto]");

    mysqli_query($connection, "DELETE FROM mahasiswa WHERE nim='$nim'");
    
    header("location:http://localhost/ppl1/lat12/datamahasiswa.php");
?>