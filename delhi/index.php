 

 <html>
    <head>
      <title> CROWD SOURCING </title>
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
        <div class="divider"></div>

       <div class="fwimage">
           <h2 class="homesubline">WELCOME TO  </h2>
           <h1 class="homewhe"> THE QUESTION WORLD</h1>
           <h1 class="homepeo">GATHER</h1>
           <br>
           <div class="btn" align="center" style=" padding:250px 200px 10px 200px;">
           <form action="" method="post">
            <input type="Submit"  name="register" value="REGISTER" style="width:150px; height:40px;border-radius:50px;border:3px solid #0a0a0a;shadow:10px 10px 10px grey;
                ">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <input type="Submit"  name="signin" value="SIGN IN" style="width:150px; height:40px;border-radius:50px;border:3px solid #0a0a0a;shadow:10px 10px 10px grey;
               "> 
             </form>
             </div>
       </div>

<?php 
if(isset($_POST['register']))
{
header("location:signupform.php");
}
if(isset($_POST['signin'])){

header("location:signin.php");
}?>

    </body>
</html>