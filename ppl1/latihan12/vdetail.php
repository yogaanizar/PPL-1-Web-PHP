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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>
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
                    <a href="index.php"> HOME  </a> 
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
            <td><?php echo "<img src='/ppl1/fotomhs/$result[foto]' width='70' height='90' />";?></td>
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
