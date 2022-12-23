<?php
    require('fpdf183/fpdf.php');
    $conn = mysqli_connect("localhost", "root", "", "db_akademik");
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows =[];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    
         session_start();
         if (!isset($_GET['content'])){
            $vcontent = 'index.php';
         }else {
             $vcontent = $_GET['content'];
         }
    
         if (!isset($_SESSION['username'])){
            header("Location: login.php");
        } 

    //create pdf object
    $pdf = new fpdf('P','mm','A4');

    //add new page
    $pdf->AddPage();

    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial','B',14);

    //Cell(width , height , text , border , end line , [align] )
    $pdf->Image("polban.jpg",18,5,20,20);
    $pdf->Cell(199 ,8,'DATA MAHASISWA',0,1,'C');
    //$pdf->Cell(130 ,5,'',0,1);
    //$pdf->Cell(130 ,5,'',0,1);
    $pdf->Cell(130 ,5,'',0,1);
    $pdf->Cell(130 ,5,'',0,1);

    //Create Table Header
    $pdf->SetFont('Arial','B',12);
    //$pdf->SetLeftMargin(25);
    $pdf->Cell(25 ,5,'Foto',1,0,'C');
    $pdf->Cell(39 ,5,'NIM',1,0,'C');
    $pdf->Cell(50 ,5,'Nama Lengkap',1,0,'C');
    $pdf->Cell(35 ,5,'Umur',1,1,'C');

    $pdf->SetFont('Arial','',8);
    //tampil data mahasiswa dari db
    $sql = "SELECT * FROM mahasiswa";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //Numbers are right-aligned so we give 'R' after new line parameter

            // $pdf->Image("file/".$row['foto'],18,$pdf->GetY()+3,10,10);
            $pdf->Image('../lat12/foto/'.$row['Foto'],18,$pdf->GetY()+3,10,10);
            $pdf->Cell(25 ,15,'',1,0);
            $pdf->Cell(39 ,15,$row['nim'],1,0,'C');
            $pdf->Cell(50 ,15,$row['nama'],1,0,'C');
            $pdf->Cell(35 ,15,$row['umur'],1,1,'C');  
            
    }
    // //output the result
    $pdf->Output('D','Datasiswa.pdf');
}