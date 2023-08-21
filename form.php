<?php
$fnameErr="";
$lnameErr="";
$emailErr="";
$phoneErr="";
$Err="";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registartion Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>
    h5{
        color: red;
    }
</style>
<body>
     
<?php
include ('conn.php');

if(isset($_POST['submit'])){
    $fname=trim($_POST['fname']);
    $lname=trim($_POST['lname']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    
    if(empty($fname)  && empty($lname) && empty($email) && empty($phone)){
        $Err= "<h5>*Please fill the form.</h5>";
    }
    elseif($fname =="") {
        $fnameErr= "*Please enter your First Name.";
        }

        elseif(!preg_match ("/^[a-zA-z]*$/", $fname)){
            $fnameErr = "*Only alphabets and whitespace are allowed.";
            }
            elseif($lname =="") {
            $lnameErr=  "*Please enter your Last Name.";
            }elseif(!preg_match ("/^[a-zA-z]*$/", $lname)){
            $lnameErr = "*Only alphabets and whitespace are allowed."; 
             }
            elseif($email =="") {
            $emailErr=  "*Please enter your Email Address.";
            }elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
            $emailErr = "*Please enter valide email, like your@abc.com"; 
            }
            elseif($phone =="") {
            $phoneErr=  "*Please enter your Mobile Number.";
            }elseif(is_numeric(trim($phone)) == false){
            $phoneErr = "*Please enter numeric value."; 
            }elseif(strlen($phone) < 10){
            $phoneErr=  "*Please enter valid mobile number.";
            }elseif(strlen($phone) > 10){
            $phoneErr=  "*Please enter valid mobile number.";
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

<div class="container mt-5">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h1 style>Registration Form</h1>
                 <hr>  
                </div>
                <div class="card-body">
                <form action="" method="POST" class="was-validated-md-5" >

<p></p>
   
   <br>
   <?php echo $Err; ?>
   <label for="fname" class="form-label"><b>First Name:</b></label>
   <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Your First Name"  autocomplete="off" >
   <?php
   echo "<h5>".$fnameErr."</h5>";
   ?>

   <br><br>
   <label><b>Last Name:</b></label>
   <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name" autocomplete="off" >
   <?php
        echo  "<h5>".$lnameErr."</h5>";;
   ?>
   <br><br>
   <label><b>Email Address:</b></label>
   <input type="text" name="email" class="form-control" placeholder="abc@gmail.com" autocomplete="off" >
   <?php
        echo  "<h5>".$emailErr."</h5>";;
   ?>
   <br><br>
   <label><b>Phone Number:</b></label>
   <input type="text" name="phone" class="form-control"  placeholder="Enter Your Phone Number" autocomplete="off" >
   <?php
        echo  "<h5>".$phoneErr."</h5>";;
   ?>
   <br><br>
   <input type="submit" value="Submit" name="submit">
 
</form>
                </div>
            </div>
        </div>
     </div>
     
      </div>
</body>
</html>