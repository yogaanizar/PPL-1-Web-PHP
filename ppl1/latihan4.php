

<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
</head>

<body>
<h2>Latihan Membuat Tabel</h2>

<table border=1>
  <tr>
    <th>NIM</th>
    <th>NAMA</th>
    <th>UMUR</th>
  </tr>
<?php 
$i= 1;
while($i <= 10){
?>
  <tr>
    <td>201511064</td>
    <td>Yoga Nizar Habibulloh</td>
    <td>20</td>
  </tr>

  <?php 
        $i++;
    } 
 ?>
  
</table>

</body>

</html>

