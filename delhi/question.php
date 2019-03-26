<html>
<head>
<title> create question</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center">
	 
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
        <div class="divider"></div>
        <div class="fwimage" style="background-image: url(back1.jpg); ">
<form action="" method="post"><table align="center" ><br><br>
<tr><td>QUESTION <br> <br></td> <td>:<input type="text" name="qtn" value="" placeholder="please enter your question" size="75" ><br /><br></td></tr>
<tr><td>MARKS <br><br></td> <td>  :<input type="text" name="a" value="" placeholder="weightage" ><br><br></td>
</tr>

</table>
<input type="submit" name="button" value="END"  style="text_align:left; background-color: red; color: white;" >
<input type="submit" name="submit" value="SUBMIT" style="text_align:right; background-color: green; color: white;"  >
<a href="createquestion.php">shift to multiple</a>


</form>
</div>
 <?php
 session_start();
 $username=$_SESSION['login_user'];
  $error=false;
$db=mysqli_connect("localhost","root","","smindia");
if(isset($_POST['submit'])){
$question= htmlspecialchars($_POST['qtn']);
$a= htmlspecialchars($_POST['a']);

$table_name=$_SESSION['tname'];
$subject=$_SESSION['subject'];
$uname=$_SESSION['uname'];
if($a=="" || $question=="" ){
echo "<script>alert(' please fill above fields');</script>"; exit(); }
$sql="SELECT * FROM `$table_name`";

$sql=mysqli_query($db,$sql);



while($data=mysqli_fetch_array($sql)){
    if($data['QUESTION']==$question){
    echo"<script>alert('this question is already added please add another question if you have!');</script>";
    exit();}
}


$insert="INSERT INTO `$table_name`( `QUESTION`, `WEIGHTAGE`, `USER_ID`) VALUES ('$question','$a','$username')";
$insert=mysqli_query($db,$insert);
$dlevel=easy;
$insertt="INSERT INTO `admindb`( `QUESTION`, `WEIGHTAGE`, `STAKE_HOLDER`, `SUBJECT`, `UNIT`, `DLEVEL`) VALUES ('$question','$a','$username','$subject','$uname','$dlevel')";
$insertt=mysqli_query($db,$insertt);
if(!$insert)
{
	 echo "<script>alert(' question not inserted');</script>";
 }
else{

echo "<script>alert('question successfully inserted');</script>";

 } 
 if(!$insertt)
{
     echo "<script>alert(' question not inserted into admin db');</script>";
 }
else{

echo "<script>alert('question successfully inserted into admin db');</script>";

 } 



}

if(isset($_POST['button'])){
	header("location:create.php");
}
?>

</body>
</html>