<html>
<head>
<title>admin panel</title>
<link rel="stylesheet" type="text/css" href="style1.css">

<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>
<body >
<div id="header">
	<a class="homered" href="index.html"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
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
	<b style="font-size: 30px;">STUDENT REGISTRATION</b>

<form action="" method="post">
	<table align="center">
<tr><td><b>E-MAIL </b></td> <td><b>:</b><input type="email" name="ename" value="<?php if(isset($_POST['ename'])){ echo $_POST['ename'];}?>" placeholder="e-mail" required></br><br></td></tr>
<tr><td><b> NAME &nbsp </b></td> <td> <b>:</b><input type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>" placeholder="Name" required></br><br></td></tr>
<tr><td><b>HALL TICKET NO </b></td><td><b>:</b> <input type="text" name="id"  value="<?php if(isset($_POST['id'])){ echo $_POST['id'];}?>" placeholder="Hall Ticket Number" required></br> <br></td></tr>
<tr><td><b>PASSWORD </b></td><td><b>:</b><input type="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];}?>"  placeholder="password" required><br><br></td></tr>
<br>
<tr><td><b>YEAR </b> </td>
<td><b>:</b><select name="yr"> 
<option value=""> ----</option> 
<option value="I">I </option>
<option value="II">II </option>
<option value="III">III</option>
<option value="IV">IV</option>

</select><br/><br></td></tr>
<tr><td><b>SEMISTER &nbsp </b></td>
<td><b>:</b><select name="sem"> 
 <option value="">---- </option> 
 <option value="I">I </option>
<option value="II">II </option>
</select><br/><br></td></tr>
<tr><td><b>BRANCH </b></td>
<td><b>:</b><select name="br"  >
 <option > ---- </option>
 <option value="CSE">CSE </option>
<option value="EEE">EEE </option>
<option value="CIVIL">CIVIL</option>
<option value="ECE">ECE</option> 
<option value="IT">IT</option>
<option value="MECH">MECH</option>
<option value="MECH">CIVIL</option>

</select><br/><br></td></tr>
<tr><td><b>SECTION  </b></td>
<td><b>:</b><select name="sec"> 
<option value=""> ----</option> 
<option value="A">A</option>
<option value="B ">B </option>
<option value="C">C</option>
<option value="D">D</option>

</select></td></tr>
<tr align="center"><td ><button name="bt1">Submit</button></td></tr>
</table>
&nbsp &nbsp &nbsp 
</form>
</div>
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