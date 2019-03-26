
<?php


$db=mysqli_connect("localhost","root","","project1");


if(!$db)
{
	echo "not connected";
}




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
      <li class="active"><a href="OTP_send.php"><span class="glyphicon glyphicon-home"></span></a></li>
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
  <div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" name="name" class="form-control" id="usr">
</div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pwd" class="form-control" id="pwd">
  </div>
  <div class="dropdown">
                
                
                 <select name="pincode"  class="btn btn-primary dropdown-toggle"> 
                  <option > <?php if(isset($_POST['prob'])){ echo $_POST['prob'];}else { echo "Select";} ?> </option>
                  <option value="501359">501359</option>
                  <option value="501218">501218</option>
                  <option value="501506">501506</option>
                  <option value="509325">509325</option>
                  <option value="500029 ">500029 </option>
                   <option value="500003 ">500003 </option>
                    <option value="500029 ">500009 </option>
                  </select><br><br>
                   
                
              </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form> 
</div>
<div class="fwimage" >
   
<?php 
if(isset($_POST['submit']))
{
  session_start();
  $_SESSION['name']=$_POST['name'];
$_SESSION['pwd']=$_POST['pwd'];
$_SESSION['pin']=$_POST['pincode'];
header("location:main.php");
}
?>

	 </div>
</body>







</html>