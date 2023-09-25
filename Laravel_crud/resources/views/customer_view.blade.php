<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <title>Customer View</title>
    <style>
        table{
            width: 100;
        }
        thead {
            background-color: black;
            color: white;
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
            color: black;
        }

        div#tableId_info {
            color: black;
        }

        div#tableId_previous {
            color: black;
        }

        div#tableId_next {
            color: black;
        }
    </style>
</head>

<body>
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
    <div class="container" style="margin-top:40px">
        <a href="{{ url('/customer') }}">
            <button class="btn btn-primary float-end" style="margin-bottom:20px">Add Customer</button>
        </a>
        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
                <th>Customer ID</th>
                <th>Profile Picture</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Country</th>
                <th>Birth Date</th>
                <th>Hobbies</th>
                {{-- <th>Status</th> --}}
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>
                        {{-- <td>{{$customer->image}}</td> --}}
                        <td>
                            <img src="{{ asset('storage/images/' . $customer->image) }}" width="100px" height="100px"
                                alt="Image">
                        </td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            @if ($customer->gender == 'M')
                                Male
                            @elseif($customer->gender == 'F')
                                Female
                            @else
                                Other
                            @endif
                        </td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->country }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($customer->dob))->format('d-m-Y')}}</td>
                        <td>
                            {{ $customer->hobby }}
                        </td>
                        {{-- <td>
                            @if ($customer->status == '1')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td> --}}
                        <td>
                            <a href="{{ route('customer.delete', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            <a href="{{ route('customer.edit', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
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
