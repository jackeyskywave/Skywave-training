<?php

include('conn.php');

if ($_POST) {
    $id = $fname = $_GET['id'];
    if (isset($_POST['submit'])) {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    }
    

    $sql = "UPDATE `form` SET id='$id',fname='$fname',lname='$lname',email='$email',phone='$phone' WHERE  id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}

$id = $_GET['updateid'];

$sql = "SELECT * FROM `form` WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$phone = $row['phone'];

if(empty($fname) && empty($lname) && empty($email) && empty($phone)){
    $Err="*Please fill all Field.";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registartion Form</title>
</head>

<body>

    <div class="container">
        <form action="update.php?id=<?php echo $id; ?>" method="POST">
            <h1>Registration Form</h1>
            <hr>
            <br>
            <?php
            $Err="";
            echo "<h5>".$Err."</h5>";
            ?>
            <label><b>First Name:</b></label>
            <input type="text" name="fname" value="<?php echo $fname; ?>">
            <br><br>
            <label><b>Last Name:</b></label>
            <input type="text" name="lname" value="<?php echo $lname; ?>">
            <br><br>
            <label><b>Email Address:</b></label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <br><br>
            <label><b>Phone Number:</b></label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
            <br><br>
            <input type="submit" value="Update" name="submit">
        </form>
    </div>
</body>

</html>