 

 <html>
    <head>
      <title> otp verify </title>
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
    <body >

      <header>
           <nav class="navbar navbar-inverse">
  
    <ul class="nav navbar-nav">
      <li class="active"><a href="OTP_verify.php"><span class="glyphicon glyphicon-home"></span></a></li>
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
        </header>
        

       <div class="fwimage1">
        <div class="tab1">
             <form method="post" action="">
            <table align="center">
               
                <tr>
                    <td></td>
                    <td><input type="text" name="otp" placeholder="enter otp" class="form-control"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="verify" value="verify otp" style="width:150px;height:40px;border-radius:50px;border:3px solid green;shadow:10px 10px 10px grey;"
  ></td>
                </tr>
                
            </table>
        </form>
        </div>
             </div>
              </body>
</html>
       

<?php 

session_start();
$name=$_SESSION['name'];
$mobile=$_SESSION['mobile'];
if(isset($_POST['verify'])){
  $userotp=$_POST['otp'];
  if($userotp==$_SESSION['otp']){
    echo("signup succesful");
   header("location:main.php");
  }else{
    echo("otp wrong");
  }
}
?>

   