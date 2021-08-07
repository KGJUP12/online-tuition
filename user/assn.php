<?php
 $connect=mysqli_connect("localhost","root","","tution")or die(mysqli_error());

 if(isset($_POST["insert"]))  
 {  
      $file=$_FILES["file"]["name"];
      $tmp_name=$_FILES["file"]["tmp_name"];
      $path="upload/".$file;
      move_uploaded_file($tmp_name,$path); 
      $query = "INSERT INTO stdassn VALUES (0,' $file ')";  
if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Upload Successful")</script>';  
      }  
       
} 
session_start();
include('../dbconfig.php');
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}
$sql=mysqli_query($conn,"select * from user where email='$user' ");
$users=mysqli_fetch_assoc($sql);
//print_r($users);

 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <title>ASSIGNMENT</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
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
<div class="container" style="width:500px; border:3px solid orange; border-style: 3px double;">
<h3 align="center" style="color:#666cf6">Insert the Assignment here</h3>
<label>Note:Name Your Document As Name_ID_Subject</label>
<br />
  <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
<form style="table-layout: center; margin: auto; padding:10px;" method="post" enctype="multipart/form-data">
<input  style=" border: 3px solid black; border-radius: 3px; color:#806517" type="file" name="file" id="image" />
<br />
<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />	
</form>
</div>
<br />
<br />
</div>
</body>
</head>
</html>