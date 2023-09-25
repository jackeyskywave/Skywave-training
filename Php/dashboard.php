<?php
include 'conn.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    $_SESSION['loginErr'] = "Username Or Password is incorrect.";
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $_SESSION['fname']; ?></title>
</head>

<body>
    <h1>Welcome - <?php echo $_SESSION['fname']; ?></h1>
</body>

</html>