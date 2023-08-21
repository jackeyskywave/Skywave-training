<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h1>Welcome</h1>
 <hr>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      <?php
         
         $sql = "SELECT * FROM `form`";
         $result=mysqli_query($conn,$sql);
         if($result){
          while($row=mysqli_fetch_array($result)){
            $id=$row['id'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $email=$row['email'];
            $phone=$row['phone'];
      ?>
       <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo  $fname; ?></td>
                    <td><?php echo  $lname; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td>
                      <a href="update.php?updateid=<?php echo $id; ?>">
                      <button>Test</button>
                        <!-- <input type="submit" value="Update"> -->
                      </a>
                      <a href="delete.php?deleteid=<?php echo $id; ?>">
                        <button>Delete</button>
                      </a>
                    </td>
             <?php
               }
              }
     
             ?>       
    </tbody>
  </table>
  <a href="form.php">
    <input type="submit" value="Add User" style="margin:25px" name="submit">
  </a>        
  <a href=""></a>
</div>

</body>
</html>