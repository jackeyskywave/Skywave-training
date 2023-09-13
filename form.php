<?php
session_start();
error_reporting(0);
$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$phoneErr = "";
$Err = "";
$genderErr = "";
$courseErr = "";
$hobbyErr = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Registartion Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<style>
    h5 {
        color: red;
    }

    section {
        position: relative;
    }
</style>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    include('conn.php');
    if (isset($_POST['submit'])) {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);

        $password = $_POST['password'];
        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        $phone = trim($_POST['phone']);
        $gender = trim($_POST['gender']);
        $hobby = $_POST['hobby'];
        $hobby1 = implode(",", $hobby);
        $course = ($_POST['course']);
        $course1 = implode(",", $course);
        $imageName = $_FILES['image']['name'];
        $extension = substr($imageName, strlen($imageName) - 4, strlen($imageName));
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        $image_size = $image['image']['size'];
        $upload_max_size = 2 * 1024 * 1024;

        if (empty($fname)  && empty($lname) && empty($email) && empty($password) && empty($phone) && empty($gender) && empty($hobby) && empty($course1) && empty($imageName)) {
            $Err = "<h5>*Please fill the form.</h5>";
        } elseif ($fname == "") {
            $fnameErr = "*Please enter your First Name.";
        } elseif (!preg_match("/^[a-zA-z]*$/", $fname)) {
            $fnameErr = "*Only alphabets and whitespace are allowed.";
        } elseif ($lname == "") {
            $lnameErr =  "*Please enter your Last Name.";
        } elseif (!preg_match("/^[a-zA-z]*$/", $lname)) {
            $lnameErr = "*Only alphabets and whitespace are allowed.";
        } elseif ($email == "") {
            $emailErr =  "*Please enter your Email Address.";
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
        } elseif (strlen($phone) < 10) {
            $phoneErr =  "*Please enter valid mobile number.";
        } elseif (strlen($phone) > 10) {
            $phoneErr =  "*Please enter valid mobile number.";
        } elseif ($gender == "") {
            $genderErr = "*Gender field is required.";
        } elseif ($hobby == "") {
            $hobbyErr = "*Hobby field is required.";
        } elseif ($course == "") {
            $courseErr = "*Please Select course.";
        } elseif ($imageName == "") {
            $imageErr = "*Please Select image file.";
        } elseif (!in_array($extension, $allowed_extensions)) {
            $imageErr = "Invalid format. Only jpg / jpeg/ png /gif format allowed.";
        } elseif ($image_size > $upload_max_size) {
            $imageErr = "Image must not be larger than 2MB";
        } else {
            $sql = "INSERT INTO form(`order_id`,`fname`,`lname`,`email`,`password`,`phone`,`gender`,`hobby`,`course`,`image`) VALUES('$order_id','$fname','$lname','$email','$password','$phone','$gender','$hobby1','$course1','$imageName')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                move_uploaded_file($_FILES['image']['tmp_name'], "image/" . $_FILES['image']['name']);
                $sql = "UPDATE `form` SET order_id=id";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    $_SESSION['msg'] = "Data inserted successfull.";
                    header('location:display.php');
                } else {
                    mysqli_error($conn);
                }
            } else {
                $_SESSION['msg'] = "Data  not inserted successfull.";
                header('location:display.php');
            }
        }
    }
    ?>

    <section class="container-fluid h-100 bg-dark">
        <div class="container  py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-xl-block">
                                <img src="image2.avif" alt="Sample photo" class="img-fluid h-100 w-100" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase" style="text-decoration: underline;">Student registration form</h3>
                                    <form action="" method="POST" class="was-validated-md-5" enctype="multipart/form-data">
                                        <?php echo    "<h5>" . $Err . "</h5>";  ?>
                                        <div class="row">
                                            <input type="hidden" name="order_id">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" name="fname" class="form-control form-control-lg" id="form3Example1m" placeholder="First Name" autocomplete="off" />
                                                    <?php
                                                    echo "<h5>" . $fnameErr . "</h5>";
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" name="lname" id="form3Example1m" class="form-control form-control-lg" placeholder="Last Name" autocomplete="off" />
                                                    <?php
                                                    echo  "<h5>" . $lnameErr . "</h5>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <input type="text" name="email" id="form3Example1m" class="form-control form-control-lg" placeholder="example@gmail.com" autocomplete="off">
                                            <?php
                                            echo  "<h5>" . $emailErr . "</h5>";
                                            ?>
                                        </div>
                                        <br>
                                        <div class="form-outline">
                                            <input type="password" name="password" id="form3Example1m" class="form-control  form-control-lg" placeholder="Password" autocomplete="off">
                                            <?php
                                            echo  "<h5>" . $passwordErr . "</h5>";
                                            ?>
                                        </div><br>
                                        <div class="form-outline">
                                            <input type="text" name="phone" id="form3Example1m" class="form-control  form-control-lg" placeholder="Mobile Number" autocomplete="off">
                                            <?php
                                            echo  "<h5>" . $phoneErr . "</h5>";
                                            ?>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4 fs-3">Gender: </h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <label class="form-check-label fs-4" for="femaleGender">Female</label>
                                                <input type="radio" class="form-check-input" id="femaleGender" name="gender" value="Female">
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <label class="form-check-label fs-4" for="maleGender">Male</label>
                                                <input type="radio" class="form-check-input" id="maleGender" name="gender" value="Male">
                                            </div>

                                            <div class="form-check form-check-inline mb-0">
                                                <label class="form-check-label fs-4" for="otherGender">Other</label>
                                                <input type="radio" class="form-check-input" name="gender" id="otherGender" value="Other">
                                            </div>
                                            <?php
                                            echo  "<h5>" . $genderErr . "</h5>";
                                            ?>
                                        </div>
                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                            <h6 class="mb-0 me-4 fs-3">Hobbies: </h6>
                                            <div class="custom-control  checkbox-lg custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Dancing">
                                                <label class="custom-control-label fs-5" for="defaultInline1">Dancing</label>
                                            </div>&nbsp;&nbsp;&nbsp;
                                            <div class="custom-control  custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Singing">
                                                <label class="custom-control-label fs-5" for="defaultInline1">Singing</label>
                                            </div>&nbsp;&nbsp;&nbsp;
                                            <div class="custom-control  custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Drawing">
                                                <label class="custom-control-label fs-5" for="defaultInline1">Drawing</label>
                                            </div>&nbsp;&nbsp;&nbsp;
                                            <div class="custom-control  custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="defaultInline1" name="hobby[]" value="Sketching">
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
                                                <option value="Web Designing">Web Designing</option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="App Development">App development</option>
                                                <option value="Game development">Game Development</option>
                                                <option value="Graphic Designing">Graphic Desiging</option>
                                                <option value="Digital marketing">Digital Marketing</option>
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
                                            <h6 class="mb-0 me-4 fs-3">Upload Image </h6>
                                            <hr>
                                            <input type="file" name="image" class="form-control form-control-lg" id="formFileLg">
                                            <div class="small text-muted mt-2">Upload your Image file.</div>
                                            <?php
                                            echo  "<h5>" . $imageErr . "</h5>";
                                            ?>
                                        </div>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input type="submit" class="btn btn-warning btn-lg ms-2" value="Submit Form" name="submit">
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