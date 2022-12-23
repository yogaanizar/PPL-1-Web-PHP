<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            table.table-striped tbody tr:nth-child(odd){
                background-color: #ededff;
            }
            
        </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <a href="logout.php" style="margin: 20px;">LOGOUT</a>
                    <a href="bacafile.php" style="margin: 20px;">EXCEL</a>
                </h3>
            </th>
        </tr>
		</table>
<?php 
    include 'PHPExcel/IOFactory.php';

	//masukkan file yang akan dibaca
    $inputFileName = 'dataMahasiswa.xlsx';
	try{
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
	}catch(Exception $e){
		die('Error loading file '.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$sheet = $objPHPExcel->getSheet(0);
	$highestRow = $sheet->getHighestRow();
	$highestColumn = $sheet->getHighestColumn();

	echo "<table border = 1>";
	for($row = 1; $row <= $highestRow; $row++){
		$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL, TRUE, FALSE);
		$NIM = $rowData[0][0];
		$Nama = $rowData[0][1];
		$TanggalLahir = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][2],PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY) ;
		

		echo "	<tr>
					<td>$NIM</td>
					<td>$Nama</td>
					<td>$TanggalLahir</td>
					
				</tr>
		";
	}
	echo "</table>";

?>


    
    <?php 
        echo "<br>";
        echo "<br>";
        echo "<br>";
        ?>
        
    </body>
</html>

