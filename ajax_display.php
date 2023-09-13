<?php
include "conn.php";

if (isset($_POST['displaySend'])) {
    $table = '<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Sr No.</th>
        <th scope="col">Name</th>
        <th scope="col">Email Address</th>
        <th scope="col">Mobile Number</th>
        <th scope="col">Place</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';

    $sql = "SELECT * FROM `ajax`";
    $result = mysqli_query($conn, $sql);
    $number=1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $place=$row['place'];
        $table.='<tr>
          <td scope="row">'.$number.'</td>
          <td>'.$name.'</td>
          <td>'.$email.'</td>
          <td>'.$mobile.'</td>
          <td>'.$place.'</td>
          <td><button class="btn btn-dark" onclick="getDetails('.$id.')">Update</button>
          <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button></td>
        </tr>';
        $number++;
    }
    $table.='</table>';
    echo $table;
}
?>