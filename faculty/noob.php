<?php 
session_start();
include('../dbconfig.php');
$user=$_SESSION['faculty_login'];
extract($_POST);
$sql=mysqli_query($conn,"select * from faculty where email='$user' ");
$users=mysqli_fetch_assoc($sql);
if(isset($_POST["submit"]))  
 {  
      $file=$_FILES["file"]["name"];
      $tmp_name=$_FILES["file"]["tmp_name"];
      $path="UploadedAssignment/".$file;
      move_uploaded_file($tmp_name,$path); 
      $query = "INSERT INTO notes VALUES (0,'$tid','$tname','$sem','$sub', $file ')";  
  if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Upload Successful")</script>';  
      }         
}
?>