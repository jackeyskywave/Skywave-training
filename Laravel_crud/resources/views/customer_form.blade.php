<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
        integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        label {
            color: rgb(31, 27, 27);
            /* font-weight: bold; */
        }
    </style>

    <title>Customer Registration Form</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
        integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/customer') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/customer/view') }}">Customers</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">{{ $title }}</h3>
                            <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="name">Name:</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-lg"
                                                value="{{ old('name', $customer->name) }}" />
                                            <span class="text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="email">Email:</label>
                                            <input type="text" id="email" name="email"
                                                class="form-control form-control-lg"
                                                value="{{ old('email', $customer->email) }}" />
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-outline">
                                    <label class="form-label" for="image">Profile Picture:</label>
                                    @if ($customer->image)
                                        <input type="file" name="image" class="form-control form-control-lg">
                                        <br>
                                        <img src="{{ asset('storage/images/' . $customer->image) }}" alt="Image"
                                            width="100px" height="100px">
                                    @else
                                        <input type="file" name="image" class="form-control form-control-lg"
                                            id="formFileLg" src="{{ asset('storage/images/' . $customer->image) }}"
                                            width="100px" height="100px">
                                    @endif


                                    <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <br>
                                    {{-- <img src="{{asset('storage/images/'.$customer->image)}}" width="100px" height="100px"> --}}

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="password">Password:</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-lg"
                                                value="{{ $customer->password }}" />
                                            <span class="text-danger">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="password_confirmation">Confirm
                                                Password:</label>
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation" class="form-control form-control-lg"
                                                value="{{ $customer->password_confirmation }}" />
                                            <span class="text-danger">
                                                @error('password_confirmation')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-outline">
                                    <label class="form-label" for="address">Address:</label>
                                    <textarea name="address" id="address" cols="30" rows="2" class="form-control form-control-lg">{{ old('address', $customer->address) }}</textarea>
                                    <span class="text-danger">
                                        @error('address')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <br>
                                <div class="form-outline">
                                    <label class="form-label" for="country">Country:</label>
                                    <select name="country[]" class="selectpicker form-control form-control-lg"
                                        multiple aria-label="size 3 select example"> 

                                        <option value="Russia"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('Russia', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('Russia', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            Russia</option>
                                        <option value="Canada"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('Canada', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('Canada', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            Canada</option>
                                        <option value="China"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('China', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('China', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            China</option>
                                        <option value="United States"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('United States', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('United States', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            United States</option>
                                        <option value="Brazil"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('Brazil', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('Brazil', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            Brazil</option>
                                        <option value="Australia"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('Australia', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('Australia', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            Australia</option>
                                        <option value="India"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('India', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('India', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            India</option>
                                        <option value="Argentina"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('Argentina', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('Argentina', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            Argentina</option>
                                        <option value="Kazakhstan"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('Kazakhstan', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('Kazakhstan', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            Kazakhstan</option>
                                        <option value="Algeria"
                                        @if (old('country'))
                                        {{ (is_array(old('country')) and in_array('Algeria', old('country'))) ? ' selected' : '' }}
                                        @else
                                        {{ in_array('Algeria', explode(',', $customer->country)) ? 'selected' : '' }}
                                        @endif>
                                            Algeria</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('country')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="gender">Gender:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="femaleGender" value="F"
                                                {{ old('gender', $customer->gender) == 'F' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="maleGender" value="M"
                                                {{ old('gender', $customer->gender) == 'M' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="otherGender" value="O"
                                                {{ old('gender', $customer->gender) == 'O' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>
                                        <br>
                                        <span class="text-danger">
                                            @error('gender')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label">Birthday</label>
                                            <input type="date" class="form-control form-control-lg"
                                                id="birthdayDate" name="dob"
                                                value="{{ old('dob', $customer->dob) }}" />
                                            <span class="text-danger">
                                                @error('dob')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-outline">
                                    <label class="form-label" for="name">Hobbies:</label>
                                    <div class="custom-control  checkbox-lg custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" 
                                            name="hobby[]" value="Dancing"
                                            @if (old('hobby'))
                                            {{ (is_array(old('hobby')) and in_array('Dancing', old('hobby'))) ? ' checked' : '' }}
                                            @else
                                            {{ in_array('Dancing', explode(',', $customer->hobby)) ? 'checked' : '' }}
                                            @endif
                                            >
                                        <label class="custom-control-label" for="defaultInline1"
                                            style="color: black">Dancing</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="custom-control  custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" 
                                            name="hobby[]" value="Singing"
                                            @if (old('hobby'))
                                            {{ (is_array(old('hobby')) and in_array('Singing', old('hobby'))) ? ' checked' : '' }}
                                            @else
                                            {{ in_array('Singing', explode(',', $customer->hobby)) ? 'checked' : '' }}
                                            @endif>
                                        <label class="custom-control-label" for="defaultInline1"
                                            style="color: black">Singing</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="custom-control  custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" 
                                            name="hobby[]" value="Drawing"
                                            @if (old('hobby'))
                                            {{ (is_array(old('hobby')) and in_array('Drawing', old('hobby'))) ? ' checked' : '' }}
                                            @else
                                            {{ in_array('Drawing', explode(',', $customer->hobby)) ? 'checked' : '' }}
                                            @endif>
                                        <label class="custom-control-label" for="defaultInline1"
                                            style="color: black">Drawing</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="custom-control  custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" 
                                            name="hobby[]" value="Sketching"
                                            @if (old('hobby'))
                                            {{ (is_array(old('hobby')) and in_array('Sketching', old('hobby'))) ? ' checked' : '' }}
                                            @else
                                            {{ in_array('Sketching', explode(',', $customer->hobby)) ? 'checked' : '' }}
                                            @endif>
                                        <label class="custom-control-label" for="defaultInline1"
                                            style="color: black">Sketching</label>
                                    </div>
                                    <span class="text-danger">
                                        @error('hobby')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-primary"> Submit </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
