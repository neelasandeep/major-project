
<?php  
error_reporting(0);
session_start();


$db=mysqli_connect("localhost","root","","smindia");
$id=$_GET['sno'];

$usaename=$_SESSION['login_user'];
$tbl=$_SESSION['tname'];
$sa="SELECT * FROM `$tbl` WHERE SNO='$id'";
$record=mysqli_query($db,$sa);

while($data=mysqli_fetch_array($record))
{
    $que=$data['QUESTION'];
}

echo $tbl;
echo $que;
$del="DELETE *FROM `$tabl` WHERE SNO='$id'";
$del=mysqli_query($db,$del);
$del1="DELETE *FROM `admindb` WHERE STAKE_HOLDER='$usaename'AND QUESTION='$que'";
$del1=mysqli_query($db,$del1);
if(!$del){
	echo "not deleted";
}elseif (!$del1) {
	echo "not deloeted in admin";
}else{
	echo "deleted";
}
#header("location:qsearch1.php");



?>