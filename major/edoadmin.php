

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="data">

<table border="2">
<tr>
<th>SNO</th>
<th>QUESTION</th>
<th>WEIGHTAGE</th>
<th>edit</th>
<th>del</th>
</tr>
<?php
session_start();
$db=mysqli_connect("localhost","root","","smindia");


$tbl=$_SESSION['tname'];
$sa="SELECT * FROM `$tbl` WHERE USER_ID='$username'";
$record=mysqli_query($db,$sa);

while($data=mysqli_fetch_array($record))
{
?>
<tr>
    <td><?php echo $data['SNO'];?></td>
	<td><?php echo $data['QUESTION'];?></td>
	<td><?php echo $data['WEIGHTAGE'];?></td>
	
	<td><a href="edit1.php?sno=<?php echo $data['SNO'];?>">edit</a></td>
	<td><a href="del.php?sno=<?php echo $data['SNO'];?>">del </a></td>
	</tr>
	
<?php	
}

?>

</table><div style="padding: 5px 100px 0px 250px;"><a href="review.php">back</a></div>





</div>

</body>
</html>
      