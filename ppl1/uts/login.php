<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
 $nip = $_POST['nip'];
$username = $_POST['username'];
$password = md5($_POST['password']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from user where nip='$nip' and username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['nip'] = $nip;
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:tables.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>