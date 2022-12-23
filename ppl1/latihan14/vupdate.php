

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
	<body border="1">
		<form method="post" action="" enctype="multipart/form-data">
            <p align=center>Edit Data</p>
			<table width="25%" border="0" align="center">
				<tr>
					
					<td>Nama</td>
					<td><input type="text" name="Nama" value="<?= $row['nama']?>"></td>
				</tr>
				<tr>
					<td>Umur</td>
					<td><input type="text" name="Umur" value="<?= $row['umur']?>"></td>
				</tr>
				<tr>
					<td>Foto</td>
					
					<td><input type="file" name="foto" value="<?= $row['foto']?>"></td>
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
		unlink("foto/$row[foto]");

		$Nama = $_POST['Nama'];
		$Umur = $_POST['Umur'];
		$foto = $_FILES['foto']['name'];
		$source = $_FILES['foto']['tmp_name'];    
		$folder = '../latihan13/foto/';

		move_uploaded_file($source, $folder.$foto);
		if($Nama == '' || $Umur == ''){
			echo "Inputan Nama / Umur tidak boleh kosong";
		}else{
			// query SQL untuk insert data
			$query="UPDATE mahasiswa SET nama='$Nama',umur='$Umur', foto='$foto' WHERE nim = '$nim'";
			$result = mysqli_query($conn, $query);
			if($result){
                echo "Update Berhasil";
				header('Location:datasiswa.php');
			}else{
				echo "Update Gagal";
			}
		}
	}
?>