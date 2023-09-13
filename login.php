<?php
session_start();
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
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
    $login = false;
    $error = false;
    $err = false;
    $fnameErr = false;
    $passwordErr = false;
    $fnameErr1 = false;
    $passwordErr1 = false;
    $emailErr = false;
    if (isset($_POST['login'])) {

        $email = $_POST['fname'];
        $fname = $_POST['fname'];
        $password = $_POST['password'];
        if (empty($fname) && empty($email) && empty($password)) {
            $err = true;
        } elseif (empty($fname) && empty($email)) {
            $fnameErr = true;
        } elseif (empty($password)) {
            $passwordErr = true;
        } elseif ($fname) {
            $sql = "SELECT * FROM form WHERE fname = '$fname' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['fname'] !== $fname) {
                    $fnameErr1 = true;
                } elseif ($row['password'] !== $password) {
                    $passwordErr1 = true;
                } elseif ($row['fname'] === $fname && $row['password'] === $password) {
                    $login = true;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['fname'] = $row['fname'];
                    header('location:dashboard.php');
                }
            } elseif ($email) {
                $sql = "SELECT * FROM form WHERE email = '$email' AND password='$password'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['email'] !== $email) {
                        $emailErr = true;
                    } elseif ($row['password'] !== $password) {
                        $passwordErr1 = true;
                    } elseif ($row['email'] === $fname && $row['password'] === $password) {
                        $login = true;
                        $_SESSION['loggedin'] = true;
                        $_SESSION['fname'] = $email;
                        header('location:dashboard.php');
                    }
                }
            }
        } else {
            $error = true;
        }
    }
    ?>

    <section class="container-fluid h-100 bg-dark">
        <div class="container  py-5 h-100">
            <?php
            if ($err) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Please enter Username or Email and Password.
          </div>';
            }
            if ($fnameErr) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Please enter your Username or Email Address.
          </div>';
            }
            if ($fnameErr1) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Please enter valid Username.
          </div>';
            }
            if ($passwordErr) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Please enter your Password.
          </div>';
            }
            if ($emailErr) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Please enter valid Email Address.
          </div>';
            }
            if ($passwordErr1) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Please enter valid Password.
          </div>';
            }
            if ($login) {
                echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> You Logged in.
          </div>';
            }
            if ($error) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Error!</strong> Invalid credentials.
          </div>';
            }
            ?>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-xl-block">
                                <img src="image2.avif" alt="Sample photo" class="img-fluid h-100 w-100" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase" style="text-decoration: underline;">Student Login form</h3>
                                    <form action="" method="POST" class="was-validated-md-5" enctype="multipart/form-data">
                                        <div class="form-outline">
                                            <input type="text" name="fname" class="form-control form-control-lg" id="form3Example1m" placeholder="First Name or Email Address" autocomplete="off" />
                                        </div><br>
                                        <div class="form-outline">
                                            <input type="password" name="password" id="form3Example1m" class="form-control  form-control-lg" placeholder="Password" autocomplete="off">
                                        </div>
                                </div>
                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input type="submit" class="btn btn-warning btn-lg ms-2" value="Login" name="login">
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