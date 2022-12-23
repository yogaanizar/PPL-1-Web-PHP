<?php
    require('fpdf184/fpdf.php');
    include('koneksi.php');


    //create pdf object
    $pdf = new fpdf('P','mm','A4');

    //add new page
    $pdf->AddPage();

    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial','B',14);

    //Cell(width , height , text , border , end line , [align] )
    $pdf->Image("logo/polbun.png",18,5,25,15);
    $pdf->Cell(199 ,8,'Politeknik Negeri Bandung',0,1,'C');
    $pdf->Cell(130 ,5,'',0,1);
    $pdf->Cell(130 ,5,'',0,1);
    $pdf->Cell(199 ,5,'Daftar Mahasiswa',0,1,'C');//end of line
    $pdf->Cell(130 ,5,'',0,1);
    
    //Create Table Header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(39 ,5,'Foto',1,0,'C');
    $pdf->Cell(39 ,5,'Nim',1,0,'C');
    $pdf->Cell(39 ,5,'Nama ',1,0,'C');
    $pdf->Cell(35 ,5,'Umur',1,1,'C');


    $pdf->SetFont('Arial','',12);
    //Show data barang from database
    $sql = "SELECT * FROM mahasiswa";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //Numbers are right-aligned so we give 'R' after new line parameter

            $pdf->Image("foto/".$row['foto'],18,$pdf->GetY()+3,25,15);
            $pdf->Cell(39 ,20,'',1,0);
            $pdf->Cell(39 ,20,$row['nim'],1,0,'C');
            $pdf->Cell(39 ,20,$row['nama'],1,0,'C');
            $pdf->Cell(35 ,20,$row['umur'],1,1,'C');

            
    }
    // //output the result
    $pdf->Output();
}

?>