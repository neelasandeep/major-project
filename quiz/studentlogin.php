<html>
<head><title>student login</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>

<body align="center">
  <header>

        <nav>
           <ul>
                <li><a class="homered" href="index.html"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a></li>
            </ul>
          <h1>Online quiz</h1>
          <ul id="nav">
            
            <li><a class="homeblack" href="#">Student</a></li>
            <li><a class="homeblack" href="#">Contact</a></li>
          </ul>   
        </nav>
      </header>
      <div class="divider"></div>

<h3 style="padding: 10px 200px 10px 200px;">SIGN IN</h3><br><form method="post" action=""><table align="center">
   <tr><input align="right" type="text" name="user" value="" placeholder="HALL_TICKET NO" required > <br><br></tr>
   <tr><input align="right" type="password" name="password" value=""  placeholder="password" required ><br><br></tr>
   &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="signin" value="Sign in"></form>
   
   
   </table></body></html>
   
   
   
   
   
   <?php
$db=mysqli_connect("localhost","root","","subjects");
session_start();
if(isset($_POST['signin'])){

$username=$_POST['user'];
$password=$_POST['password'];
$status="true";
$sql="SELECT * FROM `students_login` WHERE HALL_TICKET='$username' and PASSWORD='$password'";
 $sql= mysqli_query($db,$sql);
  
  $nor=mysqli_num_rows($sql);
  if($data=mysqli_fetch_array($sql)){
  if($data['STATUS']==$status)
  {
	 $_SESSION['login_user']=$username;
	 header("location:selecttest.php");
	 
	  }else{
		  
		 echo"<script>alert('session expired');</script>";
	  }
  }else{
	  echo"<script>alert('your hallticket number or password is invalid');</script>";
  }
  
  
}

?>
    