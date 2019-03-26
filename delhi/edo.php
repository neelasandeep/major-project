

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body style="background-image: url(back1.jpg); background-repeat: no-repeat; background-size: cover; ">
	<header>
            <nav>
                <ul>
                <li><a class="homered" href="index.php"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a></li>
            </ul>
                
                <ul id="nav">
                    
                    <li><a class="homeblack" href="adminlogin.php">ABOUT US</a></li>
                    
                    <li><a class="homeblack" href="#">Contact</a></li>
                </ul>       
            </nav>
        </header>
        <div class="divider"></div>
        <div align="center">DBMS</div>
<div align="center">section-a</div>
	<div style="height: 50px;"></div>


<table border="2" align="center">
<tr>
<th>QNO</th>
<th>QUESTION</th>
<th>WEIGHTAGE</th>
<th>edit</th>
<th>del</th>
</tr>




<?php
session_start();
$db=mysqli_connect("localhost","root","","smindia");
$username=$_SESSION['login_user'];

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

</table><div style="padding: 5px 100px 0px 800px;"><a href="review.php">back</a></div>



</body>
</html>
      