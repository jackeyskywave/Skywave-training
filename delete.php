<?php
  
  include('conn.php');
  if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM `form` WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:display.php');
    }
  }



?>