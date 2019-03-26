<?php


$db=mysqli_connect("localhost","root","","project1");

if(!$db)
{
  echo "not connected";
}

?>


<html>
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    
    <style type="text/css">
      

.top{
  height: 100%;
  width: 100%;
  padding: 225px 0px 0px 0px;
}

.tab{
  width: 30%;
  height: 100%;
  }
h1{
  color: blue;
}

    </style>
  </head>
  <body >
    
      
         
        <div class="top" align="center">
          <h1>MP_Portal login</h1>
   <div class="tab" >       

<form method="post" action="">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
  </div>        
</form>
</div>
   </div>

    </div>
  </body>
</html>