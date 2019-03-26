 
<?php
  if(isset($_POST['login'])){

     $name=$_POST['name'];
     
	// Account details
	$apiKey = urlencode('I/krayVJ8mo-XPPQxvVPbRpTnOpVjbpWGcK8kmxgOE');
	$otp=mt_rand(100000,999999);
	setcookie("otp",$otp);
	// Message details
	$numbers =  $_POST['num'];
	$sender = urlencode('primeson');
	$msg="hey ".$name." your otp is ".$otp;
	$message = rawurlencode($msg);
 
	//$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
}
if(isset($_POST['verify'])){
	$userotp=$_POST['otp'];
	if($userotp==$_COOKIE['otp']){
		echo("signup succesful");
	}else{
		echo("otp wrong");
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
           <form method="post" action="start.php">
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