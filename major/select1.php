
<?php
session_start();

$db=mysqli_connect("localhost","root","","smindia");
$username=$_SESSION['login_user'];
#$table_name1=$_SESSION['tname1'];
$table_name=$_SESSION['tname'];
$_SESSION['tname']=$table_name;
 $_SESSION['tname1']=$table_name."obj";
#echo $table_name."obj";
if(!$db)
{
	echo "not connected";
}




?> 
<html>
<head>
<title>select1</title>
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
<form action="" method="post">


<table align="center">
<tr><td><input class="btn" type="submit" name="create" value="THEORY" style="width:150px;height:40px;border-radius:50px;border:3px solid green;shadow:10px 10px 10px grey;"
  ><br/> <br/></td><td></td>
 <td><input class="btn" type="submit" name="addquestion" value="MULTIPLE CHOICE" style="width:150px;height:40px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;"
 ><br/> <br/></td></tr>
 
</table>
</form>
<?php 
if(isset($_POST['create']))
{
header("location:question.php");
}
?>
<?php 
if(isset($_POST['addquestion']))
{
   
header("location:createquestion.php");
}

?>
	 </div>
</body>







</html>