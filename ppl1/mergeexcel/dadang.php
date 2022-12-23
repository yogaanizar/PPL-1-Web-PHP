<?php
    include './config/PHPExcel/IOFactory.php';
    include './config/PHPExcel.php';

    function getDataExcel($namafile){
        $inputFileName = "./source/$namafile";
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

        return array($sheet, $highestRow, $highestColumn);
    }

    if (isset($_POST['merge_data'])) {
        $objPHPExcel = new PHPExcel();

        $getFilePertama = getDataExcel("perusahaan1.xlsx");
        $objPHPExcel->setActiveSheetIndex(0);
        for($row = 1; $row <= $getFilePertama[1]; $row++){
            $rowData = $getFilePertama[0]->rangeToArray('A' . $row . ':' . $getFilePertama[2] . $row, NULL, TRUE, FALSE);
            $objPHPExcel->getActiveSheet()->setCellValue("A$row", $rowData[0][0]);
        }
        $objPHPExcel->getActiveSheet()->setTitle('Perusahaan A');

        // File Kedua

        $getFileKedua = getDataExcel("perusahaan2.xlsx");
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        for($row = 1; $row <= $getFileKedua[1]; $row++){
            $rowData = $getFileKedua[0]->rangeToArray('A' . $row . ':' . $getFileKedua[2] . $row, NULL, TRUE, FALSE);
            $objPHPExcel->getActiveSheet()->setCellValue("A$row", $rowData[0][0]);
        }
        $objPHPExcel->getActiveSheet()->setTitle('Perusahaan B');

        // File Ketiga
        
        $getFileKetiga = getDataExcel("perusahaan3.xlsx");
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(2);
        for($row = 1; $row <= $getFileKetiga[1]; $row++){
            $rowData = $getFileKetiga[0]->rangeToArray('A' . $row . ':' . $getFileKetiga[2] . $row, NULL, TRUE, FALSE);
            $objPHPExcel->getActiveSheet()->setCellValue("A$row", $rowData[0][0]);
        }
        $objPHPExcel->getActiveSheet()->setTitle('Perusahaan C');

        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Perusahaan.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

        header("location:../index.php");
    } 