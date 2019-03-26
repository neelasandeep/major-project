<?php
session_start();

$db=mysqli_connect("localhost","root","","smindia");
$username=$_SESSION['login_user'];

if(!$db)
{
	echo "not connected";
}




?> 
<html><title>review</title>
<head><link rel="stylesheet" type="text/css" href="style.css"></head>

<body align="center"> <header>
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
	<div style="height: 50px; padding: 0px 500px 0px 500px; font-size:  35px" >REVIEW</div>

<form action="" method="post" >

<table align="center">





<tr><td><b>SUBJECT &nbsp&nbsp&nbsp </b><br><br></td>

<td><b>:</b><select name="subject"  onchange="this.form.submit()"> 
       <option > <?php if(isset($_POST['subject'])){ echo $_POST['subject'];}else { echo "select";} ?> </option> 
    
<?php


	$sql="SELECT  SUBJECT FROM `testdetails` WHERE USER_ID='$username';";
	$sql=mysqli_query($db,$sql);$i=0;
         while(	$data=mysqli_fetch_array($sql))

         	
         {?>
	 
	               
               <option value="<?php  echo $data['SUBJECT'];?>"> <?php  echo $data['SUBJECT'];?> </option>
        <?php  }
$sub=$_POST['subject'];
     ?>
</select>
<br><br></td></tr>

               

<tr><td><b>BRANCH &nbsp&nbsp&nbsp </b><br><br></td>

<td><b>:</b><select name="br"  onchange="this.form.submit()" > 
        <option > <?php if(isset($_POST['br'])){ echo $_POST['br'];}else { echo "select";} ?> </option> 
    
<?php
if(isset($_POST['subject'])){
	
$sub=$_POST['subject'];
	$sql="SELECT  BRANCH FROM `testdetails` WHERE  USER_ID='$username' AND SUBJECT='$sub' ;";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php  echo $data['BRANCH'];?>"> <?php  echo $data['BRANCH']; ?> </option>
			    
        <?php }
}
     ?>
	 
</select>
<br><br></td></tr>






<tr><td><b>UNIT NO &nbsp&nbsp&nbsp </b><br><br></td>

<td><b>:</b><select name="t_name"  onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['t_name'])){ echo $_POST['t_name'];}else { echo "select";} ?> </option> 
<?php
if(isset($_POST['br'])){
$branch=$_POST['br'];

	$sql="SELECT  UNIT_NAME FROM `testdetails` WHERE  USER_ID='$username' AND SUBJECT='$sub' AND  BRANCH='$branch';";
	$sql=mysqli_query($db,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	 
               <option value="<?php echo $data['UNIT_NAME'];?>" > <?php  echo $data['UNIT_NAME']; ?> </option>
        <?php }
} 
     ?>
	      
</select>
<br><br></td></tr>



<tr><td><button name="btn1" style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Display</button></td> <td> <button name="back" style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Back</button></td></tr> </table>
</form></div>
<?php


	
if(isset($_POST['btn1'])){



	$tname=$_POST['t_name'];
$sub=$_POST['subject'];
	
	$branch=$_POST['br'];
	
  	
	
	

	if($tname=="select" || $branch=="select"  || $sub=="select")
	{
			
		echo "<script> alert('please select required fields'); </script>";
		exit();
		
}
      
	else{
	$sqll="SELECT * FROM `testdetails` WHERE BRANCH='$branch' AND SUBJECT='$sub' AND USER_ID='$username' AND UNIT_NAME='$tname';";
     $sqll=mysqli_query($db,$sqll);
	 $data=mysqli_fetch_array($sqll);
	 $year=$data['YEAR'];
	 $semister=$data['SEM'];
	
	$table_name="$year"."_"."$semister"."_"."$branch"."_"."$sub"."_"."$tname";
	echo $table_name;
	
	$_SESSION['tname']=$table_name;
	header("location:edo.php");
}
	


}	
	
 if(isset($_POST['back']))
 {
 	header("location:create.php");
 }





     ?>

</body>
</html>
