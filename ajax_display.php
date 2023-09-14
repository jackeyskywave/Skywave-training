<?php
include "conn.php";


$sql = "SELECT * FROM `ajax`";
$query = mysqli_query($conn, $sql);
$result=[];
if (mysqli_num_rows($query) > 0) {
  foreach ($query as $row) {
    array_push($result,$row);
  }
  header('content-type:application/json');
  echo json_encode($result);
} else {
  echo $result = "No record found.";
}

// }
