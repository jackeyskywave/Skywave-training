<?php
include 'conn.php';

if(isset($_POST['daleteSend'])){
$unique=$_POST['daleteSend'];

$sql="DELETE FROM `ajax` WHERE id=$unique";
$result=mysqli_query($conn,$sql);
}
?>