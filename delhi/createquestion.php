
<html>
<head>
<title> create question</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" >
	 
    	<header>
            <nav>
                <ul>
                <li><a class="homered" href="index.php"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a></li>
            </ul>
                
                <ul id="nav">
                    
                    <li><a class="homeblack" href="adminlogin.php">ABOUT US</a></li>
                    
                    <li><a class="homeblack" href="#">Contact</a></li>
                </ul>       
            </nav>
        </header>
         
         
        <div class="fwimage1" style="float: right;width:50%;height: 100%; background-color:red;">

<form action="" method="post"><br>
    <div class="que" align="center">
QUESTION:<input type="text" name="qtn" value="" placeholder="please enter your question" size="75" >
</div>
    <table align="center" ><br><br>

<tr><td>A:<input type="text" name="a" value="" placeholder="option1" ><br><br></td>
<td>B:<input type="text" name="b" value="" placeholder="option2" ><br /><br></td></tr>
<tr><td>C:<input type="text" name="c" value="" placeholder="option3" ><br><br></td>
<td>D:<input type="text" name="d" value="" placeholder="option4" ><br /><br></td></tr>
<tr><td>CORRECT:<input type="text" name="correct" value="" placeholder="correct"  ><br /><br></td></tr>

<tr><td><input type="submit" name="button" value="END"  style="text_align:left; background-color: red; color: white;" >
<input type="submit" name="submit" value="SUBMIT" style="text_align:right; background-color: green; color: white;"  >
<a href="question.php">shift to theory question</a></td></tr>

</table>

</form>
</div>
<div class="fwimage3" align="center" style="float: left;background-color:pink;position: absolute;width:50%;height:100%;">
             
            <div class=”top-bar”>
<div class=”inside-top-bar”>Import Excelsheet Data in mysql table<br><br>
</div>
</div>
<div style="text-align:left; border:1px solid #333333; width:300px; margin:0 auto; padding:10px;">
<form name="import" method="post" enctype="multipart/form-data">
<input type="file" name="file" /><br />
<input type="submit" name="btn" value="Submit" />
</form>
         </div>

 <?php

session_start();
  $error=false;
$db=mysqli_connect("localhost","root","","smindia");
$table_name=$_SESSION['tname1'];

if(isset($_POST['btn']))
{
$file = $_FILES['file']['tmp_name'];
$handle = fopen($file, "r");
$db=mysqli_connect("localhost","root","","smindia");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ',')) !== false)
{
$question1=$filesop[0];
$a1 = $filesop[1];
$b1 = $filesop[2];
$c1 = $filesop[3];
$d1 = $filesop[4];
$correct1 = $filesop[5];

$sql="INSERT INTO `$table_name` (`QUESTION`, `OPTION-A`, `OPTION-B`, `OPTION-C`, `OPTION-D`, `CORRECT_ANS`) VALUES ('$question1','$a1','$b1','$c1','$d1','$correct1');";
$insert=mysqli_query($db,$sql);

$c = $c + 1;
}
if($sql){
echo "You database has imported successfully. You have inserted ". $c ." recoreds";
}else{
echo "Sorry! There is some problem.";
}
}








if(isset($_POST['submit'])){
$question= htmlspecialchars($_POST['qtn']);
$a= htmlspecialchars($_POST['a']);
$b= htmlspecialchars($_POST['b']);
$c= htmlspecialchars($_POST['c']);
$d= htmlspecialchars($_POST['d']);
  
$correct=htmlspecialchars($_POST['correct']);



if($a=="" || $b=="" ||$c==""||$d==""|| $question=="" || $correct==""){
echo "<script>alert(' question not fiil inserted');</script>"; exit(); }
$sql="SELECT * FROM `$table_name`";

$sql=mysqli_query($db,$sql);
$data=mysqli_fetch_array($sql);


while($data=mysqli_fetch_array($sql)){
	if($data['QUESTION']==$question){
	echo"<script>alert('this question is already added please add another question if you have!');</script>";
	exit();}
}


$insert="INSERT INTO `$table_name` (`QUESTION`, `OPTION-A`, `OPTION-B`, `OPTION-C`, `OPTION-D`, `CORRECT_ANS`) VALUES ('$question','$a','$b','$c','$d','$correct');";
$insert=mysqli_query($db,$insert);
if(!$insert)
{
	 echo "<script>alert(' question not inserted');</script>";
 }
else{

echo "<script>alert('question successfully inserted');</script>";

 } 



}

if(isset($_POST['shift'])){
    header("location:question.php");
}
if(isset($_POST['button'])){
    header("location:create.php");
}
?>

</body>
</html>