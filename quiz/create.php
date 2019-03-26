
<?php
session_start();

$db=mysqli_connect("localhost","root","","subjects");
$username=$_SESSION['user_id'];

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
    			<h1>Online quiz</h1>
    			<ul id="nav">
    				<li><a class="homered" href="index.html">HOME</a></li>
    				<li><a class="homeblack" href="facultylogin.php">faculty</a></li>
    				<li><a class="homeblack" href="#">Contact</a></li>
    			</ul>		
    		</nav>
    	</header>
    	<div class="divider"></div>
<form action="" method="post">


</select><br/><br>
<input type="submit" name="create" value="CREATE" style="background-color: red; color: white;" >
&nbsp &nbsp  &nbsp &nbsp &nbsp <input type="submit" name="addquestion" value="ADDQUESTION" style="background-color: green; color: white;">
&nbsp &nbsp  &nbsp &nbsp &nbsp <input type="submit" name="logout" value="logout" style="background-color: red; color: white;"> <br/> <br/> <br/>
<input type="submit" name="start" value="START TEST" style="background-color: green; color: white;"> 
&nbsp &nbsp  &nbsp &nbsp &nbsp 
<input type="submit" name="stop" value="STOP TEST" style="background-color: red; color: white;"> &nbsp &nbsp  &nbsp &nbsp &nbsp  <input type="submit" name="result" value="result" style="background-color: green; color: white;"> <br/> <br/> <br/>

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
if(isset($_POST['start'])){

header("location:start.php");
}
if(isset($_POST['stop'])){

header("location:stop.php");
}
if(isset($_POST['result'])){

header("location:studentresult.php");
}
?>
	 
</body>







</html>