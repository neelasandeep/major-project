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
    <tr><td><b>Answer the following questions </b></td></tr>
<?php

$tbname1=$tbname."_"."unit-2";

$sa="SELECT * FROM `$tbname1` WHERE `WEIGHTAGE`=2 ORDER BY RAND() LIMIT 5";

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
if($i>2)break;
  }
$tbname2=$tbname."_"."unit-3"; 

$sa1="SELECT * FROM `$tbname2` WHERE `WEIGHTAGE`=2 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$k=3;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $k; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> </td> <td>(<?php echo $data['WEIGHTAGE']; ?>m) </td></tr>
</table> 
</form>
</div>  
<?php 
$k++;
if($k>5)break;
  
}
$tbname3=$tbname."_"."unit-4"; 

$sa1="SELECT * FROM `$tbname3` WHERE `WEIGHTAGE`=2 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$l=6;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $l; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> </td><td> (<?php echo $data['WEIGHTAGE']; ?>m) </td></tr>
</table> 
</form>
</div>  
<?php 
$l++;
if($l>8)break;
  
}
$tbname4=$tbname."_"."unit-5"; 

$sa1="SELECT * FROM `$tbname4` WHERE `WEIGHTAGE`=2 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$l=9;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $l; ?>
&nbsp <?php echo $data['QUESTION']  ; ?>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (<?php echo $data['WEIGHTAGE']; ?>m)</td></tr>
</table> 
</form>
</div>  
<?php 
$l++;
if($l>9)break;
  
}
$tbname5=$tbname."_"."unit-1"; 

$sa1="SELECT * FROM `$tbname5`  WHERE `WEIGHTAGE`=2 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$l=10;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $l; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(<?php echo $data['WEIGHTAGE']; ?>m)</td></tr>
</table> 
</form>
</div>  
<?php 
$l++;
if($l>10)break;
  
}?>
<div align="center">SECTION-B</div>
<div ><b>ANSWER ANY 8 QUESTIONS</b></div>
<?php

$tbname1=$tbname."_"."unit-2";

$sa="SELECT * FROM `$tbname1` WHERE `WEIGHTAGE`=10 ORDER BY RAND() LIMIT 5";

$i=11;


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
if($i>11)break;
  }
$tbname2=$tbname."_"."unit-3"; 

$sa1="SELECT * FROM `$tbname2` WHERE `WEIGHTAGE`=10 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$k=12;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $k; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (<?php echo $data['WEIGHTAGE']; ?>m) </td></tr>
</table> 
</form>
</div>  
<?php 
$k++;
if($k>12)break;
  
}
$tbname3=$tbname."_"."unit-4"; 

$sa1="SELECT * FROM `$tbname3` WHERE `WEIGHTAGE`=10 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$l=13;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $l; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (<?php echo $data['WEIGHTAGE']; ?>m) </td></tr>
</table> 
</form>
</div>  
<?php 
$l++;
if($l>13)break;
  
}
$tbname4=$tbname."_"."unit-5"; 

$sa1="SELECT * FROM `$tbname4` WHERE `WEIGHTAGE`=10 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$l=14;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $l; ?>
&nbsp <?php echo $data['QUESTION']  ; ?>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (<?php echo $data['WEIGHTAGE']; ?>m)</td></tr>
</table> 
</form>
</div>  
<?php 
$l++;
if($l>16)break;
  
}
$tbname5=$tbname."_"."unit-1"; 

$sa1="SELECT * FROM `$tbname5`  WHERE `WEIGHTAGE`=10 ORDER BY RAND() LIMIT 5";
$record1=mysqli_query($db,$sa1);
$l=16;
while($data= mysqli_fetch_array($record1)){
?>
<div>
<tr><td><table><tr><td><?php echo $l; ?>
&nbsp <?php echo $data['QUESTION']  ; ?> &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(<?php echo $data['WEIGHTAGE']; ?>m)</td></tr>
</table> 
</form>
</div>  
<?php 
$l++;
if($l>20)break;
  
}

?>
</body>
</html>














