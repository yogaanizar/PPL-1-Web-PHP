<html>
<head>
	<title>Latihan 11</title>
</head>
<body>
    
	<h2><center>Silahkan Login<center/></h2>
	<br/>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<p align=center>Login gagal! username dan password salah! ";
		}else if($_GET['pesan'] == "logout"){
			echo "<p align=center> Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "<p align=center> Anda harus login untuk mengakses halaman admin data siswa";
		}
	}
	?>
	<br/>
	<br/>
	<form method="post" action="login.php">
		<table align="center">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="text" name="password" placeholder="Masukkan password"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="LOGIN"></td>
			</tr>
		</table>			
	</form>
</body>
</html>