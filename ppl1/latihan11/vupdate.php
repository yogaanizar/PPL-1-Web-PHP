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
  <?php
                if(isset($_POST['update'])){
                    $Nama = $_POST['nama'];
                    $Umur = $_POST['umur'];
                    if($Nama == '' || $Umur == ''){
                        echo "Inputan Nama atau Umur tidak boleh kosong!!!";
                    }else{
                        // query SQL untuk insert data
                        $query="UPDATE mahasiswa SET nama='$Nama',umur='$Umur' WHERE nim = '$nim'";
                        $result = mysqli_query($conn, $query);
                        if($result){
                            echo "Update Berhasil";
                            header("location:datasiswa.php");
                        }else{
                            echo "Update Gagal";
                        }
                    }
                }
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
                <th> <h3> Page Update Data Siswa <h3>
                    

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
        </table><br><br><br>
        <form action="" method="post">
                    <label>Nama : </label>
                    <input type="text" name="nama" value="<?php echo $result['nama']; ?>"/>
                    <label>Umur : </label>
                    <input type="text" name="umur" value="<?php echo $result['umur']; ?>"/>
                    <button type="submit" value="update" name="update">Update</button>
                </form>
              

    </body>
</html>
