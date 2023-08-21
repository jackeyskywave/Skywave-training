<?php
include ('conn.php');

if(isset($_POST['submit'])){
    $fname=trim($_POST['fname']);
    $lname=trim($_POST['lname']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    
    if($fname =="") {
        $fnameErr=  "<span class='error'>Please enter your First Name.</span>";
        }elseif(!preg_match ("/^[a-zA-z]*$/", $fname)){
        $fnameErr = "Only alphabets and whitespace are allowed.";
        }
        elseif($lname =="") {
        $lnameErr=  "<span class='error'>Please enter your Last Name.</span>";
        }elseif(!preg_match ("/^[a-zA-z]*$/", $lname)){
        $lnameErr = "Only alphabets and whitespace are allowed."; 
         }
        elseif($email =="") {
        $emailErr=  "<span class='error'>Please enter your Email Address.</span>";
        }elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
        $emailErr = "<span class='error'>Please enter valide email, like your@abc.com"; 
        }
        elseif($phone =="") {
        $phoneErr=  "<span class='error'>Please enter your Mobile Number.</span>";
        }elseif(is_numeric(trim($phone)) == false){
        $phoneErr = "<span class='error'>Please enter numeric value."; 
        }elseif(strlen($phone) < 10){
        $phoneErr=  "<span class='error'>Please enter valid mobile number.</span>";
        }elseif(strlen($phone) > 10){
        $phoneErr=  "<span class='error'>Please enter valid mobile number.</span>";
        }
        else{
        $sql = "INSERT INTO form(`fname`,`lname`,`email`,`phone`) VALUES('$fname','$lname','$email','$phone')";
        $result = mysqli_query($conn,$sql);
        if($result){
        header('location:display.php');
        }else{
        die(mysqli_error($conn));
        }
        }
}


?>