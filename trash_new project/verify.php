 

 <html>
    <head>
      <title> otp verify </title>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body >

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
        

       <div class="fwimage">
             <form method="post" action="">
            <table align="center">
               
                <tr>
                    <td></td>
                    <td><input type="text" name="otp" placeholder="enter otp"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="verify" value="verify otp"></td>
                </tr>
                
            </table>
        </form>
             </div>
              </body>
</html>
       

<?php 

session_start();

if(isset($_POST['verify'])){
  $userotp=$_POST['otp'];
  if($userotp==$_SESSION['otp']){
    echo("signup succesful");
   header("location:start1.php");
  }else{
    echo("otp wrong");
  }
}
?>

   