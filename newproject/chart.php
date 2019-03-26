<?php


$db=mysqli_connect("localhost","root","","project1");


if(!$db)
{
  echo "not connected";
}

$que="SELECT CATEGERY,count(*) as number FROM problems GROUP BY CATEGERY";
$insert=mysqli_query($db,$que);
if(!$que)
{
   echo "<script>alert(' query not executed');</script>";
 }
 if (isset($_POST['Submit'])) {
  session_start();
  $_SESSION['categery']=$_POST['prob'];

  if ($_POST['prob']=="water") {
    header("location:AdWater.php");
  }
  if ($_POST['prob']=="electricity") {
    header("location:AdElectricity.php");
  }
  if ($_POST['prob']=="food_agriculture") {
    header("location:AdFagri.php");
  }
  if ($_POST['prob']=="transport") {
    header("location:AdTransport.php");
  }

   
 }
?> 


<html>
  <head>
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
                echo "['".$row["CATEGERY"]."',".$row["number"]."],";
              }
          ?>
        ]);

        var options = {

        title: 'Problems of Different departments',
        
          
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <style type="text/css">
      .leftside,.rightside{
 height: 100vh;
  width: 100%;
}
.dropdown{
  top: 30%;
  left: 20%;
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
      
      <li><a href="OTP_send.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  
</nav> 
        </header>
        </div>
      <div class="row no-glutters">
          <div class="col-md-6 no-glutters">
            <div id="piechart_3d" class="leftside" style="width: 900px; height: 500px;">
              
            </div>
          </div>
          <div class="col-md-6 no-glutters ">
            <div class="rightside">
              <div class="dropdown">
                <p>Select the Department to see problems</p>
                <form method="post" action="">
                 <select name="prob"  class="btn btn-primary dropdown-toggle"> 
                  <option > <?php if(isset($_POST['prob'])){ echo $_POST['prob'];}else { echo "Select";} ?> </option>
                  <option value="electricity">Electricity</option>
                  <option value="food_agriculture">Food & agriculture</option>
                  <option value="water">Water</option>
                  <option value="transport">Transport</option>
                  <option value="Others">Others</option>
                  </select><br><br>
                  <button type="submit" name="Submit" class="btn btn-warning" style="width:150px;height:35px;">Submit</button> 
                </form>
              </div><br/>
            </div>
         </div>
    
  </body>
</html>
<