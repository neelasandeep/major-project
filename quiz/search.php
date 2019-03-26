<html>
<head>
<title>search panel</title>
<link rel="stylesheet" type="text/css" href="style1.css">
<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>
<body>
<div id="header"><a class="homered" href="index.html"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a>
<center><img src="administrator.png" id="adminlogo"><br> This is Admin Panel,please proceed with caution
</div>

<div id="sidebar">

<ul>
<li> <a href="adminstudent.php" target="blank">Add Data</a></li>
<li> <a href="suballocation.php" target="blank">Delete Data</a></li>
<li><a href="search.php" target="blanck">Search</a></li>
<li><a href="adminlogout.php" target="blanck">Logout</a></li>
                     
</ul>

</div>
<div id="data">
<?php
error_reporting(0);
$db=mysqli_connect("localhost","root","","subjects");
?>
<form method="POST" action=""  >
<br><br><br><br> <center><input type="text" name="id" placeholder="enter name/id" required>
 <input type="submit" name="submit" value="search"></center>
</form>
<table border="2" align="center" >
<tr>
<th>SNO</th>
<th>E_MAIL</th>
<th>NAME</th>
<th>HALL_TICKET</th>
<th>PASSWORD</th>
<th>YEAR</th>
<th>SECTION</th>
<th>SEMISTER</th>
<th>BRANCH</th>
</tr>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	
$sa="SELECT * FROM `students_login` WHERE HALL_TICKET='$id'";
$record=mysqli_query($db,$sa);
}
while($data=mysqli_fetch_array($record))
{
?>
<tr>
    <td><?php echo $data['SNO'];?></td>
	<td><?php echo $data['E_MAIL'];?></td>
	<td><?php echo $data['NAME'];?></td>
	<td><?php echo $data['HALL_TICKET'];?></td>
	<td><?php echo $data['PASSWORD'];?></td>
	<td><?php echo $data['YEAR'];?></td>
	<td><?php echo $data['SECTION'];?></td>
	<td><?php echo $data['SEMISTER'];?></td>
	<td><?php echo $data['BRANCH'];?></td>
	</tr>
<?php	
}
?>
</table>

</div>


</body>
</html>