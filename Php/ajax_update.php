<?php
include 'conn.php';

if (isset($_POST['updateid'])) {
    $user_id = $_POST['updateid'];

    $sql = "SELECT * FROM `ajax` WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or data not found.";
}

//update data
if (isset($_POST['hiddenData'])) {
    $uniqueid = $_POST['hiddenData'];
    $name = $_POST['updatename'];
    $email = $_POST['updateemail'];
    $mobile = $_POST['updatemobile'];
    $place = $_POST['updateplace'];

    $sql = "UPDATE `ajax` SET name='$name',email='$email',mobile='$mobile',place='$place' WHERE id=$uniqueid";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo mysqli_error($conn);
    }
}
?>
