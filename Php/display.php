<?php
session_start();
error_reporting(0);
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
    h1 {
      text-align: center;
    }

    html,
    body {
      height: 100%;

    }

    body {
      margin: 50px;
      background-color: #212529;
      font-family: "Times New Roman";
      font-size: 1.2rem;
      font-weight: 100;
    }

    #tableId {
      width: auto;
      border-collapse: collapse;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border: 2px black solid;
      border-radius: 10px;
      /* margin: 20px; */
    }

    th {
      background-color: #909090;
    }

    td {
      background-color: #B0B0B0;
    }

    div.dataTables_filter {
      padding: 20px;
    }

    div.dataTables_length {
      padding: 20px;
    }

    select {
      border-radius: 10px;
    }

    input {
      border-radius: 10px;
    }

    label {
      color: lightgray;
    }

    div#tableId_info {
      color: lightgray;
    }

    div#tableId_previous {
      color: lightgray;
    }

    div#tableId_next {
      color: lightgray;
    }

  </style>
</head>

<body>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <?php
  if (isset($_SESSION['msg'])) {
  ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Success!</strong> <?php echo ($_SESSION['msg']); ?>
    </div>
  <?php
    unset($_SESSION['msg']);
  }
  ?>
  <?php

  if (isset($_SESSION['update'])) {
  ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Success!</strong> <?php echo ($_SESSION['update']); ?>
    </div>
  <?php
    unset($_SESSION['update']);
  }
  ?>
  <?php
  if (isset($_SESSION['delete'])) {
  ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Success!</strong> <?php echo ($_SESSION['delete']); ?>
    </div>
  <?php
    unset($_SESSION['delete']);
  }
  ?>
  <?php
  if (isset($_SESSION['addcourse'])) {
  ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Success!</strong> <?php echo ($_SESSION['addcourse']); ?>
    </div>
  <?php
    unset($_SESSION['addcourse']);
  }
  ?>
  <div class="container1 ">
    <!-- <h1 style="color: #d6d2d2; text-align:left; text-decoration:underline;">Registered Student List</h1> -->
    <a href="form.php">
      <button class="btn btn-success btn-lg" style="color:white">Add Course</button>
    </a><br>
    <div class="table-responsive table-fixed">
      <table id="tableId">
        <thead>
          <tr>
            <th class="fs-5" scope="col">ID</th>
            <th class="fs-5" scope="col">Order ID</th>
            <th class="fs-5" scope="col">First Name</th>
            <th class="fs-5" scope="col">Last Name</th>
            <th class="fs-5" scope="col">Email</th>
            <th class="fs-5" scope="col">Password</th>
            <th class="fs-5" scope="col">Mobile Number</th>
            <th class="fs-5" scope="col">Gender</th>
            <th class="fs-5" scope="col">Hobbies</th>
            <th class="fs-5" scope="col">Course</th>
            <th class="fs-5" scope="col">Image</th>
            <th class="fs-5" scope="col">Add Course</th>
            <th class="fs-5" scope="col">Update</th>
            <th class="fs-5" scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM `form`";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            while ($row = mysqli_fetch_array($result)) {
              $id = $row['id'];
              $order_id = $row['order_id'];
              $fname = $row['fname'];
              $lname = $row['lname'];
              $email = $row['email'];
              $password = $row['password'];
              $phone = $row['phone'];
              $gender = $row['gender'];
              $hobby = $row['hobby'];
              $course = $row['course'];
              $image = $row['image'];
          ?>

              <tr>
                <td class="fs-6" style="color:black"><?php echo $id; ?></td>
                <td class="fs-6" style="color:black"><?php echo $order_id; ?></td>
                <td class="fs-6" style="color:black"><?php echo  $fname; ?></td>
                <td class="fs-6" style="color:black"><?php echo  $lname; ?></td>
                <td class="fs-6" style="color:black"><?php echo $email; ?></td>
                <td class="fs-6" style="color:black"><?php echo $password; ?></td>
                <td class="fs-6" style="color:black"><?php echo $phone; ?></td>
                <td class="fs-6" style="color:black"><?php echo $gender; ?></td>
                <td class="fs-6" style="color:black"><?php echo $hobby; ?></td>
                <td class="fs-6" style="color:black"><?php echo $course; ?></td>
                <td><img src="image/<?php echo $image; ?>" width="150" height="150"></td>
                <td>
                  <a href="addcourse.php?courseid=<?php echo $id; ?>">
                    <button class="btn btn-light" style="color:#4d4040">Add Course</button>
                  </a>
                </td>
                <td>
                  <a href="update.php?updateid=<?php echo $id; ?>">
                    <button class="btn btn-light" style="color:#4d4040">Update</button>
                  </a>
                </td>
                <td>
                  <a href="delete.php?deleteid=<?php echo $id; ?>">
                    <button class="btn btn-light" style="color:#4d4040">Delete</button>
                  </a>
                </td>
            <?php
            }
          }
            ?>
        </tbody>
      </table>
      <br>

    </div>
  </div>
  <script>
    $(function() {
      $('#tableId').DataTable({
        "aLengthMenu": [
          [5, 10, 25, 50, 100, -1],
          [5, 10, 25, 50, 100, "All"]
        ],
        "iDisplayLength": 5
      });
    });
  </script>
</body>

</html>