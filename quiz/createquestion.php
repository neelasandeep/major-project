<html>
<head>
<title> create question</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center">
	 
    	<header>
    		<nav>
    			<h1>Online quiz</h1>
    				
    		</nav>
    	</header>
    	<div class="divider"></div>
<form action="" method="post"><table align="center" ><br><br>
<tr>QUESTION:<input type="text" name="qtn" value="" placeholder="please enter your question" size="75" ><br /><br></tr>
<tr><td>A:<input type="text" name="a" value="" placeholder="option1" ><br><br></td>
<td>B:<input type="text" name="b" value="" placeholder="option2" ><br /><br></td></tr>
<tr><td>C:<input type="text" name="c" value="" placeholder="option3" ><br><br></td>
<td>D:<input type="text" name="d" value="" placeholder="option4" ><br /><br></td></tr>
<tr><td>CORRECT:<input type="text" name="correct" value="" placeholder="correct"  ><br /><br></td></tr>
</table>
<input type="submit" name="button" value="END"  style="text_align:left; background-color: red; color: white;" >
<input type="submit" name="submit" value="SUBMIT" style="text_align:right; background-color: green; color: white;"  >

</form>
 <?php
 session_start();
  $error=false;
$db=mysqli_connect("localhost","root","","subjects");
if(isset($_POST['submit'])){
$question= htmlspecialchars($_POST['qtn']);
$a= htmlspecialchars($_POST['a']);
$b= htmlspecialchars($_POST['b']);
$c= htmlspecialchars($_POST['c']);
$d= htmlspecialchars($_POST['d']);
  
$correct=htmlspecialchars($_POST['correct']);
$table_name=$_SESSION['tname'];

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


$insert="INSERT INTO `$table_name` (`QUESTION`, `OPTION-A`, `OPTION-B`, `OPTION-C`, `OPTION-D`, `CORRECT_ANS`) VALUES ('$question','$a','$b','$c','$d','$correct')";
$insert=mysqli_query($db,$insert);
if(!$insert)
{
	 echo "<script>alert(' question not inserted');</script>";
 }
else{

echo "<script>alert('question successfully inserted');</script>";

 } 



}
if(isset($_POST['button'])){
	header("location:create.php");
}
?>

</body>
</html>