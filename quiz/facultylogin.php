<?php


$db=mysqli_connect("localhost","root","","subjects");

if(!$db)
{
	echo "not connected";
}
 
 ?>
 <html>
 <head>
 	<title>faculty login</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body align="center">
 	<header>
    		<nav>
    			<h1>Online quiz</h1>
    			<ul id="nav">
    				<li><a class="homered" href="index.html">HOME</a></li>
    				<li><a class="homeblack" href="#">faculty</a></li>
    				<li><a class="homeblack" href="#">Contact</a></li>
    			</ul>		
    		</nav>
    	</header>
 	<h3 style="padding: 0px 200px 10px 200px;">Sign in</h3><br><form method="post" action=""><table align="center">
   <tr><td>USER_ID <br><br></td> <td>:<input align="right" type="text" name="user" value="" placeholder="" required ><br><br></td></tr> 
   <tr><td>Password </td><td>:<input align="right" type="password" name="password" value=""  placeholder="password" required ><br></td></tr> </table>
   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="www.google.com" class="forg" align="right">forgot password ?</a><br><br>
   &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="signin" value="Sign in"></form><br><br>
   
   
   
   
   
   
   
   
   <?php

session_start();

if(isset($_POST['signin'])){

$username=$_POST['user'];
$password=$_POST['password'];
$_SESSION['user_id']=$username;

$sql="SELECT * FROM `fdetails` WHERE USER_ID='$username' and PASSWORD='$password'";
 $sql= mysqli_query($db,$sql);
  
  $nor=mysqli_num_rows($sql);
  if($nor>0)
  {
	 
	 header("location:create.php");
	 
	  }else{
		  
		 echo"<script>alert('your user_id or password or incorrect');</script>";
		 
	  }
  
  
  
}

?>
    
	
 </body>