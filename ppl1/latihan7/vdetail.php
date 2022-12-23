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
    <h2>Detail Data Mahasiswa</h2>
    <table border="0" cellpadding="4">
        <tr>
            <td size="90">Nim</td>
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
        <tr height="40">
            <td></td>
            <td>   <a href="index.php    ">Kembali</a></td>
        </tr>
    </table>
</body>
</html>