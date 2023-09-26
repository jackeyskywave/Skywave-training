<?php
session_start();
error_reporting(0);

$fnameErr  = "";
$lnameErr = "";
$emailErr = "";
$phoneErr = "";
$genderErr = "";
$hobbyErr = "";
$courseErr = "";
include('conn.php');

$id = $_GET['updateid'];
$sql = "SELECT * FROM `form` WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$order_id = $row['order_id'];
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$password = $row['password'];
$phone = $row['phone'];
$gender = $row['gender'];
$hobby = explode(",", $row['hobby']);
$course = explode(",", $row['course']);
$image = $row['image'];

if (isset($_POST['update'])) {


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $password = $_POST['password'];
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];
    $course = $_POST['course'];

    if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {

        $image = $_FILES["image"]["name"];
        $imagetmp = $_FILES["image"]["tmp_name"];
        $extension = substr($image, strlen($image) - 4, strlen($image));
        $image_size = $image['image']['size'];
        $upload_max_size = 2 * 1024 * 1024;
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        unlink("image/" . $_POST['oldpic']);
        move_uploaded_file($_FILES["image"]["tmp_name"], "image/" . $image);
    } else {
        $image = $_POST['oldpic'];
        $image_size = $image['image']['size'];
        $upload_max_size = 2 * 1024 * 1024;
        $extension = substr($image, strlen($image) - 4, strlen($image));
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    }

    if (empty($fname)  && empty($lname) && empty($email) && empty($password) && empty($phone) && empty($gender) && empty($hobby) && empty($course)) {
        $Err = "<h5>*Please fill the form.</h5>";
    } elseif (empty($fname)) {
        $fnameErr = "*Please enter first name";
    } elseif (!preg_match("/^[a-zA-z]*$/", $fname)) {
        $fnameErr = "*Only alphabets and whitespace are allowed.";
    } elseif (empty($lname)) {
        $lnameErr = "*Please enter first name";
    } elseif (empty($email)) {
        $emailErr = "Please enter email address";
    } elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
        $emailErr = "*Please enter valide email, like your@abc.com";
    } elseif ($password == "") {
        $passwordErr = "*Password is Required.";
    } elseif (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $passwordErr = "*Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
    } elseif ($phone == "") {
        $phoneErr =  "*Please enter your Mobile Number.";
    } elseif (is_numeric(trim($phone)) == false) {
        $phoneErr = "*Please enter numeric value.";
    } elseif (!strlen($phone) == 10) {
        $phoneErr =  "*Please enter valid mobile number.";
    } elseif ($gender == "") {
        $genderErr = "*Gender field is required.";
    } elseif ($hobby == "") {
        $hobbyErr = "*Hobby field is required.";
    } elseif ($course == "") {
        $courseErr = "*Please Select course.";
    } elseif (!in_array($extension, $allowed_extensions)) {
        $imageErr = "Invalid format. Only jpg / jpeg/ png /gif format allowed.";
    } elseif ($image_size > $upload_max_size) {
        $imageErr = "Image must not be larger than 2MB";
    } else {

        $sql = "UPDATE `form` SET id='$id',order_id='$order_id',fname='$fname',lname='$lname',email='$email',password='$password',phone='$phone',gender='$gender',hobby='" . implode(",", $hobby) . "',course='" . implode(",", $course) . "',image='$image' WHERE  id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $sql = "SELECT MAX(order_id) as maxtotal FROM `form` WHERE order_id";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                $row = mysqli_fetch_assoc($query);
                $sql_1 = "UPDATE `form` SET `order_id`='" . $row['maxtotal'] . "'+1 WHERE id='$id' ORDER BY order_id DESC";
                $query = mysqli_query($conn, $sql_1);

                $_SESSION['update'] = "Data updated successfully.";
                header('location:display.php');
            } else {
                $_SESSION['update'] = "Data  not updated successfull.";
                header('location:display.php');
            }
        } else {
            $_SESSION['update'] = "Data  not updated successfull.";
            header('location:display.php');
        }
    }
}
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registartion Form</title>
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
                                    <h3 class="mb-5 text-uppercase" style="text-decoration: underline;">Update Registration Form
                                        <a href="display.php">
                                            <button class="btn btn-danger  btn-lg float-end">Back</button>
                                        </a>
                                    </h3>
                                    <form action="update.php?updateid=<?php echo $id; ?>" method="POST" class="was-validated-md-5" enctype="multipart/form-data">
                                        <?php echo    "<h5>" . $Err . "</h5>";  ?>
                                        <div class="row">
                                            <input type="hidden" name="order_id">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" name="fname" class="form-control form-control-lg" id="form3Example1m" value="<?php echo $fname; ?>" autocomplete="off" />
                                                    <?php
                                                    echo "<h5>" . $fnameErr . "</h5>";
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" name="lname" id="form3Example1m" class="form-control form-control-lg" value="<?php echo $lname; ?>" autocomplete="off" />
                                                    <?php
                                                    echo  "<h5>" . $lnameErr . "</h5>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <input type="text" name="email" id="form3Example1m" class="form-control form-control-lg" value="<?php echo $email; ?>" autocomplete="off">
                                            <?php
                                            echo  "<h5>" . $emailErr . "</h5>";
                                            ?>
                                        </div>
                                        <br>
                                        <div class="form-outline">
                                            <input type="password" name="password" id="form3Example1m" class="form-control  form-control-lg" value="<?php echo $password; ?>" autocomplete="off">
                                            <?php
                                            echo  "<h5>" . $passwordErr . "</h5>";
                                            ?>
                                        </div><br>
                                        <div class="form-outline">
                                            <input type="text" name="phone" id="form3Example1m" class="form-control  form-control-lg" value="<?php echo $phone; ?>" autocomplete="off">
                                            <?php
                                            echo  "<h5>" . $phoneErr . "</h5>";
                                            ?>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4 fs-3">Gender: </h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <label class="form-check-label fs-4" for="femaleGender">Female</label>
                                                <input type="radio" class="form-check-input" id="femaleGender" name="gender" value="Female" <?php
                                                                                                                                            if ($gender == "Female") {
                                                                                                                                                echo "checked";
                                                                                                                                            }
                                                                                                                                            ?>>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <label class="form-check-label fs-4" for="maleGender">Male</label>
                                                <input type="radio" class="form-check-input" id="maleGender" name="gender" value="Male" <?php
                                                                                                                                        if ($gender == "Male") {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>
                                            </div>

                                            <div class="form-check form-check-inline mb-0">
                                                <label class="form-check-label fs-4" for="otherGender">Other</label>
                                                <input type="radio" class="form-check-input" name="gender" id="otherGender" value="Other" <?php
                                                                                                                                            if ($gender == "Other") {
                                                                                                                                                echo "checked";
                                                                                                                                            }
                                                                                                                                            ?>>
                                            </div>
                                            <?php
                                            echo  "<h5>" . $genderErr . "</h5>";
                                            ?>
                                        </div>
                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                            <h6 class="mb-0 me-4 fs-3">Hobbies: </h6>
                                            <div class="custom-control  checkbox-lg custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Dancing" <?php if (in_array("Dancing", $hobby)) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                                <label class="custom-control-label fs-5" for="defaultInline1">Dancing</label>
                                            </div>&nbsp;&nbsp;&nbsp;
                                            <div class="custom-control  custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Singing" <?php if (in_array("Singing", $hobby)) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                                <label class="custom-control-label fs-5" for="defaultInline1">Singing</label>
                                            </div>&nbsp;&nbsp;&nbsp;
                                            <div class="custom-control  custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Drawing" <?php if (in_array("Drawing", $hobby)) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                                <label class="custom-control-label fs-5" for="defaultInline1">Drawing</label>
                                            </div>&nbsp;&nbsp;&nbsp;
                                            <div class="custom-control  custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Sketching" <?php if (in_array("Sketching", $hobby)) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                            ?>>
                                                <label class="custom-control-label fs-5" for="defaultInline1">Sketching</label>
                                            </div>
                                            <?php
                                            echo  "<h5>" . $hobbyErr . "</h5>";
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <h6 class="mb-0 me-4 fs-3">Course: </h6>
                                            <br>
                                            <select name="course[]" class="selectpicker form-control form-control-lg" multiple aria-label="size 3 select example">
                                                <option value="Web Designing" <?php
                                                                                if (in_array("Web Designing", $course)) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Web Designing</option>
                                                <option value="Web Development" <?php
                                                                                if (in_array("Web Development", $course)) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>Web Development</option>
                                                <option value="App Development" <?php
                                                                                if (in_array("App Development", $course)) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>App development</option>
                                                <option value="Game development" <?php
                                                                                    if (in_array("Game development", $course)) {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>>Game Development</option>
                                                <option value="Graphic Designing" <?php
                                                                                    if (in_array("Graphic Designing", $course)) {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>>Graphic Desiging</option>
                                                <option value="Digital marketing" <?php
                                                                                    if (in_array("Digital marketing", $course)) {
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
                                                    <option value="<?php echo $course_name; ?>"><?php echo $course_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?php
                                            echo  "<h5>" . $courseErr . "</h5>";;
                                            ?>
                                        </div><br>
                                        <div class="col-md-15 pe-15">
                                            <h6 class="mb-0 me-4 fs-3">Uploaded Image</h6>
                                            <hr>
                                            <img src="image/<?php echo $image; ?>" width="120" height="120">
                                            <input type="hidden" name="oldpic" value="<?php echo $image; ?>">
                                            <br><br>
                                            <div class="mb-3">
                                                <h6 class="mb-0 me-4 fs-3">Upload New Image</h6>
                                                <hr>
                                                <input type="file" name="image" class="form-control form-control-lg" id="formFileLg">
                                                <div class="small text-muted mt-2">Upload your Image file.</div>
                                            </div>
                                            <?php
                                            echo  "<h5>" . $imageErr . "</h5>";
                                            ?>
                                        </div>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">

                                    <input type="submit" value="Update Form" name="update" class="btn btn-warning btn-lg ms-2">
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