<!DOCTYPE html>
<html lang="en">
<?php 
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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <a href="logout.php">LOGOUT</a>

                    </h3>
                </th>
            </tr>
            <tr height = 350>
                <th> <h3>INI HOME <h3> </th>
            </tr>
            <tr>
                <th height = 100></th>
            </tr>
        </table>
        
    </body>
</html>