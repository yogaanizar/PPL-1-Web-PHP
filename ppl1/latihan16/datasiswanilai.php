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

    $sql = "SELECT mahasiswa.nim, mahasiswa.nama, matkul.kode_mkl, matkul.nama_mkl, nilai.indeks_nilai
    FROM nilai
    INNER JOIN mahasiswa ON nilai.nim = mahasiswa.nim
    INNER JOIN matkul ON nilai.kode_mkl = matkul.kode_mkl" ;
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

<link rel="stylesheet" src="custom.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
                <th> <h3 align="center"> Page Data Siswa <h3> <br>
                
              

            
                    <label class="cari">Cari Siswa</label>
                    <a href ="input.php">input data</a>
                <form action="datasiswa.php" method="POST">
				        <input type="text" name="keyword" placeholder="Masukkan Nama">
			</form><br>
                <table border=1 align="center" class="table table-striped border-secondary">        
		</tr>
            <tr>
                
                <th>NIM</th>
                <th>Nama</th>
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
                <th>Indeks Nilai</th>

           
            </tr>
         </tr>
        <?php
			
			if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
           
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['kode_mkl'] ?></td>
                <td><?php echo $row['nama_mkl'] ?></td>
                <td><?php echo $row['indeks_nilai'] ?></td>
                               
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

<style>
    .table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: lightblue; 
 }
 

 </style>
