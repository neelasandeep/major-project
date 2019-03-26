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
	<title>qsearch</title>
	<link rel="stylesheet" type="text/css" href="style.css"></head>
<body align="center"> <header>
            <nav>
                <ul>
                <li><a class="homered" href="index.php"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a></li>
            </ul>
                
                <ul id="nav">
                    
                    <li><a class="homeblack" href="qsearch.php">QUESTION</a></li>
                    
                    <li><a class="homeblack" href="search.php">search</a></li>
                    <li><a class="homeblack" href="stakelist.php">Stakeholders</a></li>
                </ul>       
            </nav>
        </header>
        <div class="divider"></div>
<div class="fwimage" style="background-image: url(back1.jpg); ">
	<div style="height: 50px;"></div>
<form action="" method="post">

<table   align="center">


<tr><td><b>UNIT NAME</b><br><br></td> 
<td><b>:</b><select name="tname" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['tname'])){ echo $_POST['tname'];}else { echo "select";} ?> </option>

<option value="UNIT-1">UNIT-1</option>
<option value="UNIT-2">UNIT-2</option>
<option value="UNIT-3">UNIT-3</option>
<option value="UNIT-4">UNIT-4</option>
<option value="UNIT-5">UNIT-5</option>
</select><br/><br></td></tr>
<tr><td><b>YEAR</b><br><br></td> 
<td><b>:</b><select name="year" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['year'])){ echo $_POST['year'];}else { echo "select";} ?> </option>

<option value="I">I</option>
<option value="II">II</option>
<option value="III">III</option>
<option value="IV">IV</option>

</select><br/><br></td></tr>

<tr><td><b>SEMISTER</b><br><br></td> 
<td><b>:</b><select name="sem" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['sem'])){ echo $_POST['sem'];}else { echo "select";} ?> </option>

<option value="I">I</option>
<option value="II">II</option>


</select><br/><br></td></tr>
<tr><td><b>branch</b><br><br></td> 
<td><b>:</b><select name="br" onchange="this.form.submit()" > 
<option > <?php if(isset($_POST['br'])){ echo $_POST['br'];}else { echo "select";} ?> </option>

<option value="CSE">CSE</option>
<option value="ECE">ECE</option>
<option value="EEE">EEE</option>
<option value="CIVIL">CIVIL</option>
<option value="MECH">MECH</option>
</select><br/><br></td></tr>

<tr><td><b>SUBJECT &nbsp&nbsp&nbsp </b><br><br></td>

<td><b>:</b><select name="subject"  onchange="this.form.submit()"> 
       <option > <?php if(isset($_POST['subject'])){ echo $_POST['subject'];}else { echo "select";} ?> </option> 
    
<?php

if(isset($_POST['year'])){
    $year=$_POST['year'];
    $sem=$_POST['sem'];
    $branch=$_POST['br'];
    $dbb=mysqli_connect("localhost","root","","subjects");
	$sql="SELECT  SUBJECT FROM `sub` WHERE YEAR='$year' AND SEMISTER='$sem' AND BRANCH='$branch'";
	$sql=mysqli_query($dbb,$sql);
         while(	$data=mysqli_fetch_array($sql))
         {?>
	 
	               
               <option value="<?php  echo $data['SUBJECT'];?>"> <?php  echo $data['SUBJECT'];?> </option>
        <?php }
}$sub=$_POST['subject'];
     ?>
</select>
<br><br></td></tr>



<tr><td><button name="btn1"style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Start</button></td><td> <button name="back" style="width:80px;height:30px;border-radius:50px;border:3px solid red;shadow:10px 10px 10px grey;">Back</button></td></tr> </table>
</form>
<div align="center" style="color:red; font-size: 25px;"><?php echo @$_GET["invalid"];?></div>
</div>

<?php


	
if(isset($_POST['btn1'])){


$tname=$_POST['tname'];
	$year=$_POST['year'];
	$branch=$_POST['br'];
	$sem=$_POST['sem'];
	$sub=$_POST['subject'];
	
	$table_name="$year"."_"."$sem"."_"."$branch"."_"."$sub"."_"."$tname";
	 
	 
	
  
	

	if($tname=="" || $branch=="" ||$year=="" ||$sem=="" || $sub=="")
	{
			
		echo "<script> alert('please select required fields'); </script>";
		exit();
		
}
      $_SESSION['tname']=$table_name;
	
		
	header("location:qsearch1.php");
	

	 
		}
		

	
if(isset($_POST['back'])){
	header("location:admin.php");
}

     ?>


</body>
</html>
