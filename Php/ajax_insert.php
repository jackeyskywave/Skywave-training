<?php
include "conn.php";
error_reporting(0);



// Insert data into database
if (isset($_POST['save_data'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $place = $_POST['place'];
   
        $sql = "INSERT INTO `ajax`(name,email,mobile,place) VALUES('$name','$email','$mobile','$place')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo $message = "Data Stored Successfully.";
        } else {
            echo $message = "Data Not Stored Successfully.";
        }
    }


//View data from database
if (isset($_POST['click_view_btn'])) {

    $id = $_POST['id'];

    $sql = "SELECT * FROM `ajax`  WHERE id=$id";
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
    // $sql = "SELECT * FROM `ajax` WHERE id='$id'";
    // $result = mysqli_query($conn, $sql);
    // $result_array = [];
    // if (mysqli_num_rows($result) > 0) {
    //     foreach ($result as $row) {
    //         array_push($result_array, $row);
    //     }
    //     header('content-type:application/json');
    //     echo json_encode($result_array);
    // } else {
    //     echo $result = "No record found.";
    // }
}

//Update data into database
if (isset($_POST['click_edit_btn'])) {

    $id = $_POST['id'];
    $sql = "SELECT * FROM `ajax` WHERE id=$id";
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
}
if (isset($_POST['update_data'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $place = $_POST['place'];

    $sql = "UPDATE `ajax` SET name='$name',email='$email',mobile='$mobile',place='$place' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo $result = "Successfully Updated.";
    } else {
        echo $result = "Not Updated successufully.";
    }
}

//Delete data from database
if (isset($_POST['click_confirm_delete_btn'])) {
    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM `ajax` where id='$delete_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo $result = "Deleted Successfully.";
    } else {
        echo $result = "Not Deleted Successfully.";
    }
}
