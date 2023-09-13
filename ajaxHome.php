<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operations Using AJAX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container my-3">
        <h1 class="text-center">PHP CRUD Operations Using AJAX</h1>
        <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#completeModal">
            Add New User
        </button>
        <div id="displayDataTable">
        </div>
    </div>
    <?php
    session_start();
    error_reporting(0);
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible">
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
<strong>Error!</strong> Please fill all fields.
</div>';
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="completename">Name:</label>
                        <input type="text" class="form-control" id="completename" placeholder="Enter Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeemail">Email:</label>
                        <input type="email" class="form-control" id="completeemail" placeholder="Enter Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completemobile">Mobile Number:</label>
                        <input type="text" class="form-control" id="completemobile" placeholder="Enter Mobile Number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeplace">Place:</label>
                        <input type="text" class="form-control" id="completeplace" placeholder="Enter Place" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="msg" class="text-black text-center p-1 rounded">
        &nbsp;
    </div>
    <!--Update Model-->
    <div class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="completename">Name:</label>
                        <input type="text" class="form-control" id="updatename" placeholder="Enter Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeemail">Email:</label>
                        <input type="email" class="form-control" id="updateemail" placeholder="Enter Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completemobile">Mobile Number:</label>
                        <input type="text" class="form-control" id="updatemobile" placeholder="Enter Mobile Number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeplace">Place:</label>
                        <input type="text" class="form-control" id="updateplace" placeholder="Enter Place" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddenData">
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            displayData();
        });
        //display function
        function displayData() {
            var displayData = "true";
            $.ajax({
                url: "ajax_display.php",
                type: 'post',
                data: {
                    displaySend: displayData
                },
                success: function(data, status) {
                    $('#displayDataTable').html(data);

                }
            });
        }

        function adduser() {
            var nameAdd = $('#completename').val();
            var emailAdd = $('#completeemail').val();
            var mobileAdd = $('#completemobile').val();
            var placeAdd = $('#completeplace').val();

            // if (!nameAdd || nameAdd.length === 0) {
            //     message = "All fields are mandatory\\nFirst Name is required";
            //     messageDialog("Warning", message, "warning", 2);
            //     return false;
            // }else{

            
            $.ajax({
                url: "ajax_insert.php",
                type: "post",
                data: {
                    nameSend: nameAdd,
                    emailSend: emailAdd,
                    mobileSend: mobileAdd,
                    placeSend: placeAdd
                },
                // success: function(data, status) {
                //     $('#completeModal').modal('hide');
                //         displayData();
                success: function(data, status) {
                    if (data == "empty") {
                        $('#msg').removeClass("bg-success");
                        $('#msg').addClass("bg-danger");
                        $('#msg').html("FIELDS ARE REQUIRED.");
                    } else if (data == "empty_nameAdd") {
                        $('#msg').removeClass("bg-success");
                        $('#msg').addClass("bg-danger");
                        $('#msg').html("Please Enter your name.");
                        $("#msg").show();
                        setTimeout(function() {
                            $("#msg").hide();
                        },2000);
                        $('#completeModal').modal('hide');
                        displayData();
                    }
                     else if (data == "empty_emailAdd") {
                        $('#msg').removeClass("bg-success");
                        $('#msg').addClass("bg-danger");
                        $('#msg').html("Please Enter your Email Address.");
                        $("#msg").show();
                        setTimeout(function() {
                            $("#msg").hide();
                        },2000);
                        $('#completeModal').modal('hide');
                        displayData();
                    } else if (data == "empty_mobileAdd") {
                        $('#msg').removeClass("bg-success");
                        $('#msg').addClass("bg-danger");
                        $('#msg').html("Please Enter your Mobile number.");
                        $("#msg").show();
                        setTimeout(function() {
                            $("#msg").hide();
                        },2000);
                        $('#completeModal').modal('hide');
                        displayData();
                    } else if (data == "empty_placeAdd") {
                        $('#msg').removeClass("bg-success");
                        $('#msg').addClass("bg-danger");
                        $('#msg').html("Please Enter your Place.");
                        $("#msg").show();
                        setTimeout(function() {
                            $("#msg").hide();
                        },2000);
                        $('#completeModal').modal('hide');
                        displayData();
                    } else {
                        $('#completeModal').modal('hide');
                        displayData();
                    }
                }
            });
        }
    // }
        //Delete Record
        function DeleteUser(deleteid) {
            $.ajax({
                url: 'ajax_delete.php',
                type: 'post',
                data: {
                    daleteSend: deleteid
                },
                success: function(data, status) {
                    displayData();
                }
            });
        }

        //Update Function
        function getDetails(updateid) {
            $('#hiddenData').val(updateid);

            $.post("ajax_update.php", {
                updateid: updateid
            }, function(data, status) {
                var userid = JSON.parse(data);
                $('#updatename').val(userid.name);
                $('#updateemail').val(userid.email);
                $('#updatemobile').val(userid.mobile);
                $('#updateplace').val(userid.place);
            });
            $('#updateModel').modal('show');
        }

        //onclick event update function
        function updateDetails() {
            var updatename = $('#updatename').val();
            var updateemail = $('#updateemail').val();
            var updatemobile = $('#updatemobile').val();
            var updateplace = $('#updateplace').val();
            var hiddenData = $('#hiddenData').val();

            $.post("ajax_update.php", {
                updatename: updatename,
                updateemail: updateemail,
                updatemobile: updatemobile,
                updateplace: updateplace,
                hiddenData: hiddenData
            }, function(data, status) {
                $('#updateModel').modal('hide');
                displayData();
            });
        }
    </script>
</body>

</html>