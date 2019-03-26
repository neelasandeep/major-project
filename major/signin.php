<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
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
	background:green;
	color:white;
}

	</style>

	<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>
<body>

<?php
$db=mysqli_connect("localhost","root","","smindia");
session_start();
if(isset($_POST['sub'])){

$email=$_POST['user'];
$password=$_POST['password'];
$sql="SELECT * FROM `stakeholders` WHERE EMAIL_ID='$email' and PASSWORD='$password'";
 $sql= mysqli_query($db,$sql);
  
  $nor=mysqli_num_rows($sql);
  if($nor==1)
  {
	 $_SESSION['login_user']=$email;
	 header("location:create.php");
	 
	  }else{
		  
		 header("location:signin.php?invalid=your email or password are incorrect please try again");
	  }
  
  
  
}

?>

 
      
  

      
    

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
           
           <div align="center" style="color:red; font-size: 25px;"><?php echo @$_GET["invalid"];?></div>
           

<form method="POST" action="">
<table border="2" align="center">
<tr>
<th colspan="6" align="center" cellpadding="5" cellspacing="6"><h1>Faculty login</h1></th>
</tr>
<tr>
<th  align="right" style="background:blue; color:white;">email id</th>
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