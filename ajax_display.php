<?php
include "conn.php";


$sql = "SELECT * FROM `ajax`";
$query = mysqli_query($conn, $sql);
$result = array();
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
  }
  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  echo $result = "No record found.";
}

// }
