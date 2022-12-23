


<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_pegawai";

    $connection = mysqli_connect($servername,$username,$password,$dbname);
    if(!$connection){
        die("Koneksi Gagal: ".mysqli_connect_error());
    }

    //Menyimpan data ke dalam variable
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $gjpokok = $_POST['gjpokok'];
    $jmltanggungan = $_POST['jmltanggungan'];
    $gjtotal = $gjpokok + $jmltanggungan * 200000;
  

    $foto = $_FILES["namafilefoto"]["name"];
    $temp_name = $_FILES["namafilefoto"]["tmp_name"];    
    $folder = "namafilefoto/".$foto;
    move_uploaded_file($temp_name, $folder);



    //Query untuk insert data mahasiswa
    $query = "INSERT INTO pegawai SET nip='$nip', nama='$nama', umur='$umur', namafilefoto='$foto', gjpokok='$gjpokok', jmltanggungan='$jmltanggungan', gjtotal='$gjtotal'";
    mysqli_query($connection, $query);
    header("location:tables.php");
?>