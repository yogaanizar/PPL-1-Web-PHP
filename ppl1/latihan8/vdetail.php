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
<html>
<head>
    <title> Menampilkan Data dari Database Derdasarkan Id</title>
</head>
<body>
    <h2 align="center">Detail Data Mahasiswa</h2>
    <table border="1" cellpadding="4" align="center">
        <tr>
            <td>Nim</td>
            <td>: <?php echo $result['nim']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $result['nama']?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>: <?php echo $result['umur']?></td>
        </tr>
        <tr>
            <td colspan="2"><a href="datasiswa.php">Kembali</a></td>
        </tr>
    </table>
</body>
</html>