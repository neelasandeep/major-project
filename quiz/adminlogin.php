<html>
<head>
<style>
input[type=text]
{
	height:26px;
	width:250px;
}
input[type=password]
{
	height:26px;
	width:250px;
}
input[type=submit]
{
	height:39px;
	width:120px;
	background:indianred;
	color:white;
}

	</style>

	<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>
<body style="background:orange;">

<?php
$db=mysqli_connect("localhost","root","","admin");
session_start();
if(isset($_POST['sub'])){

$username=$_POST['user'];
$password=$_POST['password'];
$sql="SELECT * FROM `admin` WHERE username='$username' and password='$password'";
 $sql= mysqli_query($db,$sql);
  
  $nor=mysqli_num_rows($sql);
  if($nor==1)
  {
	 $_SESSION['login_user']=$username;
	 header("location:admin.php");
	 
	  }else{
		  
		 header("location:adminlogin.php?invalid=your username or password are incorrect please try again");
	  }
  
  
  
}

?>

 <a class="homered" href="index.html"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a>
<h1 align="center" style="background:green;color:white;">Admin Login<h1>
<h3 align="center" style="color:red;"><?php echo @$_GET["success"];?></h3>
<h3 align="center" style="color:red;"><?php echo @$_GET["invalid"];?></h3>

<form method="POST" action="">
<table border="2" align="center">
<tr>
<th colspan="6" align="center" cellpadding="5" cellspacing="6"><h1>secure admin login</h1></th>
</tr>
<tr>
<th  align="right" style="background:blue; color:white;">username</th>
<td><input type="text" name="user"></td>
</tr>
<tr>
<th  align="right"style="background:blue; color:white;">password</th>
<td><input type="password" name="password"></td>
</tr>
<tr>

<td colspan="2" align="center"><input type="submit" value="login" id="sub" name="sub"></td>
</tr>

</body>
</html>