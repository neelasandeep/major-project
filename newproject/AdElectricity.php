<?php


$db=mysqli_connect("localhost","root","","project1");
session_start();
  $categery=$_SESSION['categery'];

if(!$db)
{
  echo "not connected";
}

$que="SELECT PINCODE,count(*) as number FROM problems where CATEGERY='$categery' GROUP BY PINCODE";
$insert=mysqli_query($db,$que);
if(!$que)
{
   echo "<script>alert(' query not executed');</script>";
 }
 
?> 


<html>
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['categery', 'numbers'],
          <?php
              while($row=mysqli_fetch_array($insert))
              {
                echo "['".$row["PINCODE"]."',".$row["number"]."],";
              }
          ?>
        ]);

        var options = {

        title: 'Problems of Different Areas by Pincode',
        
          
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <style type="text/css">
      .leftside,.rightside{
 height: 100vh;
  width: 99%;
}

.tab{
  top: 20%;
  
}

    </style>
  </head>
  <body>
    <div class="header">
    <header>
          <nav class="navbar navbar-inverse">
  
    <ul class="nav navbar-nav">
      <li class="active"><a href="chart.php"><span class="glyphicon glyphicon-home"></span></a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href=#><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  
</nav> 
        </header>
        </div>
      <div class="row no-glutters" >
        <div class="col-md-6 no-glutters" >
        <div id="piechart_3d" class="leftside" style="width: 900px; height: 500px;" >
              
            </div>
          </div>
          
          <div class="col-md-6 no-glutters ">
            <div class="rightside">
              <div class="dropdown">
                <p>Enter Pincode to see problems</p>
              <form method="post" action="">
              <div class="form-group row">
                 <div class="col-xs-3">
                       
                     <input class="form-control" id="ex2" type="text" name="pincode" placeholder="enter pin code">
                 </div>
                  &nbsp &nbsp  &nbsp &nbsp
                  <button type="submit" name="Submit" class="btn btn-warning" style="width:170px;height:30px;">Submit</button> 
                </form>
                
              </div>
              </div>
<div class="tab">
                
<?php

 
 if (isset($_POST['Submit'])) {
 $pin=$_POST['pincode'];

?>
<table border="1" align="left" class="table table-hover">
                  <thead>
<tr>
<th>PROBLEM</th>
<th>PROBLEM_DESC</th>
<th>DEL</th>

</tr>
</thead>
<?php
$db=mysqli_connect("localhost","root","","project1");

  $categery=$_SESSION['categery'];
$sa="SELECT `PROBLEM`, `PROBLEM_DESC` FROM `problems` where PINCODE='$pin' and CATEGERY='$categery'";
$record=mysqli_query($db,$sa);
$count=mysqli_num_rows($record);
if($count==0){
  header("location:Empty.php?invalid=no questions available now");
  }else{
while($data=mysqli_fetch_array($record))
{

?>

<tbody>
<tr>
    <td><?php echo $data['PROBLEM'];?></td>
  <td><?php echo $data['PROBLEM_DESC'];?></td>
  
  
  <td><a href="del.php?sno=<?php echo $data['SNO'];?>">del </a></td>
  </tr>
  
  

  <?php 
}
}
}

 ?>


              </tbody>
            </table>
           </div>
   </div>

    
  </body>
</html>