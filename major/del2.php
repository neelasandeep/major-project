
<!DOCTYPE html>
<html>
<head>
	<title>del</title>
</head>
<body>
<?php
session_start();

$db=mysqli_connect("localhost","root","","smindia");
$user=$_SESSION['name'];
echo $user;

$del="DELETE * FROM `testdetails` WHERE USER_ID='$user'";
$del=mysqli_query($db,$del);
if(!$del){
	echo "not deleted";
}else{
	echo "deleted";
}
#header("location:stakelist.php");

?>
</body>
</html>