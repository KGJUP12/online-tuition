<?php 
session_start();
include('../dbconfig.php');
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}
$sql=mysqli_query($conn,"select * from user where email='$user' ");
$users=mysqli_fetch_assoc($sql);
//print_r($users);
$q=mysqli_query($conn,"select * from revstud");
$r=mysqli_num_rows($q);
if($r==false)
{
echo "<h3 style='color:Red'>No any records found ! </h3>";
}
else
{
?>
<div class="row">
    <div class="col-sm-12" style="color:Red; font-style: italic; font-family: times new roman;">
        <h1 style="margin-left: 720px;" >REMARKS</h1>
    </div>
</div>
<div class="row">

<div class="col-sm-12">

<table class="center" style=" width:70%;  background: palegreen; border: 1px solid black; border:3px solid black;  margin-left:360px; margin-right:auto; margin-top: 50px; ">

    <thead >
    
        <tr class="success">
        <th>S.no</th>
        <th>Teacher Name</th>
        <th>Remarks</th>
        </tr>
        </thead>
        
        <?php
        $i=1;
    while($row=mysqli_fetch_array($q))
        {
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "<td>".$row[3]."</td>";
            //echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>";
            echo "</tr>";
        $i++;
        }
        
        ?>
        
    
        
</table>
</div>
</div>
<?php }?>
<!DOCTYPE html>
<html>
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
<style>
td,th{
    border-collapse: collapse;
    padding: 10px; margin: auto;
    text-align: center;
    text-decoration: initial;
    text-transform: capitalize;
    border:1px solid black;
}
table{
    display: table;
    border-collapse: collapse;
    border-spacing: 2px;
    border-color: gray;
}
</style>
    <title>Teacher Remark</title>
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
</body>
</html>