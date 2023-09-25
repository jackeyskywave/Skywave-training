<?php
error_reporting(0);
session_start();
$fnameErr  = "";
$courseErr = "";
$courseNameErr = "";
include('conn.php');


$id = $_GET['courseid'];
$sql = "SELECT * FROM `form` WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$fname = $row['fname'];
$lname = $row['lname'];
$course = $row['course'];
$course1 = explode(",", $course);
?>
<?php
if (isset($_POST['add']) && isset($_GET['courseid']) && $_GET['courseid'] != "") {
  $course_name = $_POST['addCourse'];
  $reg_id = $_GET['courseid'];

  if ($course_name == "") {
    $course_name_err = "*Please enter course.";
  } else {
    $query = "INSERT INTO `addcourse`(`course_name`,`reg_id`) VALUES('$course_name','$reg_id')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      if ($_POST['addCourse']) {
        array_push($_POST['course'], $_POST['addCourse']);
        $course1 = implode(",", $_POST['course']);
      }
      $sql = "UPDATE `form` SET `course`='$course1' WHERE id = " . $reg_id;
      $dataupdate = mysqli_query($conn, $sql);
      if ($dataupdate) {
        $_SESSION['addcourse'] = "Course Added.";
        header('location:display.php');
      } else {
        echo mysqli_error($conn);
      }
      header('location:display.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add course</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    h5 {
      color: red;
    }
  </style>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <section class="h-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6  d-xl-block">
                <img src="image2.avif" alt="Sample photo" class="img-fluid h-100 w-100" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase" style="text-decoration: underline;">Add Course
                    <a href="display.php">
                      <button class="btn btn-danger  btn-lg float-end">Back</button>
                    </a>
                  </h3>
                  <form action="" method="POST" class="was-validated-md-5">
                    <?php echo    "<h5>" . $Err . "</h5>";  ?>
                    <div class="form-outline">
                      <input type="text" name="fname" id="form3Example1m" class="form-control form-control-lg" value="<?php echo $fname; ?>">
                      <?php echo "<h5>" . $fnameErr . "</h5>" ?><br>
                    </div>
                    <div class="form-outline">
                      <input type="text" name="lname" id="form3Example1m" class="form-control form-control-lg" value="<?php echo $lname; ?>">
                      <?php echo "<h5>" . $lnameErr . "</h5>" ?><br>
                    </div>
                    <div class="form-group">
                      <h6 class="mb-0 me-4 fs-3">Course: </h6>
                      <br>
                      <select name="course[]" class="selectpicker form-control form-control-lg" multiple aria-label="size 3 select example">
                        <option value="Web Designing" <?php
                                                      if (in_array("Web Designing", $course1)) {
                                                        echo "selected";
                                                      }
                                                      ?>>Web Designing</option>
                        <option value="Web Development" <?php
                                                        if (in_array("Web Development", $course1)) {
                                                          echo "selected";
                                                        }
                                                        ?>>Web Development</option>
                        <option value="App Development" <?php
                                                        if (in_array("App Development", $course1)) {
                                                          echo "selected";
                                                        }
                                                        ?>>App development</option>
                        <option value="Game development" <?php
                                                          if (in_array("Game development", $course1)) {
                                                            echo "selected";
                                                          }
                                                          ?>>Game Development</option>
                        <option value="Graphic Designing" <?php
                                                          if (in_array("Graphic Designing", $course1)) {
                                                            echo "selected";
                                                          }
                                                          ?>>Graphic Desiging</option>
                        <option value="Digital marketing" <?php
                                                          if (in_array("Digital marketing", $course1)) {
                                                            echo "selected";
                                                          }
                                                          ?>>Digital Marketing</option>
                        <?php
                        $sql = "SELECT * FROM addcourse";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                          $id = $row['id'];
                          $course_name = $row['course_name'];
                        ?>
                          <option value="<?php echo $course_name; ?>" <?php if (in_array($course_name, $course1)) {
                                                                        echo "selected";
                                                                      } ?>>
                            <?php echo $course_name; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                      <?php
                      echo  "<h5>" . $courseErr . "</h5>";;
                      ?>
                    </div>
                    <br>
                    <div class="form-outline">
                      <h6 class="mb-0 me-4 fs-3">Add Course</h6>
                      <input class="form-control" type="text" id="addCourse" name="addCourse" autocomplete="off">
                    </div>
                    <?php
                    echo  "<h5>" . $course_name_err . "</h5>";
                    ?>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <button type="submit" value="Add" name="add" class="btn btn-warning btn-lg ms-2">Add</button>
                  <!-- <input type="submit" class="btn btn-warning btn-lg ms-2" value="Submit Form" name="submit"> -->
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</body>

</html>