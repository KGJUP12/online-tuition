<?php
$connect=mysqli_connect("localhost","root","","tution")or die(mysqli_error());
$query=mysqli_query($connect,"select * from Ques");
$rowcount=mysqli_num_rows($query);
//print($rowcount)


session_start();
include('../dbconfig.php');
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}
$sql=mysqli_query($conn,"select * from user where email='$user' ");
$users=mysqli_fetch_assoc($sql);
//print_r($users);
?>
<table  style=" border-collapse: collapse; border-spacing: 2px padding:10px;border:3px solid orange; border-collapse: collapse; margin-left:360px; margin-right: auto; margin-top: 50px; ">
  <tr>
  <th style="border: 3px solid black;border-collapse: collapse;padding: 10px; margin: auto;text-align: center;text-decoration: initial;text-transform: capitalize;border:1px solid black;"><b>Question papers</b></th>
  </tr>
          <?php
              for($i=1;$i<=$rowcount;$i++)
                {
                   $row=mysqli_fetch_array($query);
          ?>
  <tr>
    <td style="border: 3px solid black;border-collapse: collapse;padding: 10px; margin: auto;text-align: center;text-decoration: initial;text-transform: capitalize;border:1px solid black;"><a href="../faculty/UploadedAssignment<?php $row["file"]?>"><?php echo $row["file"] ?></a></td>
  </tr>
  <?php 
    }
  ?>
</table>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
<title>Question Bank</title>
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
</body>
</head>
</html>