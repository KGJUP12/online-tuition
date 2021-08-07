<?php 
session_start();
include('../dbconfig.php');
$user=$_SESSION['faculty_login'];
extract($_POST);
$query=mysqli_query($conn,"select * from stdassn");
$rowcount=mysqli_num_rows($query);	
$sql=mysqli_query($conn,"select * from faculty where email='$user' ");
$users=mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
        <title>Online Tution System</title>
	
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
	<title>Faculty Download Assignment</title>
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
          <a class="navbar-brand" style="color:#FFFFFF" href="#">Hello <?php echo $users['Name'];?></a>
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
</div>
			<table  style="display: table; border-collapse: collapse; border-spacing: 2px;    border-color: gray; border:3px solid black; border-collapse: collapse; margin-left:360px; margin-right: auto; margin-top: 50px; ">
  <tr>
  <th style="border: 3px solid black;border-collapse: collapse;padding: 10px; margin: auto;text-align: center;text-decoration: initial;text-transform: capitalize;border:1px solid black;"><b>Student Assignmnet</b></th>
  </tr>
          <?php
              for($i=1;$i<=$rowcount;$i++)
                {
                   $row=mysqli_fetch_array($query);
          ?>
  <tr>
    <td style="border: 3px solid black;border-collapse: collapse;padding: 10px; margin: auto;text-align: center;text-decoration: initial;text-transform: capitalize;border:1px solid black;"><a href="../user/upload/<?php $row["file"]?>"><?php echo $row["file"] ?></a></td>
  </tr>
  <?php 
    }
  ?>
</table>

</body>
</html>