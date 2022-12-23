<?php $conn = mysqli_connect("localhost", "root", "", "db_akademik");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows =[];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

     session_start();
     if (!isset($_GET['content'])){
        $vcontent = 'index.php';
     }else {
         $vcontent = $_GET['content'];
     }

     if (!isset($_SESSION['username'])){
        header("Location: login.php");
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            table.table-striped tbody tr:nth-child(odd){
                background-color: #ededff;
            }
            
        </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Halaman Home</title>
</head>
<body> 
    <table border = 1 align="center">
        <tr>
            <th width = 1500 , height =100>
                <h3 align ="center">  HEADER </h3>
            </th>
        </tr>
        <tr>                
            <th>
                <h3 align ="left",> 
                    <a href="index.php"> HOME  </a> 
                    <a href="berita.php" style="margin: 20px;">BERITA </a>
                    <a href="datamahasiswa.php" style="margin: 20px;">DATA MAHASISWA </a>
                    <a href="logout.php" style="margin: 20px;">LOGOUT</a>
                    <a href="bacafile.php" style="margin: 20px;">EXCEL</a>
                    <a href="report_data_mahasiswa.php" style="margin: 20px;">PDF</a>
                </h3>
            </th>
        </tr>
        <tr height = 350 align="center">
            <th> <h3> DATA MAHASISWA <h3>
            <h4><form action='datamahasiswa.php'method="POST">
                <?php echo "Nama :" ?>
                <input type='text' value='' name='keyword'>
                <input type='submit' value='Cari'>
            </form> </h4>
            <a href="input.php">Input Data</a>
    <table  align="center" class="table table-striped table-hover text-center table-bordered"  >
        
        <tr >
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Foto</th>
            <th>Aksi</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
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
        while($row = $result->fetch_assoc()) {
      ?>
      
          <tr>
          <td><?php echo $row["nim"]; ?></td> 
          <td><?php echo $row["nama"]; ?></td> 
          <td><?php echo $row["umur"]; ?></td> 
          <td><?php echo "<img src='../lat12/foto/$row[Foto]' width='70' height='90' />";?></td>
          <td><a href="viewdetail.php? nim=<?=$row['nim']?>" class="btn btn-secondary btn-outline-light">Detail</a></td>
          <td><a href="update.php? nim=<?=$row['nim']?>" class="btn btn-primary">Update</a></td>
          <td><a href="delete.php? nim=<?=$row['nim']?>" class="btn btn-danger">Delete</a></td>
          </tr>
      <?php }
?>


    </table>
            <a href="export.php"><button> Download excel </button></a>
        
    </body>
</html>