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

    $sql = "SELECT * FROM mahasiswa";
    $result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
<body> 


<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>
     <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>
        <table border = 1>
            <tr>
                <th width = 1500 , height =100>
                    <h3 align ="center">  HEADER </h3>
                </th>
            </tr>
            <tr>                
                 <th>
                    <h3 align ="left"> 
                    <a href="home.php"> HOME  </a> 
                        <a href="berita.php">&nbsp &nbsp BERITA </a>
                        <a href="datasiswa.php">&nbsp &nbsp DATA SISWA </a>
                        <a href="logout.php">&nbsp &nbsp LOGOUT</a>
                    </h3>
                </th>
            </tr>
            <tr height = 350>
                <th> <h3> Page Data Siswa <h3>
                    <label>Cari Siswa</label>
                    <a href ="input.php">input data</a>
                <form action="datasiswa.php" method="POST">
				        <input type="text" name="keyword" placeholder="Masukkan Nama">
			</form><br>
                <table border=1 align="center" class="table table-striped">        
		</tr>
            <tr>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
                <th>Update</th>
            </tr>
         </tr>
        <?php
			if(isset($_POST['keyword'])){
				$keyword = $_POST['keyword'];
				$sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%'";
			} else {
				$sql = "SELECT * FROM mahasiswa";				
			}
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
                <td><img src="foto/<?php echo $row["foto"]?>" width="100px" height="100px"></td>
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['umur'] ?></td>
                <td><a href="vdetail.php? nim=<?=$row['nim']?>">Detail</a></td>
                <td><a href="vupdate.php? nim=<?=$row['nim']?>">Edit</a></td>
            </tr>
            <?php
                    }
                }else{
                    echo "0 result";
                }
                $conn->close();
            ?>  
        </table><br><br><br>
        

        <!-- <form method="post" action="tambah.php" enctype="multipart/form-data">
        <input type="file" name="ppl1"><br>    
        <label>Nama</label><input type="varchar" name="nama"><br>
        <label>Nim</tabel><input type="varchar" name="nim"><br>
        <label>Umur</tabel><input type="int" name="umur"><br>
        <input type="submit" value="Submit">
        </form>         -->
            
            
            
            
            
            </th>
              
            </tr>
            <tr>
                <th height = 100></th>
            </tr>
        </table>
        
    </body>
</html>

<!-- <style>
    .table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: lightblue; 
 }
 </style> -->
