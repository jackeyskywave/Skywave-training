<?php
include "conn.php";

extract($_POST);
$error = false;
if(isset($_POST['nameSend']) && isset($_POST['emailSend']) && isset($_POST['mobileSend']) && isset($_POST['placeSend'])){
    
    if(empty($_POST['nameSend']) && empty($_POST['emailSend']) && $_POST['mobileSend'] && empty($_POST['placeSend'])){
       echo "empty";
    }else if(empty($_POST['nameSend'])){
        echo 'empty_nameAdd';
    }else if(empty($_POST['emailSend'])){
        echo 'empty_emailAdd';
    }else if(empty($_POST['mobileSend'])){
        echo 'empty_mobileAdd';
    }else if(empty($_POST['placeSend'])){
        echo 'empty_placeAdd';
    }
    else{
        $sql = "INSERT INTO `ajax`(name,email,mobile,place) VALUES('$nameSend','$emailSend','$mobileSend','$placeSend')";
        $result=mysqli_query($conn,$sql);
        
    }
    
}
