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
    <table border=1>
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
            <table>
                <tr><td>NIM : </td><td><input type="text" name="nim"></td></tr>
                <tr><td>Nama :</td><td><input type="text" name="nama"></td></tr>
                <tr><td>Umur :</td><td><input type="text" name="umur"></td></tr>
 
            <tr><td colspan="2"><button type="submit" value="simpan">Submit</button></td></tr>
            </table>
        </form>
                
    </body>
</html>