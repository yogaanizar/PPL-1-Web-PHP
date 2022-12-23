<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Berita</title>
</head>
<body> 

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>
    <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>
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
                        <a href="berita.php">&nbsp &nbsp BERITA </a>
                        <a href="datasiswa.php">&nbsp &nbsp DATA SISWA </a>
                        <a href="logout.php">&nbsp &nbsp LOGOUT</a>
                    </h3>
                </th>
            </tr>
            <tr height = 350>
                <th> <h3> Page Berita <h3> </th>
            </tr>
            <tr>
                <th height = 100></th>
            </tr>
        </table>
        
    </body>
</html>
