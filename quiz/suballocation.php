<html>
<head>
<title>admin panel</title>
<link rel="stylesheet" type="text/css" href="style1.css"><script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>
<body >
<div id="header"><a class="homered" href="index.html"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a>
<center><img src="administrator.png" id="adminlogo"><br> This is Admin Panel,please proceed with caution
</div>

<div id="sidebar">

<ul>
<li> <a href="adminstudent.php" target="blank">Student registration</a></li>
<li> <a href="suballocation.php" target="blank">subject allocation</a></li>
<li><a href="search.php" target="blanck">Search</a></li>
<li><a href="adminlogin.php"target="blanck">Logout</a></li>
                     
</ul>

</div>
<div id="data">
	<b style="font-size: 30px;">SUBJECT ALLOCATION</b> <br><br>
<form action="" method="post"><table style="padding:  0px 200px 10px 400px">
<tr><td><b>USER_ID &nbsp&nbsp&nbsp </b><br><br></td>
<td><select name="user_id"> 
<option value=""> ----</option> 
 <option value="<?php if(isset($_POST['user_id'])){ echo $_POST['user_id'];}?>" selected> <?php if(isset($_POST['user_id'])){ echo $_POST['user_id'];}?> </option>

<?php
$db=mysqli_connect("localhost","root","","subjects");
	
	$sql="SELECT  USER_ID FROM fdetails ;";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php  echo $data['USER_ID'];?>"> <?php  echo $data['USER_ID']; ?> </option>
        <?php }

     ?>
	 
</select><br/><br></td></tr>
<tr><td><b>YEAR</b> <br><br></td>
<td><select name="yr"> 
<option value=""> ----</option> 
<option value="<?php if(isset($_POST['yr'])){ echo $_POST['yr'];}?>" selected> <?php if(isset($_POST['yr'])){ echo $_POST['yr'];}?> </option>
<option value="I">I </option>
<option value="II">II </option>
<option value="III">III</option>
<option value="IV">IV</option>

</select><br/><br>
<tr><td><b>SEMISTER  </b><br><br></td>
<td><select name="sem"> 
 <option value="">---- </option> 
 <option value="<?php if(isset($_POST['sem'])){ echo $_POST['sem'];}?>" selected> <?php if(isset($_POST['sem'])){ echo $_POST['sem'];}?> </option>
<option value="I">I </option>
<option value="II">II </option>
</select><br/><br></td></tr>
<tr><td><b>BRANCH</b><br><br></td>
<td><select name="br" onchange="this.form.submit()" >
 <option > ---- </option>
 <option value="<?php if(isset($_POST['br'])){ echo $_POST['br'];}?>" selected> <?php if(isset($_POST['br'])){ echo $_POST['br'];}?> </option>
<option value="CSE">CSE </option>
<option value="EEE">EEE </option>
<option value="CIVIL">CIVIL</option>
<option value="ECE">ECE</option> 
<option value="IT">IT</option>
<option value="MECH">MECH</option>

</select><br/><br></td></tr>
<tr><td><b>SECTION </b></td>
<td><select name="sec"> 
<option value=""> ----</option> 
<option value="<?php if(isset($_POST['sec'])){ echo $_POST['sec'];}?>" selected> <?php if(isset($_POST['sec'])){ echo $_POST['sec'];}?> </option>
<option value="A">A</option>
<option value="B">B </option>
<option value="C">C</option>
<option value="D">D</option>

</select><br/><br></td></tr>
<tr><td><b>SUBJECT </b></td>
<td><select name="subject"  > 
       <option value=""> ----</option> 
    
<?php
if(isset($_POST['br'])){
	
$year=$_POST['yr'];
	$sem=$_POST['sem'];
	$branch=$_POST['br'];
	$sql="SELECT  SUBJECT FROM sub WHERE YEAR='$year' AND SEMISTER='$sem' AND BRANCH='$branch';";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php  echo $data['SUBJECT'];?>"> <?php  echo $data['SUBJECT']; ?> </option>
        <?php }
}
     ?>
</select>
<br><br></td></tr>
<tr align="center"><td ><button name="bt1">Submit</button></td></tr>
</table>

</form>
<?php

$db=mysqli_connect("localhost","root","","subjects");

	if(isset($_POST['bt1'])){
	
	$sql1="SELECT  * FROM suballocation ;";
	$sql1=mysqli_query($db,$sql1);
	
         
			 $user_id=$_POST['user_id'];
$section=$_POST['sec'];
$subject=$_POST['subject'];
$year=$_POST['yr'];
	$sem=$_POST['sem'];
	$branch=$_POST['br'];
	     if($user_id== "" || $year=="" ||$sem=="" ||$branch==""||$section=="" ||$subject==""){
			echo "<script> alert('please insert above fields');</script>"; 
		 exit();}
         while($data=mysqli_fetch_array($sql1)){	
		if( ($data['USER_ID']==$user_id || $data['YEAR']==$year || $data['SEMISTER']==$sem || $data['BRANCH']==$branch) && ($data['SECTION']==$section && $data['SUBJECT']==$subject))
		{
	echo "<script> alert('faculty already registered');</script>";
		exit();
		 }	}

$que="INSERT INTO `suballocation`(`USER_ID`, `YEAR`, `SEMISTER`, `BRANCH`, `SECTION`, `SUBJECT`) VALUES ('$user_id','$year','$sem','$branch','$section','$subject');";
$que=mysqli_query($db,$que);
	}
	
?>

</body>
</html>