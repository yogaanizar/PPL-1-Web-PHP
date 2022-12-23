<?php
    if(isset($_GET['nim'])){
        $nim=$_GET['nim'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    $query    =mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    $result    =mysqli_fetch_array($query);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>
<body> 
        <table border = 1>
            <tr>
                <th width = 1500 , height =100>
                    <h3 align ="center">  HEADER </h3>
                </th>
            </tr>
            <tr>                
                 <th>
                    <h3 align ="left",> 
                    <a href="home.php"> HOME  </a> 
                        <a href="berita.php"> BERITA </a>
                        <a href="datasiswa.php"> DATA SISWA </a>
                    </h3>
                </th>
            </tr>
            <tr height = 350>
                <th> <h3> Page Detail Siswa <h3>
                    

                <table border=1 align="center">
              
            <tr>


        <tr>
            <td>Foto</td>
            <td><img src="foto/<?php echo $result["foto"]?>" width="100px" height="100px"></td>
        </tr>     
            <td>Nim</td>
            <td> <?php echo $result['nim']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> <?php echo $result['nama']?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td> <?php echo $result['umur']?></td>
        </tr>
        <tr>
            <td colspan="2"><a href="datasiswa.php">Kembali</a></td>
        </tr>
            </tr>
            </th>          
            </tr>
        </table>
        
    </body>
</html>
