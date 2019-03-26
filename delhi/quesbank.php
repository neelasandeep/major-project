<?php
session_start();

$db=mysqli_connect("localhost","root","","smindia");

$tbname=$_SESSION['tname'];
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
          <h1>About us</h1>
          <ul id="nav">
            <li style="font-size:18px;"><a  class="homeblack" href="studentlogin.php" >logout</a></li>
            <li style="font-size:18px;"><a class="homeblack" href="#" style="color: green;">Contact</a></li>
          </ul>   
        </nav>
      </header>
      <div class="divider"></div>
<div class="col-xl-8  col-lg-12  col-md-8 col-sm-8 m-auto d-block">

<div align="center" style="font-size: 30px;"><b>DBMS</b></div>
<div align="center">SECTION-A </div><br>



<form action="" method="POST" id="form1" >
  <table align="center">
    <tr><td><b>QUESTIONS:</b></td></tr>
    
<?php

$tbname1=$tbname."_"."unit-2";

$sa="SELECT * FROM `$tbname1`  ORDER BY RAND() LIMIT 13";

$i=1;


$record=mysqli_query($db,$sa);



while($data= mysqli_fetch_array($record)){
?>
<div>
<tr><td><table><tr><td><?php echo $i; ?>
  

&nbsp <?php echo $data['QUESTION']  ; ?>&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (<?php echo $data['WEIGHTAGE']; ?>m) </td></tr>
</table> 
</form>
</div>	
<?php 
$i++;

  }?> <?php
$tbname2=$tbname."_"."unit-3"; 

$sa1="SELECT * FROM `$tbname2`  ORDER BY RAND() LIMIT 9";
$record1=mysqli_query($db,$sa1);

while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $i; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> </td> <td>(<?php echo $data['WEIGHTAGE']; ?>m) </td></tr>
</table> 
</form>
</div>  
<?php 

  $i++;
}?> <?php
$tbname3=$tbname."_"."unit-4"; 

$sa1="SELECT * FROM `$tbname3`  ORDER BY RAND() LIMIT 8";
$record1=mysqli_query($db,$sa1);

while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $i; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> </td><td> (<?php echo $data['WEIGHTAGE']; ?>m) </td></tr>
</table> 
</form>
</div>  
<?php 
$i++;
}?> <?php
$tbname4=$tbname."_"."unit-5"; 

$sa1="SELECT * FROM `$tbname4`  ORDER BY RAND() LIMIT 7";
$record1=mysqli_query($db,$sa1);

while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $i; ?>
&nbsp <?php echo $data['QUESTION']  ; ?>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (<?php echo $data['WEIGHTAGE']; ?>m)</td></tr>
</table> 
</form>
</div>  
<?php 
$i++;
  
}?> <?php
$tbname5=$tbname."_"."unit-1"; 

$sa1="SELECT * FROM `$tbname5`  ORDER BY RAND() LIMIT 13";
$record1=mysqli_query($db,$sa1);

while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $i; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(<?php echo $data['WEIGHTAGE']; ?>m)</td></tr>
</table> 
</form>
</div>  
<?php 
$i++;
}
?>

</body>
</html>

