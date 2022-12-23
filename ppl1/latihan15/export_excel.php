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
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
?>

<table border=1 align="center" class="table table-striped border-secondary">        
		</tr>
            <tr>
                
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
               
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
       
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['umur'] ?></td>
              
                
            </tr>
            <?php
                    }
                }else{
                    echo "0 result";
                }
                $conn->close();
            ?>  
        </table><br><br><br>




<html>