<?php
session_start();
include('../dbconfig.php');
error_reporting(1);
$user= $_SESSION['faculty_login'];
if($user=="")
{header('location:../index.php');}
extract($_POST);
    if(isset($sub))
    {
	$query="INSERT INTO revstud VALUES (0,'$n','$tname','$cmt')";
    
    if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Comment Added")</script>';  
      }  

	}
?>


<!--<h3 class="page-header">Comment</h3>
--><div class="col-lg-8" style="margin-left: 300px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Student:</label>
            	<input type="text" name="n" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Teacher Name:</label>
            	<input type="text"  name="tname" class="form-control" required>
        </div>
   	</div>
 	
    <div class="control-group form-group">
    	<div class="controls">
        	<label>Comment:</label>
                <input type="text"  name="cmt"  class="form-control" required>
        </div>
    </div>
    <div class="control-group form-group">
        <div class="controls">
          <input name="sub" id="Submit" type="submit" value="Submit" class="btn btn-success"/>
        </div></div>
	</form>
</div>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <title>Comment</title>
</head>
<body>
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#428bca">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#FFFFFF" href="#">Hello <?php echo $users['name'];?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
            <li><a href="logout.php"  style="color:#FFFFFF">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
</ul>
</div>
<br /><br />

</body>
</html>