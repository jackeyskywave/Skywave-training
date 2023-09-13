<?php
  
  session_start();
  error_reporting(0); 

  include('conn.php');
  if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM `form` WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['delete']="Data Deleted successfully.";
        header('location:display.php');
    }else{
      $_SESSION['delete']="Data not deleted successfully.";
      header('location:display.php');
    }
  }



?>