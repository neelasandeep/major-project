 <html>
 <head>
  <link rel="stylesheet" type="text/css" href="style.css">
 <style>
 .forg{right:100px;
 position:absolute;}
 .sgp{ text-align:left;
 }
.kiran{
border-right:1px solid black;
height:80%;
background-color:white;
}
.btn{
width:150px;height:40px;border-radius:50px;border:3px solid #e03d23;shadow:10px 10px 10px grey;
}
.color{background-color:white;
}
.pho{
	border:3px solid black;
	background-color:white;
}
.pho1{
	border:3px solid black;
	background-color:white;
}
 </style>

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>


  </head>
   <body>
    <header>
        <nav>
          <h1>Online quiz</h1>
          <ul id="nav">
            <li><a class="homered" href="#">HOME</a></li>
            <li><a class="homeblack" href="stuhomepage.php">Student</a></li>
            <li><a class="homeblack" href="#">About_us</a></li>
            <li><a class="homeblack" href="#">Contact</a></li>
          </ul>   
        </nav>
      </header>
      <div class="divider"></div>
  
   <div class="rows">
   <div class="col-md-4 col-sm-12 kiran">   <div class="color" height="60px" width="40px" align="center"><h1><b>TKR EDUCATIONS</b></h1></div>

   <br><br>
   <div class="pho">
      <section>
<center>
  <img class="mySlides" src="scholarship.jpg" style="width:30 height=20">
  <img class="mySlides" src="admission.jpg" style="width:60 height=40">
  <img class="mySlides" src="event.jpg" style="width:60 height=40">
</center>
</section>
</div>
<br><br>
<div class="pho1">
<marquee>
  <img class="Slides" src="scholarship.jpg" style="width:30 height=20">
  <img class="Slides" src="admission.jpg" style="width:30 height=20">
  <img class="Slides" src="event.jpg" style="width:30 height=20">
</marquee>
</div>

   </div>
</div>

   <div class="fd">
   
   </div>
   <div class="col-md-4 col-sm-12 kiran" align="center" style="background-color:#7b82ed;">
   <div class="sgn">
   <br><br>
   <h3>Sign in</h3><br><form method="post" action="">
   <input align="right" type="text" name="user" value="" placeholder="HALL_TICKET NO" required > 
   Password :<input align="right" type="password" name="password" value=""  placeholder="password" required >
   &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="signin" value="signin"></form><br><br>
   
   
   
   
   
   
   
   
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
	 header("location:tests.php");
	 
	  }else{
		  
		 echo"<script>alert('session expired');</script>";
	  }
  }else{
	  echo"<script>alert('your hallticket number or password is invalid');</script>";
  }
  
  
}

?>
    <a href="www.google.com" class="forg" align="right">forgot password ?</a>
	<hr>
	<div>
	<h3>STUDENT REGISTRATION</h3><br>
	
	<div class="sgp">
	
	


<?php


$db=mysqli_connect("localhost","root","","subjects");

if(!$db)
{
	echo "not connected";
}




?>
<html>
<body>


<form action="" method="post">
<b>E-MAIL &nbsp&nbsp&nbsp&nbsp:</b> <input type="email" name="ename" value="<?php if(isset($_POST['ename'])){ echo $_POST['ename'];}?>" placeholder="e-mail" required></br><br>
<b>NAME &nbsp&nbsp&nbsp&nbsp:</b> <input type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>" placeholder="Name" required></br><br>
<b>HALL TICKET NO &nbsp&nbsp&nbsp&nbsp&nbsp: </b> <input type="text" name="id"  value="<?php if(isset($_POST['id'])){ echo $_POST['id'];}?>" placeholder="Hall Ticket Number" required></br> <br>
<b>PASSWORD : </b><input type="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];}?>"  placeholder="password" required></br>
<br>
<b>YEAR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </b> 
<select name="yr"> 
<option value=""> ----</option> 
<option value="I">I </option>
<option value="II">II </option>
<option value="III">III</option>
<option value="IV">IV</option>

</select><br/><br>
<b>SEMISTER &nbsp: </b>
<select name="sem"> 
 <option value="">---- </option> 
 <option value="I">I </option>
<option value="II">II </option>
</select><br/><br>
<b>BRANCH &nbsp&nbsp&nbsp :</b>
<select name="br"  >
 <option > ---- </option>
 <option value="CSE">CSE </option>
<option value="EEE">EEE </option>
<option value="CIVIL">CIVIL</option>
<option value="ECE">ECE</option> 
<option value="IT">IT</option>
<option value="MECH">MECH</option>
<option value="MECH">CIVIL</option>

</select><br/><br>
<b>SECTION &nbsp&nbsp&nbsp :</b>
<select name="sec"> 
<option value=""> ----</option> 
<option value="A">A</option>
<option value="B ">B </option>
<option value="C">C</option>
<option value="D">D</option>

</select><br>
<input type="submit" name="bt1" value="submit"></button>

</form>
<?php


	if(isset($_POST['bt1'])){
$e_mail=$_POST['ename'];
$name=$_POST['name'];
$htno=$_POST['id'];
$password=$_POST['password'];
$section=$_POST['sec'];
$year=$_POST['yr'];
$sem=$_POST['sem'];
$branch=$_POST['br'];

if($year==""||$sem==""||$branch==""||$section==""){
echo "<script>alert('please fill above fields');</script>";
exit();
}
$sql="SELECT *FROM `students_login`;";
$sql=mysqli_query($db,$sql);
while($data=mysqli_fetch_array($sql)){
  if($htno==$data['HALL_TICKET'] || $e_mail==$data['E_MAIL']){
echo "<script>alert('this email id or hall ticket already registered');</script>";
}}
$status="false";
$que="INSERT INTO `students_login`(`E_MAIL`, `NAME`, `HALL_TICKET`, `PASSWORD`, `YEAR`, `SEMISTER`, `BRANCH`, `SECTION`,`STATUS`) VALUES ('$e_mail','$name','$htno','$password','$year','$sem','$branch','$section','$status');";
$que=mysqli_query($db,$que);
	
	if(!$que){
		echo "<script>alert(' inserted');</script>"; 
	}
	
	echo "hii"; echo $name;  echo "your succesfully registered go for sign in";
	}
?>
</body>
</html>

