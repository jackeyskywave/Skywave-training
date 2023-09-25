<?php

// session_start();
// include('conn.php');

// if(isset($_POST['submit'])){

//     $items=$_POST['course'];

//     $items1=implode(",",$items);
//     $sql="INSERT INTO dropdown (course) VALUES ('$items1')";
//     $result=mysqli_query($conn,$sql);

//     if($result){
//       $_SESSION['message']="Succesfully Selected.";
    
//     //   header('location:dropdown.php');
//     }
    
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <select name="select" id="select">
    <option value="Java">Java</option>
    <option value="C#">C#</option>
  </select>
 <input type="text" id="val">
 <button type="submit" onclick="add();">Add</button>
 
 <script>
  function add(){
    var select = document.getElementById("select"),
      txtVal=document.getElementById("val").value,
      option = document.createElement("OPTION"),
      option1=document.createTextNode(txtVal);

      option.appendChild(option1);
      select.insertBefore(option,select.lastChild);
  }

 </script>
</body>
</html>