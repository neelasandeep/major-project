

<!DOCTYPE html>
<html>
<head>
	<title>del test</title>
</head>
<body>
<div id="data">

<table border="2">
<tr>
<th>SNO</th>
<th>STAKE_HOLDER</th>

<th>edit</th>

</tr>
<?php
session_start();
$db=mysqli_connect("localhost","root","","smindia");



$sa="SELECT * FROM `stakeholders`";
$record=mysqli_query($db,$sa);

while($data=mysqli_fetch_array($record))
{
?>
<tr>
    <td><?php echo $data['SNO'];?></td>
	<td><?php echo $data['EMAIL_ID'];?></td>
	
	 <?php $_SESSION['name']= $data['EMAIL_ID'];?>
	
	<td><a href="del2.php?sno=<?php echo $data['SNO'];?>">del </a></td>
	</tr>
	
<?php	
}

?>

</table><div style="padding: 5px 100px 0px 250px;"> <a href="admin.php">back</a></div>





</div>

</body>
</html>
      