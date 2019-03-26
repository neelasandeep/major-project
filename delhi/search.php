<html>
<head>
<title>search panel</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>
<body>



<div id="data">
<?php
error_reporting(0);
$db=mysqli_connect("localhost","root","","smindia");
?>
<form method="POST" action=""  >
<br><br><br><br> <center><input type="text" name="id" placeholder="enter email" required>
 <input type="submit" name="submit" value="search"></center>
</form>
<table border="2" align="center" >
<tr>
<th>SNO</th>
<th>USER_ID</th>
<th>UNIT_NAME</th>
<th>SUBJECT</th>

<th>YEAR</th>

<th>SEMISTER</th>
<th>BRANCH</th>
</tr>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	
$sa="SELECT * FROM `testdetails` WHERE USER_ID='$id'";
$record=mysqli_query($db,$sa);
}
while($data=mysqli_fetch_array($record))
{
?>
<tr>
    <td><?php echo $data['SNO'];?></td>
	<td><?php echo $data['USER_ID'];?></td>
	<td><?php echo $data['UNIT_NAME'];?></td>
	<td><?php echo $data['SUBJECT'];?></td>
	
	<td><?php echo $data['YEAR'];?></td>
	
	<td><?php echo $data['SEM'];?></td>
	<td><?php echo $data['BRANCH'];?></td>
	</tr>
<?php	
}
?>
</table>
<div style="padding: 5px 100px 0px 250px;"><a href="admin.php">back</a></div>
</div>


</body>
</html>