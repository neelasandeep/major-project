 

 <html>
    <head>
      <title> otp final </title>
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
                    <td>Name</td>
                    <td><input type="text" name="name" placeholder="enter ur name"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="text" name="num" placeholder="enter vaild number"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="login" value="get otp"></td>
                </tr> 
                
                
            </table>
        </form>
             </div>
              </body>
</html>
       

<?php 
session_start();

$authKey = "262679AaksuqdvNqlk5c643f09";
$senderId = "primse";
if(isset($_POST['login'])){
$mobileNumber=$_POST['num'];
$name=$_POST['name'];
$ottp=mt_rand(100000,999999);
$_SESSION['otp']=$ottp;

$mess = "welcome to primeson ".$name." your verification otp ode is ##OTP##".$ottp;
$message=urlencode($mess);
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    
);
$url="http://api.msg91.com/api/sendhttp.php";
$ch = curl_init($url);
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;


header("location:verify.php");



}

?>

   