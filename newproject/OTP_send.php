 

 <html>
    <head>
      <title> otp send </title>
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
      <li class="active"><a href="OTP_send.php"><span class="glyphicon glyphicon-home"></span></a></li>
      
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
                    <td>Name</td>
                    <td><input type="text" name="name" placeholder="enter ur name" class="form-control"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="text" name="num" placeholder="enter vaild number" class="form-control"></td>
                </tr>
                <tr>
                    <td>Pincode</td>
                    <td><input type="text" name="pin" placeholder="enter ur name" class="form-control"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="login" value="get otp" style="width:150px;height:40px;border-radius:50px;border:3px solid green;shadow:10px 10px 10px grey;"
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

$authKey = "262679AaksuqdvNqlk5c643f09";
$senderId = "primse";
if(isset($_POST['login'])){
$mobileNumber=$_POST['num'];
$name=$_POST['name'];
$ottp=mt_rand(100000,999999);
$_SESSION['otp']=$ottp;
$_SESSION['name']=$name;
$_SESSION['mobile']=$mobileNumber;
$_SESSION['pin']=$_POST['pin'];
$mess = "welcome to primeson ".$name." your verification otp code is ##OTP##".$ottp;
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


header("location:OTP_verify.php");



}

?>

   