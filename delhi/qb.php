<?php
session_start();
$username=$_SESSION['login_user'];
$db=mysqli_connect("localhost","root","","smindia");

if(!$db)
{
	echo "not connected";
}




?> 
<html>
<head>
	<title>create test</title>
	<link rel="stylesheet" type="text/css" href="style.css"></head>
<body align="center"> <header>
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
	<div style="height: 50px;"></div>
<form action="" method="post">

<table align="center"  style="width: 100px;" >

<tr><td><b>YEAR</b><br><br></td>

<td><b>:</b><select name="year" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['year'])){ echo $_POST['year'];}else { echo "select";} ?> </option>

<option value="I">I</option>
<option value="II">II</option>
<option value="III">III</option>	
<option value="IV">IV</option>

</select><br/><br></td></tr>

<tr><td><b>SEMISTER</b><br><br></td> 
<td><b>:</b><select name="sem" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['sem'])){ echo $_POST['sem'];}else { echo "select";} ?> </option>

<option value="I">I</option>
<option value="II">II</option>


</select><br/><br></td></tr>
<tr><td ><b>	BRANCH </b><br><br></td>  
<td ><b>:</b><select name="br" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['br'])){ echo $_POST['br'];}else { echo "select";} ?> </option>

<option value="CSE">CSE</option>
<option value="ECE">ECE</option>
<option value="EEE">EEE</option>
<option value="CIVIL">CIVIL</option>
<option value="MECH">MECH</option>
</select><br/><br></td></tr>

<tr><td><b>SUBJECT </b><br><br></td>

<td><b>:</b><select name="subject"  onchange="this.form.submit()"> 
       <option > <?php if(isset($_POST['subject'])){ echo $_POST['subject'];}else { echo "select";} ?> </option> 
    
<?php

if(isset($_POST['year'])){
    $year=$_POST['year'];
    $sem=$_POST['sem'];
    $branch=$_POST['br'];
    $dbb=mysqli_connect("localhost","root","","subjects");
	$sql="SELECT  SUBJECT FROM `sub` WHERE YEAR='$year' AND SEMISTER='$sem' AND BRANCH='$branch'";
	$sql=mysqli_query($dbb,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	               
               <option value="<?php  echo $data['SUBJECT'];?>"> <?php  echo $data['SUBJECT'];?> </option>
        <?php }
}$sub=$_POST['subject'];
     ?>
     
<tr><td><button name="btn1" style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Start</button> </td>  <td> <button name="back" style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Back</button> </td></tr>
</table>
</form>
</div>
<?php


	
if(isset($_POST['btn1'])){


$
	$year=$_POST['year'];
	$branch=$_POST['br'];
	$sem=$_POST['sem'];
	$sub=$_POST['subject'];
	
	
	 
	 
	
	
  
	

	if( $branch=="select" ||$year=="select" ||$sem=="select" || $sub=="select")
	{
			
		echo "<script> alert('please select required fields'); </script>";
		exit();
		
}
      
	
	
	$table_name="$year"."_"."$sem"."_"."$branch"."_"."$sub";
	
	echo $table_name;
	$_SESSION['tname']=$table_name;	
	
	
	$_SESSION['subject']=$sub;
	
	header("location:quesbank.php");
	
	

	 
		}
		

	
if(isset($_POST['back'])){
	header("location:create.php");
}

     ?>


</body>
</html>
