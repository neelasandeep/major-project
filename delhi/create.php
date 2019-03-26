
<?php
session_start();

$db=mysqli_connect("localhost","root","","smindia");
$username=$_SESSION['login_user'];

if(!$db)
{
	echo "not connected";
}




?> 
<html>
<head>
<title>create</title>
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
<tr><td><input class="btn" type="submit" name="create" value="CREATE" style="width:150px;height:40px;border-radius:50px;border:3px solid green;shadow:10px 10px 10px grey;"
  ><br/> <br/></td><td></td>
 <td><input class="btn" type="submit" name="addquestion" value="ADDQUESTION" style="width:150px;height:40px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;"
 ><br/> <br/></td></tr>
 <tr><td><input class="btn" type="submit" name="logout" value="logout" style="width:150px;height:40px;border-radius:50px;border:3px solid green;shadow:10px 10px 10px yellow;"
 > <br/> </td>
<td></td><td><input type="submit" name="review" value="review" style="width:150px;height:40px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;"
> </td><br/> <br/> <br/></tr>
</table>
</form>
<?php 
if(isset($_POST['create']))
{
header("location:createtest.php");
}
?>
<?php 
if(isset($_POST['addquestion']))
{
header("location:addquestion.php");
}
if(isset($_POST['logout'])){

header("location:logout.php");
}

if(isset($_POST['review'])){

header("location:review.php");
}
?>
	 </div>
</body>







</html>