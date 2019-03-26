<?php
session_start();

$db=mysqli_connect("localhost","root","","smindia");

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
        <div class="fwimage" style="background-image: url(back1.jpg); ">

<?php 
$easy=array("what","when","identify","define","update","memorise","list","state","explain","concepts","classify","describe","recognize","identity","locate","where","how","who","expand","briefly","brief","write","give","guess","which"); 
$medium=array("execute","implement","use","solve","differentiate","demonstrate","interpret","operate","schedule","sketch","organize","relate","contrast","distinguish","verify","compare","determine","similarities","distinguish","evaluate");
$difficult=array("appraise","argue","experiment","justify","defend","select","support","value","critic","wait","design","assemble","conjuctive","construct","develop","formulate","author","investigate","prove","conclude","journalise","design","discuss");
$sql="SELECT * FROM `admindb` ";
$sql=mysqli_query($db,$sql);

$num=mysqli_num_rows($sql); $med="medium";
while($data=mysqli_fetch_array($sql))
{ 
  $check=explode(" ", $data['QUESTION']);
for ($i=0; $i <count($check) ; $i++) { 

    for ($k=0; $k <count($easy) ; $k++) {
      
    if($check[$i]==$easy[$k]){
      $qs=$data['QNO'];
      $que="UPDATE `admindb` SET `DLEVEL`='easy' WHERE `QNO`='$qs'";
  $que=mysqli_query($db,$que);

    }
  }
  for ($k=0; $k <count($medium) ; $k++) {
    if($check[$i]==$medium[$k]){
      $qs=$data['QNO'];
      $que="UPDATE `admindb` SET `DLEVEL`='medium' WHERE `QNO`='$qs'";
  $que=mysqli_query($db,$que);
  }
}
for ($k=0; $k <count($difficult) ; $k++) {
  if($check[$i]==$difficult[$k]){
      $qs=$data['QNO'];
      $que="UPDATE `admindb` SET `DLEVEL`='difficult' WHERE `QNO`='$qs'";
  $que=mysqli_query($db,$que);
}
}
}
} 
 ?>  <div  align="center" style="color:green; font-size: 30px;"> your questions been arranged according to specified difficulty level</div></div>
</body>
</html>














