<?php 
require 'Classes/PHPExcel/IOFactory.php';
 session_start();
  $error=false;


if(isset($_POST['btn'])){
    echo "hello";
    $inputfilename=$_FILES['file']['tmp_name'];
    $exceldata=array();
    $db=mysqli_connect("localhost","root","","smindia");
    try{
        $inputfilename=PHPExcel_IOFactory::identify($inputfilename);
        $objReader=PHPExcel_IOFactory::createReader($inputfilename);
        $objPHPExcel=$objReader->load($inputfilename);

    }catch(Exception $e){
        die('Error loading file"'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
    }
    $sheet=$objPHPExcel->getSheet(0);
    $highestRow=$sheet->getHighestRow();
    $highestColumn=$sheet->getHighestColumn();
    for ($row=2; $row <=$highestRow ; $row++) { 
       $rowdata=$sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
      $insert2="INSERT INTO `$table_name` (`QUESTION`, `OPTION-A`, `OPTION-B`, `OPTION-C`, `OPTION-D`, `CORRECT_ANS`) VALUES ('".$rowdata[0][0]."','".$rowdata[0][1]."','".$rowdata[0][2]."','".$rowdata[0][3]."','".$rowdata[0][4]."','".$rowdata[0][5]."')";
      $insert2=mysqli_query($db,$insert2);
      if(!$insert2)
{
     echo "<script>alert(' question not inserted');</script>";
 }
else{

echo "<script>alert('question successfully inserted');</script>";

 } 
    }

   



        
    
?>