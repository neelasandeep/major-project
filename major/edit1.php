

<?php  
error_reporting(0);
session_start();


$db=mysqli_connect("localhost","root","","smindia");
$id=$_GET['sno'];

$usaename=$_SESSION['login_user'];
$tbl=$_SESSION['tname'];
$sa="SELECT * FROM `$tbl` WHERE SNO='$id'";
$record=mysqli_query($db,$sa);

while($data=mysqli_fetch_array($record))
{
    $que=$data['QUESTION'];
}

echo $tbl;
echo $que;
if(isset($_POST['submit'])){
$question= $_POST['qtn'];
$weightage= $_POST['a'];

$insertt="UPDATE `admindb` SET `QUESTION`='$question',`WEIGHTAGE`='$weightage' WHERE STAKE_HOLDER='$usaename'AND QUESTION='$que'";
$insertt=mysqli_query($db,$insertt);
$insert="UPDATE `$tbl` SET `QUESTION`='$question',`WEIGHTAGE`='$weightage' WHERE SNO='$id'";
$insert=mysqli_query($db,$insert);
echo $usaename;
echo $que;

if(!$insert)
{
    echo "not inserted";
}



else if(!$insertt)
{
    echo "not inserted in admin ";
}
else
{
    echo " inserted in admin ";
    #header("location:review.php");
}
}


?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>edit</title>
</head>
<body style="background-image: url(back1.jpg); background-repeat: no-repeat; background-size: cover; ">
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

	<div style="height: 50px;"></div>
	







<form method="POST" action="" name="f" onsubmit="this.form.submit()" >
	<table align="center" ><br><br>
		
		<tr><td>QUESTION <?php echo $id;?> <br /><br></td><td><b>:</b><input type="text" name="qtn" value="<?php echo $m2["QUESTION"];?>"  size="75" ><br /><br></td></tr>
  <tr><td>MARKS <br /><br></td><td><b>:</b><input type="text" name="a" value="<?php echo $m2['WEIGHTAGE'];?>"  required><br><br></td></tr>



 </table>
  
  <div align="center">
<input  type="Submit" class="btn" name="submit" value="Submit" style="width:150px;height:40px;border-radius:50px;border:3px solid #0a0a0a;shadow:10px 10px 10px grey;"><br>
<a href="edo.php">back</a>
</div>

</form>

</body>
</html>



