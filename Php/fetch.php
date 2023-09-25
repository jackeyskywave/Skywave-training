<?php
include 'conn.php';

$sql = "SELECT * FROM tblstudents";
$result = mysqli_query($conn,$sql);

$json_array = array();

while ($row = mysqli_fetch_assoc($result)) 
{
    $json_array[] = $row;
}

echo json_encode($json_array);
?>