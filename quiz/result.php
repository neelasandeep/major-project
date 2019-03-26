
<html>
<head>

<style>
#two{
	align:center;
	padding:10px 10px 20px 20px;
	text-align:center;
	
}
#one{
	
	text-align:center;
	padding:150px 50px 50px 50px ;

	}
</style>
<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center">
	<header>
    		<nav>
    			<h1>Online quiz</h1>
    			<ul id="nav">
    				<li style="font-size:18px;"><a  class="homeblack" href="studentlogin.php" >logout</a></li>
            <li style="font-size:18px;"><a class="homeblack" href="#" style="color: green;">Contact</a></li>
          </ul>		
    		</nav>
    	</header>
<div id="one">


<h2>RESULT</h2>
<table align="center">

<?php
session_start();
$num=$_SESSION['num'];
$db=mysqli_connect("localhost","root","","subjects");
$username=$_SESSION['login_user'];
$tbname=$_SESSION['name'];
$subject=$_SESSION['subject'];
$tname=$_SESSION['tname'];
$count=0;
if(isset($_POST['submit'])){

    
		 
		 $count=count($_POST['quiz']);
		 
		 echo"<tr><td>attempted questions </td>";
	echo "<td><b>:</b> &nbsp &nbsp out of".$num." questions you attempted".$count."questions</td></tr>"; 
	      $na=0;
		  $result=0;
		 $i=1;
		 $select=$_POST['quiz'];
		 $sa="SELECT * FROM `$tbname`";

          $record=mysqli_query($db,$sa);
           while($data= mysqli_fetch_array($record)){
			   if(!empty($select[$i])){
			 if($data['CORRECT_ANS']==$select[$i]){
				 
				 $result++;
				 
				 
			 }
			   }else{
				 $na++;
			 }
			 $i++;
			   }
		 
		 echo " <br><tr><td> your score is"."<td><b>:</b> &nbsp &nbsp".$result."</td></td></tr> ";
		 
	 echo  "<tr><td>not attempted questions"."<td><b>:</b>&nbsp &nbsp".$na."</td></td></tr>";

	 $sqll="SELECT * FROM `students_login` WHERE HALL_TICKET='$username';";
     $sqll=mysqli_query($db,$sqll);
	 $data=mysqli_fetch_array($sqll);
	 $year=$data['YEAR'];
	 $semister=$data['SEMISTER'];
	 $branch=$data['BRANCH'];
	 $section=$data['SECTION'];
$query="UPDATE `students_login` SET `STATUS`='false' WHERE BRANCH='$branch' AND HALL_TICKET='$username' AND YEAR='$year' AND SEMISTER='$semister' AND SECTION='$section'";
	$que=mysqli_query($db,$query);
   $username=strtoupper($username);
$sql="INSERT INTO `results`(`HALL_TICKET`, `YEAR`, `SEMISTER`, `BRANCH`,`SECTION`,`SUBJECT`,`TEST_NAME`, `MAX`, `MARKS`) VALUES ('$username','$year','$semister','$branch','$section','$subject','$tname','$count','$result');";
$sql=mysqli_query($db,$sql);


}


	
?>
</table>
</div>
<form action="" method="post">
<input type="submit" name="ok" value="OK">
</form>
<?php
if(isset($_POST['ok'])){
	header("location:studentlogin.php");
}
?>
</body>
</html>
