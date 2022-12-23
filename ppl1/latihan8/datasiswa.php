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
<html>
    <body>
    
    </body>
</html>


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
                        <a href="berita.php">&nbsp &nbsp BERITA </a>
                        <a href="latihan6.php">&nbsp &nbsp DATA SISWA </a>
                    </h3>
                </th>
            </tr>
            <tr height = 350>
                <th> <h3> Page Data Siswa <h3>
                <table border=1 align="center">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>                  
            <tr>
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['umur'] ?></td>
                <td><a href="vdetail.php? nim=<?=$row['nim']?>">Detail</a></td>
            </tr>
            <?php
                    }
                }else{
                    echo "0 result";
                }
                $conn->close();
            ?>  
        </table><br><br><br>
        

        <form method="post" action="tambah.php">
        <label>Nama</label><input type="varchar" name="nama"><br>
        <label>Nim</tabel><input type="varchar" name="nim"><br>
        <label>Umur</tabel><input type="int" name="umur"><br>
        <input type="submit" value="Submit">
        </form>        
            
            
            
            
            
            </th>
              
            </tr>
            <tr>
                <th height = 100></th>
            </tr>
        </table>
        
    </body>
</html>
