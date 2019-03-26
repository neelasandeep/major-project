<?php
session_start();
$username=$_SESSION['user_id'];
$db=mysqli_connect("localhost","root","","subjects");

if(!$db)
{
	echo "not connected";
}




?> 
<html>
<head>
	<title>create test</title>
	<link rel="stylesheet" type="text/css" href="style.css"></head>
<body align="center"><header>
    		<nav>
    			<h1>Online Quiz</h1>
    			<ul id="nav">
    				<li><a class="homered" href="index.html">HOME</a></li>
    				<li><a class="homeblack" href="facultylogin.php">faculty</a></li>
    				<li><a class="homeblack" href="#">Contact</a></li>
    			</ul>		
    		</nav>
    	</header>
    	<div class="divider"></div>

<form action="" method="post">

<table   style="padding: 5px 200px 0px 200px;">


<tr><td><b>TEST_NAME</b><br><br></td> 
<td><b>:</b><select name="tname" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['tname'])){ echo $_POST['tname'];}else { echo "select";} ?> </option>

<option value="UNIT-1">UNIT-1</option>
<option value="UNIT-2">UNIT-2</option>
<option value="UNIT-3">UNIT-3</option>
<option value="UNIT-4">UNIT-4</option>
<option value="UNIT-5">UNIT-5</option>
</select><br/><br></td></tr>


<tr><td><b>SUBJECT &nbsp&nbsp&nbsp </b><br><br></td>

<td><b>:</b><select name="subject"  onchange="this.form.submit()"> 
       <option > <?php if(isset($_POST['subject'])){ echo $_POST['subject'];}else { echo "select";} ?> </option> 
    
<?php
if(isset($_POST['tname'])){

	$sql="SELECT  SUBJECT FROM `suballocation` WHERE USER_ID='$username';";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	               
               <option value="<?php  echo $data['SUBJECT'];?>"> <?php  echo $data['SUBJECT'];?> </option>
        <?php }
}$sub=$_POST['subject'];
     ?>
</select>
<br><br></td></tr>
<tr><td><b>BRANCH &nbsp&nbsp&nbsp </b><br><br></td>

<td><b>:</b><select name="br"  onchange="this.form.submit()" > 
        <option > <?php if(isset($_POST['br'])){ echo $_POST['br'];}else { echo "select";} ?> </option> 
    
<?php
if(isset($_POST['subject'])){
	
$sub=$_POST['subject'];
	$sql="SELECT  BRANCH FROM `suballocation` WHERE  USER_ID='$username' AND SUBJECT='$sub' ;";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php echo $data['BRANCH'];?>"> <?php  echo $data['BRANCH']; ?> </option>
			    
        <?php }
}
     ?>
	 
</select>
<br><br></td></tr>


<tr><td><b>SECTION &nbsp&nbsp&nbsp </b><br><br></td>

<td><b>:</b><select name="sec" onchange="this.form.submit()" > 
        <option > <?php if(isset($_POST['sec'])){ echo $_POST['sec'];}else { echo "select";} ?> </option> 
    
<?php
if(isset($_POST['br'])){
	
$branch=$_POST['br'];
	$sub=$_POST['subject'];
	$sql="SELECT  SECTION FROM `suballocation` WHERE  SUBJECT='$sub' AND USER_ID='$username' AND BRANCH='$branch';";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	
	 
               <option value="<?php echo $data['SECTION'];?>"> <?php  echo $data['SECTION']; ?> </option>
        
	   <?php }
}
     ?>
	 
</select>
<br><br>
</td></tr>
</table>
<button name="btn1">Start</button> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <button name="back">Back</button> 
</form>
<?php


	
if(isset($_POST['btn1'])){


$tname=$_POST['tname'];
	$section=$_POST['sec'];
	$branch=$_POST['br'];
	
	$sub=$_POST['subject'];
	
	$sqll="SELECT * FROM `suballocation` WHERE BRANCH='$branch' AND SUBJECT='$sub' AND SECTION='$section' AND USER_ID='$username';";
     $sqll=mysqli_query($db,$sqll);
	 $data=mysqli_fetch_array($sqll);
	 $year=$data['YEAR'];
	 $semister=$data['SEMISTER'];
	 
	 
	$sql1="SELECT  * FROM testdetails WHERE USER_ID='$username' AND YEAR='$year' AND BRANCH='$branch' AND SEMISTER='$semister' AND SECTION='$section'AND TEST_NAME='$tname';";
	$sql1=mysqli_query($db,$sql1);
	$nor=mysqli_num_rows($sql1);
	
  
	

	if($tname=="" || $branch=="" || $section=="" || $sub=="")
	{
			
		echo "<script> alert('please select required fields'); </script>";
		exit();
		
}
      
	$data=mysqli_fetch_array($sql1);
   if( $data['TEST_NAME']==$tname || $data['YEAR']==$year || $data['SEMISTER']==$semister || $data['BRANCH']==$branch || $data['SECTION']==$section || $data['SUBJECT']==$sub)
		{
	echo "<script> alert('This test already created');</script>";
	exit();
		}else{
			echo $username;
			$status="false";
			$qry="INSERT INTO `testdetails`(`USER_ID`,`TEST_NAME`, `YEAR`, `SEMISTER`, `BRANCH`, `SECTION`, `SUBJECT`,`STATUS`,`COMPLETED`)
			VALUES ('$username','$tname','$year','$semister','$branch','$section','$sub','$status','$status');";
	$qry=mysqli_query($db,$qry);
	
	
	
	$table_name="$year"."_"."$semister"."_"."$branch"."_"."$section"."_"."$sub"."_"."$tname";
	echo $table_name;
	$_SESSION['tname']=$table_name;	
	$que="CREATE TABLE `subjects`.`$table_name` ( `SNO` INT(100) NOT NULL AUTO_INCREMENT , `QUESTION` VARCHAR(100) NOT NULL , `OPTION-A` VARCHAR(30) NOT NULL , `OPTION-B` VARCHAR(30) NOT NULL , `OPTION-C` VARCHAR(30) NOT NULL , `OPTION-D` VARCHAR(30) NOT NULL , `CORRECT_ANS` VARCHAR(30) NOT NULL , PRIMARY KEY (`SNO`)) ENGINE = InnoDB;"; 
	$sql=mysqli_query($db,$que);
	header("location:createquestion.php");
	
	

	 
		}
		
}
	
if(isset($_POST['back'])){
	header("location:create.php");
}

     ?>

</body>
</html>
