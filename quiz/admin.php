<html>
<head>
<title>admin1 panel</title>


<link rel="stylesheet" type="text/css" href="style1.css">
<script > 
 function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
</head>
<body>
<div id="header">
	 
<a class="homered" href="index.html"><img src="home1.jpg" style="width: 30px; height: 25px; align-self: left ;
    padding: 0px 20px 5px 0px;"></a><center><img src="administrator.png" id="adminlogo"><br> Admin panel</center>

            
</div>

<div id="sidebar">

<ul>
<li> <a href="adminstudent.php" target="blank">Student registration</a></li>
<li> <a href="suballocation.php" target="blank">subject allocation</a></li>
<li><a href="search.php" target="blanck">Search</a></li>
<li><a href="adminlogout.php"target="blanck">Logout</a></li>
                     
</ul>

</div>
<div id="dataa">
	<img src="tkr.png" style="height: 525px;width: 1020px">
	
</div>
	</body>
</html>