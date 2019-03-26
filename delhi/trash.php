if(isset($_POST['btn'])){
    $inputfilename=$_FILES['file']['tmp_name'];
    $objPHPExcel=PHPExcel_IOFactory::load('$inputfilename');
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        # code...
        $highestRow=$worksheet->getHighestRow();
        for ($row=2; $row<=$highestRow  ; $row++) { 
            # code...
            $question1=mysqli_real_escape_string($db,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
             $optionn1=mysqli_real_escape_string($db,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
              $optionn2=mysqli_real_escape_string($db,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
               $optionn3=mysqli_real_escape_string($db,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
                $optionn4=mysqli_real_escape_string($db,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
                $correct1=mysqli_real_escape_string($db,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
                $insert2="INSERT INTO `$table_name` (`QUESTION`, `OPTION-A`, `OPTION-B`, `OPTION-C`, `OPTION-D`, `CORRECT_ANS`) VALUES ('$question1','$optionn1','$optionn2','$optionn3','$$optionn4','$correct1');";
$insert2=mysqli_query($db,$insert2);
if(!$insert2)
{
     echo "<script>alert(' question not inserted');</script>";
 }
else{

echo "<script>alert('question successfully inserted');</script>";

 } 


        }
    }
}

