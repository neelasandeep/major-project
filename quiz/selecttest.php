<?php
session_start();

$db=mysqli_connect("localhost","root","","subjects");
$username=$_SESSION['login_user'];
if(!$db)
{
	echo "not connected";
}

$qu="SELECT * FROM `students_login` WHERE HALL_TICKET='$username';";
	  $qu=mysqli_query($db,$qu);
	  $data1=mysqli_fetch_array($qu);
	  $year=$data1['YEAR'];
	  $semister=$data1['SEMISTER'];
	  $branch=$data1['BRANCH'];
	  $section=$data1['SECTION'];
	  
?>
<html>
<head>
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
    			<h1>Online quiz</h1>
    			<ul id="nav">
    				<li>Your knowladge makes you achiever</li>
    				<li><a class="homeblack" href="#" style="color: green;">Contact</a></li>
    			</ul>		
    		</nav>
    	</header>
    	<div class="divider"></div>
<h1 align="center">SELECT TEST</h1>
<form action="" method="post" >
	<table align="center">
<tr><td><b>SUBJECT</b><br><br></td>

<td><b>:</b><select name="subject"  onchange="this.form.submit()" > 
       <option > <?php if(isset($_POST['subject'])){ echo $_POST['subject'];}else { echo "select";} ?> </option> 
    
<?php
      
	  echo $username;
	$sql="SELECT SUBJECT FROM `testdetails` WHERE YEAR='$year' AND SEMISTER='$semister' AND BRANCH='$branch' AND SECTION='$section';";
	$sql=mysqli_query($db,$sql);
	if(!$sql){
		echo "not ins";
		}
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	               
               <option value="<?php echo $data['SUBJECT']; ?>"> <?php  echo $data['SUBJECT'];?> </option>
        <?php }

     ?>
</select><br><br></td></tr>

     
	 <tr><td><b>TEST NAME </b></td>

<td><b>:</b><select name="t_name" onchange="this.form.submit()"  > 
<option > <?php if(isset($_POST['t_name'])){ echo $_POST['t_name'];}else { echo "select";} ?> </option> 
<?php

$subject=$_POST['subject'];

	$sql="SELECT TEST_NAME FROM testdetails WHERE BRANCH='$branch' AND SUBJECT='$subject' AND SECTION='$section' AND STATUS='true'";
	$sql=mysqli_query($db,$sql);
	if(!$sql){
		echo "<script>alert('not ins');</script>" or die($sql);
	}
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php echo $data['TEST_NAME'];?>" > <?php  echo $data['TEST_NAME']; ?> </option>
        <?php }
 $tname=$_POST['t_name'];
     ?>
	      
</select><br>
</td></tr>

</table><br><br>
<button name="btnn" >start</button>
</form>
<?php
if(isset($_POST['btnn'])){
	
	$tblname=$year."_".$semister."_".$branch."_".$section."_".$subject."_".$tname;
		$_SESSION['name']=$tblname;
		$_SESSION['subject']=$subject;
		$_SESSION['tname']=$tname;
	header("location:questionpaper.php");

	}
?>

</body>
</html>





