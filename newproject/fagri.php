 






 <html>
    <head>
      <title> Food Agriculture </title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body >
       <style type="text/css">
         .tab2{
    float: right;
  position: relative;
  top: 30%;
 width: 60%;
    
  }
       </style>
      <header>
            <nav class="navbar navbar-inverse">
  
    <ul class="nav navbar-nav">
      <li class="active"><a href="main.php"><span class="glyphicon glyphicon-home"></span></a></li>
      
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
         <div class="divider"></div>
         <div class="tab2"> 
             <form method="post" action="" >
  <div class="form-inline" >
    <i class="glyphicon glyphicon-user"></i>
    
    <input type="email" class="form-control" id="email"  name="email" placeholder="enter email">
  </div><br>
  <div class="dropdown">
  <select name="prob" onchange="this.form.submit()"  class="btn btn-primary dropdown-toggle"> 
<option > <?php if(isset($_POST['prob'])){ echo $_POST['prob'];}else { echo "Frequently asked questions";} ?> </option>

<option value="Ration">Ration</option>
<option value="Pesticides">Pesticides</option>
<option value="Agricultural loans">Agricultural loans </option>
<option value="Water suply">Water suply </option>
<option value="Other">Other</option>
</select></div><br/>
  <div >

  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment" name="txtarea" placeholder="enter your problem description" style="width: 70%;"></textarea>
</div> 
  <br>
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form> 
         </div>

       <div class="fwimage">
        <div class="tab1">
             
        </div>
             </div>

              </body>
</html>

 <?php 
$db=mysqli_connect("localhost","root","","project1");
if(!$db){
  echo "not connected";
}
date_default_timezone_set('Asia/Kolkata');
$dat=date('Y-m-d h:i:s',time());
session_start();

if(isset($_POST['submit'])){
$name=$_SESSION['name'];
$mobile=$_SESSION['pwd'];
$pincode=$_SESSION['pin'];
$email=$_POST['email'];
$prob=$_POST['prob'];
$desc=$_POST['txtarea'];
$ele="food_agriculture";



$insert1="INSERT INTO `problems`( `NAME`, `MOBILE`, `PINCODE`, `EMAIL`, `CATEGERY`, `PROBLEM`, `PROBLEM_DESC`, `TIME`) VALUES ('$name','$mobile','$pincode','$email','$ele','$prob','$desc','$dat')";
$insert=mysqli_query($db,$insert1);
if(!$insert1)
{
   echo "<script>alert(' problem not posted');</script>";
 }
else{

echo "<script>alert('problem  successfully posted ');</script>";

 } 

}

?>      


   