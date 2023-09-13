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


if (isset($_GET['updateid']) && $_GET['updateid']  != "") {
    $id = $_GET['updateid'];

    $sql = "SELECT * FROM `form` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $phone = $row['phone'];
    $gender = $row['gender'];
    $hobby2 = $row['hobby'];
    $hobby3 = explode(",", $hobby2);
    $course = $row['course'];
    $course1 = "";
    $course1 = explode(",", $course);
}


if (isset($_POST['submit'])) {
    $id = $fname = $_GET['updateid'];
    if (isset($_POST['submit'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $hobby = $_POST['hobby'];
        $hobby1 = implode(",", $hobby);
        $course = $_POST['course'];
        $course1 = implode(",", $course);

        $valid = true;
        if (empty($fname)) {
            $fnameErr = "*Please enter first name";
        } elseif (!preg_match("/^[a-zA-z]*$/", $fname)) {
            $fnameErr = "*Only alphabets and whitespace are allowed.";
        } elseif (empty($lname)) {
            $lnameErr = "*Please enter first name";
        } elseif (empty($email)) {
            $emailErr = "Please enter email address";
        } elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
            $emailErr = "*Please enter valide email, like your@abc.com";
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
        } elseif ($course1 == "") {
            $courseErr = "*Please Select course.";
        } else {
            $sql = "UPDATE `form` SET id='$id',fname='$fname',lname='$lname',email='$email',phone='$phone',gender='$gender',hobby='$hobby1',course=' $course1' WHERE  id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['update'] = "Data updated successfully.";
                header('location:display.php');
            } else {
                $_SESSION['update'] = "Data  not updated successfull.";
                header('location:display.php');
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registartion Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <style>
        h5 {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Update Registration Form
                            <a href="display.php">
                                <button class="btn btn-danger  btn-lg float-end">Back</button>
                            </a>
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="update.php?updateid=<?php echo $id; ?>" method="POST">
                            <br>

                            <label><b>First Name:</b></label>
                            <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
                            <?php echo "<h5>" . $fnameErr . "</h5>" ?><br>
                            <label><b>Last Name:</b></label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>">
                            <?php echo  "<h5>" . $lnameErr . "</h5>" ?><br>
                            <label><b>Email Address:</b></label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <?php echo "<h5>" . $emailErr . "</h5>" ?><br>
                            <label><b>Phone Number:</b></label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <?php echo "<h5>" . $phoneErr . "</h5>" ?><br>
                            <label><b>Gender:</b></label><br>
                            <input type="radio" name="gender" value="Male" <?php
                                                                            if ($gender == "Male") {
                                                                                echo "checked";
                                                                            }
                                                                            ?>>Male
                            <br>
                            <input type="radio" name="gender" value="Female" <?php
                                                                                if ($gender == "Female") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>Female
                            <br>
                            <input type="radio" name="gender" value="Other" <?php
                                                                            if ($gender == "Other") {
                                                                                echo "checked";
                                                                            }
                                                                            ?>>Other
                            <?php echo "<h5>" . $genderErr . "</h5>" ?><br>
                            <label><b>Hobbies:</b></label><br>
                            Dancing
                            <input <?php if (in_array("Dancing", $hobby3)) {
                                        echo "checked";
                                    } ?> type="checkbox" name="hobby[]" value="Dancing" />
                            <br>
                            Singing
                            <input <?php if (in_array("Singing", $hobby3)) {
                                        echo "checked";
                                    } ?> type="checkbox" name="hobby[]" value="Singing">
                            <br>
                            Drawing
                            <input <?php if (in_array("Drawing", $hobby3)) {
                                        echo "checked";
                                    } ?> type="checkbox" name="hobby[]" value="Drawing">
                            <br>
                            Sketching
                            <input <?php if (in_array("Sketching", $hobby3)) {
                                        echo "checked";
                                    } ?> type="checkbox" name="hobby[]" value="Sketching">
                            <?php echo "<h5>" . $hobbyErr . "</h5>" ?><br>
                            <br><br>
                            <label><b>Course:</b></label>
                            <select name="course[]" multiple class="form-select" id="course">

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
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $id = $row['id'];
                                    $course_name = $row['course_name'];
                                ?>
                                    <option value="<?php echo $course_name; ?>">
                                        <?php echo $course_name; ?></option>
                                <?php
                                }
                                ?>  
                            </select>
                           
                            <?php echo "<h5>" . $courseErr . "</h5>" ?><br><br>
                            <input type="submit" value="Update" name="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>