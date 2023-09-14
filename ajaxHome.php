<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operations Using AJAX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>

<body>
    <!-- <div class="container my-3">

        <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#completeModal">
            Add New User
        </button>
        <div id="displayDataTable">
        </div>
    </div> -->

    <!-- Add Modal -->
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
                    <div class="error-message"></div>
                    <div class="name-message"></div>
                    <div class="email-message"></div>
                    <div class="mobile-message"></div>
                    <div class="place-message"></div>
                    <div class="form-group">
                        <label for="completename">Name:</label>
                        <input type="text" class="form-control name" id="completename" placeholder="Enter Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeemail">Email:</label>
                        <input type="email" class="form-control email" id="completeemail" placeholder="Enter Email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completemobile">Mobile Number:</label>
                        <input type="text" class="form-control mobile" id="completemobile" placeholder="Enter Mobile Number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeplace">Place:</label>
                        <input type="text" class="form-control place" id="completeplace" placeholder="Enter Place" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark save_data">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="msg" class="text-black text-center p-1 rounded">
        &nbsp;
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="view_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">ID:
                        <h4 class="view_id"></h4>
                    </label><br>
                    <label for="">Name:
                        <h4 class="view_name"></h4>
                    </label><br>
                    <label for="">Email Address:
                        <h4 class="view_email"></h4>
                    </label><br>
                    <label for="">Mobile Number:
                        <h4 class="view_mobile"></h4>
                    </label><br>
                    <label for="">City:
                        <h4 class="view_place"></h4>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit model -->
    <div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error-message"></div>
                    <div class="name-message"></div>
                    <div class="email-message"></div>
                    <div class="mobile-message"></div>
                    <div class="place-message"></div>
                    <div class="form-group">
                        <input type="hidden" class="id">
                    </div>
                    <div class="form-group">
                        <label for="completename">Name:</label>
                        <input type="text" class="form-control edit_name" id="completename" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeemail">Email:</label>
                        <input type="email" class="form-control edit_email" id="completeemail" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completemobile">Mobile Number:</label>
                        <input type="text" class="form-control edit_mobile" id="completemobile" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="completeplace">Place:</label>
                        <input type="text" class="form-control edit_place" id="completeplace" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_data">Update Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete model -->
    <div class="modal fade" id="delete_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Are You sure you want to delete this data?</h1>
                    <input type="hidden" class="form-control delete_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary confirm_delete_data">Yes</button>
                </div>
            </div>
        </div>
    </div>
   
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="message-show"></div>
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-left">PHP CRUD Operations Using AJAX
                                <button type="button" class="btn btn-dark my-3 float-right" data-toggle="modal" data-target="#completeModal">
                                    Add New User
                                </button>
                            </h1>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Sr No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email Address</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-data">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script>
        //Add new user
        $(document).ready(function() {
            getData();

            //view
            $(document).on('click', ".view_data", function() {
                // alert("hello");
                var id = $(this).closest('tr').find('.id').text();
                //  alert(id);
                $.ajax({
                    type: "POST",
                    url: 'ajax_insert.php',
                    data: {
                        'click_view_btn': true,
                        'id': id,
                    },
                    success: function(response) {
                        //    console.log(response);
                        $.each(response, function(key, value) {
                            // console.log(value['name']);
                            $('.view_id').text(value['id']);
                            $('.view_name').text(value['name']);
                            $('.view_email').text(value['email']);
                            $('.view_mobile').text(value['mobile']);
                            $('.view_place').text(value['place']);
                        });

                        $('#view_data').modal('show');

                    }
                });

            });

            //edit
            $(document).on('click', ".edit_data", function() {
                // alert("hello");
                var id = $(this).closest('tr').find('.id').text();
                //  alert(id);
                $.ajax({
                    type: "POST",
                    url: 'ajax_insert.php',
                    data: {
                        'click_edit_btn': true,
                        'id': id,
                    },
                    success: function(response) {
                        //    console.log(response);
                        $.each(response, function(key, value) {
                            // console.log(value['name']);
                            $('.id').val(value['id']);
                            $('.edit_name').val(value['name']);
                            $('.edit_email').val(value['email']);
                            $('.edit_mobile').val(value['mobile']);
                            $('.edit_place').val(value['place']);
                        });

                        $('#edit_data').modal('show');

                    }
                });

            });

            //delete
            // $(document).on('click', ".delete_data", function() {
            //     // alert("hello");
            //     var id = $(this).closest('tr').find('.id').text();
            //     //  alert(id);
            //     $.ajax({
            //         type: "POST",
            //         url: 'ajax_insert.php',
            //         data: {
            //             'click_delete_btn': true,
            //             'id': id,
            //         },
            //         success: function(response) {
            //             //    console.log(response);
            //             $('.message-show').append('\
            //         <div class="alert alert-success alert-dismissible fade show" role="alert">\
            //         <strong>Success!</strong> ' + response + '\
            //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
            //         <span aria-hidden="true">&times;</span>\
            //         </button>\
            //         </div>');
            //             $('.table-data').html('');
            //             getData();
            //         }
            //     });

            // });

            $(document).on('click', ".confirm_delete_data", function() {
                // alert("hello");
                var id = $(this).closest('tr').find('.id').text();
                $('.delete_id').val(id);
                $('#delete_data').modal('show');
                
                //  alert('hii');
                $('.confirm_delete_data').click(function(e){
                    e.preventDefault();
                    // alert("You clicked yes.");
                   var delete_id= $('.delete_id').val();
                    // alert(delete_id);
                    $.ajax({
                    type: "POST",
                    url: 'ajax_insert.php',
                    data: {
                        'click_confirm_delete_btn': true,
                        'delete_id': delete_id,
                    },
                    success: function(response) {
                        //    console.log(response);
                        $('.message-show').append('\
                    <div class="alert alert-success alert-dismissible fade show" role="alert">\
                    <strong>Success!</strong> ' + response + '\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                    $('#delete_data').modal('hide');
                        $('.table-data').html('');
                        getData();
                    }
                });
                });
            });
           

            //update
            $('.update_data').click(function(e) {
                e.preventDefault();
                //   console.log('hello');
                var id = $('.id').val();
                var name = $('.edit_name').val();
                var email = $('.edit_email').val();
                var mobile = $('.edit_mobile').val();
                var place = $('.edit_place').val();
                // console.log(name);
                // function preg_match() {}
                if (name == "" & email == "" & mobile == "" & place == "") {
                    // console.log("please fill all fields.");
                    $('.error-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please fill all fileds.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');

                } else if (name == "") {
                    $('.name-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your name.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                }
                //  else if (name != preg_match("/^[a-zA-z]*$/")) {
                //     $('.name-message').append('\
                //     <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                //     <strong>Error!</strong> Only alphabets and whitespace are allowed.\
                //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                //     <span aria-hidden="true">&times;</span>\
                //     </button>\
                //     </div>');
                // } 
                else if (email == "") {
                    $('.email-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your email.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                } else if (mobile == "") {
                    $('.mobile-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your mobile.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                } else if (place == "") {
                    $('.place-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your place.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "ajax_insert.php",
                        data: {
                            'update_data': true,
                            'id': id,
                            'name': name,
                            'email': email,
                            'mobile': mobile,
                            'place': place
                        },
                        success: function(response) {
                            console.log(response);
                            $('#edit_data').modal('hide');
                            $('.message-show').append('\
                    <div class="alert alert-success alert-dismissible fade show" role="alert">\
                    <strong>Success!</strong> ' + response + '\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                            $('.table-data').html('');
                            getData();

                        }

                    });
                }
            });

            //save
            $('.save_data').click(function(e) {
                e.preventDefault();
                // console.log('hello');
                var name = $('.name').val();
                var email = $('.email').val();
                var mobile = $('.mobile').val();
                var place = $('.place').val();

                // function preg_match() {}
                if (name == "" & email == "" & mobile == "" & place == "") {
                    // console.log("please fill all fields.");
                    $('.error-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please fill all fileds.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');

                } else if (name == "") {
                    $('.name-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your name.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                }
                //  else if (name != preg_match("/^[a-zA-z]*$/")) {
                //     $('.name-message').append('\
                //     <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                //     <strong>Error!</strong> Only alphabets and whitespace are allowed.\
                //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                //     <span aria-hidden="true">&times;</span>\
                //     </button>\
                //     </div>');
                // } 
                else if (email == "") {
                    $('.email-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your email.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                } else if (mobile == "") {
                    $('.mobile-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your mobile.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                } else if (place == "") {
                    $('.place-message').append('\
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Error!</strong> Please enter your place.\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "ajax_insert.php",
                        data: {
                            'save_data': true,
                            'name': name,
                            'email': email,
                            'mobile': mobile,
                            'place': place
                        },
                        success: function(response) {
                            // console.log(response);
                            $('#completeModal').modal('hide');
                            $('.message-show').append('\
                    <div class="alert alert-success alert-dismissible fade show" role="alert">\
                    <strong>Success!</strong> ' + response + '\
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                    <span aria-hidden="true">&times;</span>\
                    </button>\
                    </div>');
                            $('.table-data').html('');
                            getData();

                        }

                    });
                }
            });
        });

        //Display Data from database
        function getData() {
            $.ajax({
                type: "GET",
                url: 'ajax_display.php',
                success: function(resopnse) {
                    $.each(resopnse, function(key, value) {
                        $('.table-data').append(' <tr>\
                                            <td class="id">' + value['id'] + '</th>\
                                            <td>' + value['name'] + '</td>\
                                            <td>' + value['email'] + '</td>\
                                            <td>' + value['mobile'] + '</td>\
                                            <td>' + value['place'] + '</td>\
                                            <td><a href="#" class="btn btn-warning btn-sm view_data">View</a>\
                                                <a href="#" class="btn btn-success btn-sm edit_data">Edit</a>\
                                            </td>\
                                            <td>\
                                            <a href="#" class="btn btn-danger btn-sm confirm_delete_data">Confirm Delete</a>\
                                            </td>\
                                        </tr>');
                    });
                }
            });
        }

    </script>
</body>

<!-- else if (data == "empty_nameAdd") { -->
<!-- //         $('#msg').removeClass("bg-success");
                //         $('#msg').addClass("bg-danger");
                //         $('#msg').html("Please Enter your name.");
                //         $("#msg").show();
                //         setTimeout(function() {
                //             $("#msg").hide();
                //         },2000);
                //         $('#completeModal').modal('hide');
                //         displayData();
                //     } -->

</html>