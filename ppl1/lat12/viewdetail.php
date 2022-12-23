<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT NIM, Nama, Umur FROM mahasiswa";
$result = $conn->query($sql);

    if(isset($_GET['nim'])){
        $nim=$_GET['nim'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    // include "latihan6.php";
    $query    =mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    $result    =mysqli_fetch_array($query);
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Script PHP untuk Menampilkan Data dari Database Derdasarkan Id</title>
</head>
<body>
    <h2>Detail Data Mahasiswa</h2>
    <table border="0" cellpadding="4">
        <tr>
            <td><?php echo "<img src='../lat12/foto/$result[foto]' width='210' height='270' />";?></td>
        </tr>
        <tr>
            <td size="90">Nim</td>
            <td>: <?php echo $result['nim']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $result['nama']?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>: <?php echo $result['umur']?></td>
        </tr>
        <tr height="40">
            <td></td>
            <td>   <a href="datamahasiswa.php">Kembali</a></td>
        </tr>
    </table>
</body>
</html>