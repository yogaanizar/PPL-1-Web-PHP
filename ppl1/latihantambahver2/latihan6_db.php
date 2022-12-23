<?php

include 'latihan6db.php';


$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];

mysqli_query($conn,"insert into mahasiswa values('$nim','$nama','$umur')");


header ("location:latihan6.php");
?>