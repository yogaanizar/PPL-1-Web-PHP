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
        

        <form method="post" action="latihan6_db.php">
        nama : <input type="varchar" name="nama" /><br />
        nim : <input type="varchar" name="nim" /><br />
        umur : <input type="int" name="umur" /><br />
        <input type="submit" value="Submit" />
        </form>
    </body>
</html>