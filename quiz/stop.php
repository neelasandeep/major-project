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
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body align="center">
	<header>
        <nav>
          <h1>Online quiz</h1>
          <ul id="nav">
            <li><a class="homered" href="index.html">HOME</a></li>
            <li><a class="homeblack" href="#">Contact</a></li>
          </ul>   
        </nav>
      </header>
      <div class="divider"></div>

<form action="" method="post" >



<table style="padding: 5px 200px 0px 280px;">



<tr><td><b>SUBJECT &nbsp&nbsp&nbsp </b><br><br></td>

<td><select name="subject"  onchange="this.form.submit()"> 
       <option > <?php if(isset($_POST['subject'])){ echo $_POST['subject'];}else { echo "select";} ?> </option> 
    
<?php


	$sql="SELECT  SUBJECT FROM `suballocation` WHERE USER_ID='$username';";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	               
               <option value="<?php  echo $data['SUBJECT'];?>"> <?php  echo $data['SUBJECT'];?> </option>
        <?php }
$sub=$_POST['subject'];
     ?>
</select>
<br><br></td></tr>

                
	    
	 








<tr><td><b>BRANCH &nbsp&nbsp&nbsp </b><br><br></td>

<td><select name="br"  onchange="this.form.submit()" > 
        <option > <?php if(isset($_POST['br'])){ echo $_POST['br'];}else { echo "select";} ?> </option> 
    
<?php
if(isset($_POST['subject'])){
	
$sub=$_POST['subject'];
	$sql="SELECT  BRANCH FROM `suballocation` WHERE  USER_ID='$username' AND SUBJECT='$sub' ;";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php  echo $data['BRANCH'];?>"> <?php  echo $data['BRANCH']; ?> </option>
			    
        <?php }
}
     ?>
	 
</select>
<br><br></td></tr>


<tr><td><b>SECTION &nbsp&nbsp&nbsp </b><br><br></td>



<td><select name="sec" onchange="this.form.submit()" > 
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
<br><br></td></tr>





<td><b>TEST NAME &nbsp&nbsp&nbsp </b><br><br></td>

<td><select name="t_name"  onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['t_name'])){ echo $_POST['t_name'];}else { echo "select";} ?> </option> 
<?php
if(isset($_POST['sec'])){
$branch=$_POST['br'];
$section=$_POST['sec'];
$status="true";
	$sql="SELECT  TEST_NAME FROM `testdetails` WHERE  USER_ID='$username' AND SUBJECT='$sub' AND SECTION='$section' AND BRANCH='$branch'AND STATUS='$status';";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php echo $data['TEST_NAME'];?>" > <?php  echo $data['TEST_NAME']; ?> </option>
        <?php }
} 
     ?>
	      
</select>
<br><br></td></tr>
</table>

<button name="btn1">Stop</button> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <button name="back">Back</button> 
</form>
<?php


	
if(isset($_POST['btn1'])){



	$tname=$_POST['t_name'];
$subject=$_POST['subject'];
	
	$branch=$_POST['br'];
	
  $section=$_POST['sec'];	
	echo $tname;
	echo $branch;
	echo $section;
	echo $subject;
	$exam=$tname."_".$branch."_".$section."_".$subject;

	if($tname=="" || $branch=="" || $section=="" || $subject=="")
	{
			
		echo "<script> alert('please select required fields'); </script>";
		exit();
		
} 
      
	else{
	$sqll="SELECT * FROM `testdetails` WHERE BRANCH='$branch' AND SUBJECT='$sub' AND SECTION='$section' AND USER_ID='$username' AND TEST_NAME='$tname';";
     $sqll=mysqli_query($db,$sqll);
	 $data=mysqli_fetch_array($sqll);
	 $year=$data['YEAR'];
	 $semister=$data['SEMISTER'];
	
	$query="UPDATE `testdetails` SET `STATUS`='false' WHERE USER_ID='$username' AND BRANCH='$branch' AND SUBJECT='$subject' AND SECTION='$section' AND TEST_NAME='$tname'";
	$que=mysqli_query($db,$query);
	echo $exam."stopped sucessfully";
	
	
	$query="UPDATE `students_login` SET `STATUS`='false' WHERE BRANCH='$branch' AND YEAR='$year' AND SEMISTER='$semister' AND SECTION='$section'";
	$que=mysqli_query($db,$query);
	
	
	
	
	
	} 
				
}
	
if(isset($_POST['back'])){
	header("location:create.php");
}

	
     ?>

</body>
</html>
