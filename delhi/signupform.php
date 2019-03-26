 <?php 

$db=mysqli_connect("localhost","root","","smindia");

 if(isset($_POST['submit'])){
  
$fname=$_POST['fname'];
$email=$_POST['email'];
$lname=$_POST['lname']; 
$pwd=$_POST['pwd'];
$cpwd=$_POST['cpwd'];
if($pwd!=$cpwd){
  header("location:signupform.php?invalid1=passwords doesnt matched");
 exit();
 
}else{
$cname=$_POST['cname'];
$cid=$_POST['cid'];
$cno=$_POST['cno'];
$sql="SELECT * FROM `stakeholders`";
 $sql= mysqli_query($db,$sql);
 while($data=mysqli_fetch_array($sql)){
 if($data['EMAIL_ID']==$email)
   
   {
   header("location:signupform.php?invalid=this email id already registered");
 exit();
 }
 
    
 }




$insert="INSERT INTO `stakeholders`(`FIRST_NAME`, `LAST_NAME`, `EMAIL_ID`, `PASSWORD`, `COLLEGE_NAME`, `COLLEGE_ID`, `CONTACT_NO`) VALUES ('$fname','$lname','$email','$pwd','$cname','$cid','$cno');";
$insert=mysqli_query($db,$insert);
if(!$insert)
{
   echo "<script>alert('not uploaded due to inernal problems');</script>";mysql_error();
   exit();
 }
else{
echo "<script>alert('your registration has completed now you can login');</script>";

header("location:signin.php");
 } 

}

}
 
?>


 <html>
    <head>
      <script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
  <title>Registration form</title>

      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body >

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
           <div align="center" style="font-size: 40px">REGISTRATION</div>
           <h3 align="center" style="color:red;"><?php echo @$_GET["invalid"];?></h3>
           <h3 align="center" style="color:red;"><?php echo @$_GET["invalid1"];?></h3>
  <table align="center" style="text-align: left;">
  <form method="POST" action="" name="f">
  
  <tr><td><b>First name </b><br><br></td> <td><b>:</b> <input type="text" name="fname" value=""placeholder="ex:sandeep" required ><br><br></td></tr>
  <tr><td><b> Last name</b><br><br></td> <td><b>:</b><input type="text" name="lname" value="" placeholder="ex:neela" required ><br><br></td></tr>
 
 <tr> <td> <b>Email id</b><br><br></td><td><b>:</b>  <input type="email" name="email" value="" placeholder="sand@gmail.com" required ><br><br></td></tr>
  <tr><td><b>Password</b><br></td><td><b>:</b> <input type="password"  id="pw" name="pwd" value="" required><br><br></td></tr>
  <tr><td><b>Confirm password</b><br><br></td><td><b>:</b> <input type="password" name="cpwd" id="cp" value="" required ><br><br></td></tr>
  <tr><td><b>College name</b><br><br></td><td><b>:</b> <input type="text" name="cname" value="" size="20" required><br><br></td></tr>
  <tr><td><b>College id</b><br><br></td><td><b>:</b> <input type="text" name="cid" value="" size="20" required><br><br></td></tr>
  <tr><td><b>Contact number</b><br><br></td><td><b>:</b> <input type="text" name="cno" value="" size="20" required><br><br></td></tr>
  
  
  
<tr><td></td><td><input type="Submit" class="btn" name="submit" value="Sign up" style="width:150px;height:40px;border-radius:50px;border:3px solid #0a0a0a;shadow:10px 10px 10px grey;"></td></tr>
</form></table>
           
       </div>


    </body>
</html>