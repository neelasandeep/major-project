<?php
$authKey = "262679AvO9gvpP7O5c643b0a";
$senderId = "primse";
if(isset($_POST['login'])){
$mobileNumber=$_POST['num'];
$message = "welcome to primewson your verification otp ode is ##OTP##";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    
);
$url="http://control.msg91.com/api/sendotp.php";
$curl = curl_init($url);

curl_setopt_array($curl, array(
  //CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?template=&otp_length=&authkey=&message=&sender=&mobile=&otp=&otp_expiry=&email=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $postData,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<script>alert("your otp is been sent to '.$mobileNumber.'by this id '.$response.'") </script>';
}

}







?>








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

















