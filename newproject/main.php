
<?php
session_start();


$name=$_SESSION['name'];
$mobile=$_SESSION['pwd'];
$pincode=$_SESSION['pin'];






?> 
<html>
<head>
<title>main page</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type = "text/javascript" >
     function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body align="center">
	<header>
          <nav class="navbar navbar-inverse">
  
    <ul class="nav navbar-nav">
      <li class="active"><a href="main.php"><span class="glyphicon glyphicon-home"></span></a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="entrance.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav> 
        </header>
        <div class="divider"></div>
         <div class="tab"> 
<form action="" method="post">


<table align="center" >
<tr><td><button type="submit" name="electricity" class="btn btn-primary" style="width:150px;height:40px;">Electricity</button></td><td></td>
    <td><button type="submit" name="transport" class="btn btn-success" style="width:150px;height:40px;">Transport</button><br> </td></tr><br><tr></tr>
 <tr><td><button type="submit" name="water" class="btn btn-danger" style="width:150px;height:40px;">Water</button> </td><td></td>
<td><button type="submit" name="fagri" class="btn btn-warning" style="width:150px;height:40px;">Food & Agriculture</button> </td></tr><tr></tr>
<tr><td><button type="submit" name="other" class="btn btn-primary" style="width:150px;height:40px;">Others</button> </td></td></tr>
</table>
</form>
</div>
<div class="fwimage" >
   
<?php 
if(isset($_POST['electricity']))
{
header("location:Electricity.php");
}
?>
<?php 
if(isset($_POST['transport']))
{
header("location:transport.php");
}
if(isset($_POST['water'])){

header("location:water.php");
}

if(isset($_POST['fagri'])){

header("location:fagri.php");
}
?>
	 </div>
</body>







</html>