<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_akademik";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Tidak dapat terkoneksi pada MySQL: " . $conn->connect_error);}

	if(isset($_GET['nim'])){
        $nim = $_GET['nim'];
    }
    else {
        die ("Error. No Code Selected!");    
    }

    $sql = "SELECT * FROM mahasiswa WHERE nim = '".$_GET['nim']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body border="1">
		<form method="post" action="" enctype="multipart/form-data">
			<table width="25%" border="0" align="center">
				<tr>
					<?php echo "<img src='../lat12/foto/$row[Foto]' width='70' height='90' />";?>
					<td>Nama</td>
					<td><input type="text" name="Nama" value="<?= $row['nama']?>"></td>
				</tr>
				<tr>
					<td>Umur</td>
					<td><input type="text" name="Umur" value="<?= $row['umur']?>"></td>
				</tr>
				<tr>
					<td>Foto</td>
					
					<td><input type="file" name="foto" value="<?= $row['Foto']?>"></td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" value="simpan" name="simpan">SIMPAN</button></td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['simpan'])){
		// menyimpan data kedalam variabel
		unlink("foto/$row[Foto]");

		$Nama = $_POST['Nama'];
		$Umur = $_POST['Umur'];
		$foto = $_FILES['foto']['name'];
		$source = $_FILES['foto']['tmp_name'];    
		$folder = '../lat12/foto/';

		move_uploaded_file($source, $folder.$foto);
		if($Nama == '' || $Umur == ''){
			echo "Inputan Nama / Umur tidak boleh kosong";
		}else{
			// query SQL untuk insert data
			$query="UPDATE mahasiswa SET Nama='$Nama',Umur='$Umur', Foto='$foto' WHERE nim = '$nim'";
			$result = mysqli_query($conn, $query);
			if($result){
                echo "Update Berhasil";
				header('Location:index.php?content=datamahasiswa.php');
			}else{
				echo "Update Gagal";
			}
		}
	}
?>