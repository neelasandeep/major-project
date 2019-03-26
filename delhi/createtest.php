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
     <tr><td><b>UNIT_NAME</b><br><br></td> 
<td><b>:</b><select name="tname" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['tname'])){ echo $_POST['tname'];}else { echo "select";} ?> </option>

<option value="UNIT-1">UNIT-1</option>
<option value="UNIT-2">UNIT-2</option>
<option value="UNIT-3">UNIT-3</option>
<option value="UNIT-4">UNIT-4</option>
<option value="UNIT-5">UNIT-5</option>
</select><br/><br></td></tr>
 
</select>
<br><br></td></tr>


<tr><td><button name="btn1" style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Start</button> </td>  <td> <button name="back" style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Back</button> </td></tr>
</table>
</form>
</div>

<?php


	
if(isset($_POST['btn1'])){


$tname=$_POST['tname'];
	$year=$_POST['year'];
	$branch=$_POST['br'];
	$sem=$_POST['sem'];
	$sub=$_POST['subject'];
	
	
	 
	 
	$sql1="SELECT  * FROM testdetails WHERE USER_ID='$username' AND YEAR='$year' AND BRANCH='$branch' AND SEM='$sem' AND SUBJECT='$sub'AND UNIT_NAME='$tname';";
	$sql1=mysqli_query($db,$sql1);
	$nor=mysqli_num_rows($sql1);
	
  
	

	if($tname=="select" || $branch=="select" ||$year=="select" ||$sem=="select" || $sub=="select")
	{
			
		echo "<script> alert('please select required fields'); </script>";
		exit();
		
}
      
	$data=mysqli_fetch_array($sql1);
   if( $data['USER_ID']==$username)
		{
	echo "<script> alert('This test already created');</script>";
	exit();
		}else{
			echo $username;
			$status="false";
			$qry="INSERT INTO `testdetails`( `USER_ID`, `UNIT_NAME`, `SUBJECT`, `YEAR`, `SEM`, `BRANCH`) VALUES ('$username','$tname','$sub','$year','$sem','$branch')";
	$qry=mysqli_query($db,$qry);
	
	$obj="obj";
	
	$table_name="$year"."_"."$sem"."_"."$branch"."_"."$sub"."_"."$tname";
	$table_name1="$year"."_"."$sem"."_"."$branch"."_"."$sub"."_"."$tname".""."$obj";
	echo $table_name;
	$_SESSION['tname']=$table_name;	
	$_SESSION['tname1']=$table_name1;	
	$_SESSION['uname']=$tname;
	$_SESSION['subject']=$sub;
	$que="CREATE TABLE `smindia`.`$table_name` ( `SNO` INT(50) NOT NULL AUTO_INCREMENT , `QUESTION` VARCHAR(100) NOT NULL , `WEIGHTAGE` INT(5) NOT NULL , `USER_ID` VARCHAR(50) NOT NULL , PRIMARY KEY (`SNO`)) ENGINE = InnoDB;"; 
	$que1="CREATE TABLE `smindia`.`$table_name1` ( `SNO` INT(50) NOT NULL AUTO_INCREMENT , `QUESTION` VARCHAR(50) NOT NULL , `OPTION-A` VARCHAR(20) NOT NULL , `OPTION-B` VARCHAR(20) NOT NULL , `OPTION-C` VARCHAR(20) NOT NULL , `OPTION-D` VARCHAR(20) NOT NULL , `CORRECT_ANS` VARCHAR(20) NOT NULL , PRIMARY KEY (`SNO`)) ENGINE = InnoDB;"; 
	$sql=mysqli_query($db,$que);
	$sql=mysqli_query($db,$que1);
	header("location:select1.php");
	
	

	 
		}
		
}
	
if(isset($_POST['back'])){
	header("location:create.php");
}

     ?>


</body>
</html>
