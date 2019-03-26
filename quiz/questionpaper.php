<?php
session_start();

$db=mysqli_connect("localhost","root","","subjects");
$username=$_SESSION['login_user'];
$tbname=$_SESSION['name'];
if(!$db)
{
	echo "not connected";
}


?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type = "text/javascript" >
     



   function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>


<style>
#time{
	text-align:center;
	align:center;
	
}
</style>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center">

<header style="height:60px;">
        <nav>
          <h1>Online quiz</h1>
          <ul id="nav">
            <li style="font-size:18px;"><a  class="homeblack" href="studentlogin.php" >logout</a></li>
            <li style="font-size:18px;"><a class="homeblack" href="#" style="color: green;">Contact</a></li>
          </ul>   
        </nav>
      </header>
      <div class="divider"></div>
<div class="col-xl-8  col-lg-12  col-md-8 col-sm-8 m-auto d-block">


<table align="center">

<form action="result.php" method="POST" id="form1" >
<?php
$sa="SELECT * FROM `$tbname` ";
$i=1;


$record=mysqli_query($db,$sa);
$num=mysqli_num_rows($record);
$_SESSION['num']=$num;
while($data= mysqli_fetch_array($record)){?>
<div>
<tr><td><table><tr><td><?php echo $i; ?>
&nbsp <?php echo $data['QUESTION'] ?> </td></tr><br>
<tr><td><input type="radio" name="quiz[<?php echo $i; ?>]" value="<?php echo $data['OPTION-A'];?>"><?php echo $data['OPTION-A'];?></td></tr><br>
<tr><td><input type="radio" name="quiz[<?php echo $i; ?>]" value="<?php echo $data['OPTION-B'];?>"><?php echo $data['OPTION-B'];?></td></tr><br>
<tr><td><input type="radio" name="quiz[<?php echo $i; ?>]" value="<?php echo $data['OPTION-C'];?>"><?php echo $data['OPTION-C'];?></td></tr><br>
<tr><td><input type="radio" name="quiz[<?php echo $i; ?>]" value="<?php echo $data['OPTION-D'];?>"><?php echo $data['OPTION-D'];?></td></tr><br>    
	</table>  </div>
<?php  $i++;

}
?><br> <br>
<input type="submit" name="submit" value="SUBMIT">
</tr></td></table>
</form>
</div>	
<?php 
if(isset($_POST['submit']))
{
	header("location:result.php");
}
?>
</body>
</html>














