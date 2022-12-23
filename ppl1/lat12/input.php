<html>
    <head>
        <title> Insert Data to MYSQL </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1><center>Tambah Data Mahasiswa</center></h1>
    
        <form action="" method="post" enctype="multipart/form-data">
        <table width="25%" border="0" align="center">
            <tr> 
                <td>NIM</td>
                <td><input type="number" name="nim"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Umur</td>
                <td><input type="number" name="umur"></td>
            </tr>
            <tr>
                <td>Foto </td>
                <td> <input type="file" name="foto"> </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="simpan" value="submit"></td>
            </tr>
            <tr height="40">
                <td></td>
                <td><a href="datamahasiswa.php">Kembali</a></td>
            </tr>
        </table>
    </form>
    
    <?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_akademik";

	$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Tidak dapat terkoneksi pada MySQL: " . $conn->connect_error);}

  if(isset($_POST['keyword'])){
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM  mahasiswa WHERE Nama LIKE '%".$keyword."%' ORDER BY NIM ASC";
} else {
    $query = "SELECT * FROM mahasiswa ORDER BY NIM ASC";
}

$result = mysqli_query($conn, $query);
$no=1;
if(!$result) {
die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
}

if(isset($_POST['simpan'])) {
    $nim= $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $foto = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];    
    $folder = '../lat12/foto/';
    
    move_uploaded_file($source, $folder.$foto);
    $insert = mysqli_query($conn,"INSERT INTO mahasiswa(nim, nama, umur, Foto) VALUES ('$nim', '$nama', '$umur','$foto')");
    if($insert){
        echo '<center>Upload Successful</center>';
    }else{
        echo '<center>Gagal Upload</center>';
    }
}
?>
</body>
</html>