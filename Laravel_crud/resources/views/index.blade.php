<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

        body {
            margin: 0;
            box-sizing: border-box;
        }

        /* CSS for header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f5f5f5;
        }

        .header .logo {
            font-size: 25px;
            font-family: 'Sriracha', cursive;
            color: #000;
            text-decoration: none;
            margin-left: 30px;
        }

        .nav-items {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #f5f5f5;
            margin-right: 20px;
        }

        .nav-items a {
            text-decoration: none;
            color: #000;
            padding: 35px 20px;
        }

        /* CSS for main section */
        .intro {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 520px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://images.unsplash.com/photo-1587620962725-abab7fe55159?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1031&q=80");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .intro h1 {
            font-family: sans-serif;
            font-size: 60px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
        }

        .intro p {
            font-size: 20px;
            color: #d1d1d1;
            text-transform: uppercase;
            margin: 20px 0;
        }

        .intro button {
            background-color: #5edaf0;
            color: #000;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)
        }

        .achievements {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 40px 80px;
        }

        .achievements .work {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
        }

        .achievements .work i {
            width: fit-content;
            font-size: 50px;
            color: #333333;
            border-radius: 50%;
            border: 2px solid #333333;
            padding: 12px;
        }

        .achievements .work .work-heading {
            font-size: 20px;
            color: #333333;
            text-transform: uppercase;
            margin: 10px 0;
        }

        .achievements .work .work-text {
            font-size: 15px;
            color: #585858;
            margin: 10px 0;
        }

        .about-me {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 80px;
            border-top: 2px solid #eeeeee;
        }

        .about-me img {
            width: 500px;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .about-me-text h2 {
            font-size: 30px;
            color: #333333;
            text-transform: uppercase;
            margin: 0;
        }

        .about-me-text p {
            font-size: 15px;
            color: #585858;
            margin: 10px 0;
        }

        /* CSS for footer */
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #302f49;
            padding: 40px 80px;
        }

        .footer .copy {
            color: #fff;
        }

        .bottom-links {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 40px 0;
        }

        .bottom-links .links {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
        }

        .bottom-links .links span {
            font-size: 20px;
            color: #fff;
            text-transform: uppercase;
            margin: 10px 0;
        }

        .bottom-links .links a {
            text-decoration: none;
            color: #a1a1a1;
            padding: 10px 20px;
        }
    </style>
    <title>Hello, world!</title>
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
    <div class="intro">
        <h1>A Web Developer</h1>
        <p>I am a web developer and I love to create websites.</p>
        <button>Learn More</button>
    </div>
    <div class="achievements">
        <div class="work">
            <i class="fas fa-atom"></i>
            <p class="work-heading">Projects</p>
            <p class="work-text">I have worked on many projects and I am very proud of them. I am a very good developer
                and I am always looking for new projects.</p>
        </div>
        <div class="work">
            <i class="fas fa-skiing"></i>
            <p class="work-heading">Skills</p>
            <p class="work-text">I have a lot of skills and I am very good at them. I am very good at programming and I
                am always looking for new skills.</p>
        </div>
        <div class="work">
            <i class="fas fa-ethernet"></i>
            <p class="work-heading">Network</p>
            <p class="work-text">I have a lot of network skills and I am very good at them. I am very good at networking
                and I am always looking for new network skills.</p>
        </div>
    </div>
    <div class="about-me">
        <div class="about-me-text">
            <h2>About Me</h2>
            <p>I am a web developer and I love to create websites. I am a very good developer and I am always looking
                for new projects. I am a very good developer and I am always looking for new projects.</p>
        </div>
        <img src="https://images.unsplash.com/photo-1596495578065-6e0763fa1178?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80"
            alt="me">
    </div>
    <footer class="footer">
        <div class="copy">&copy; 2022 Developer</div>
        <div class="bottom-links">
            <div class="links">
                <span>More Info</span>
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/customer')}}">Register</a>
                <a href="{{url('/customer/view')}}">Customers</a>
            </div>
            <div class="links">
                <span>Social Links</span>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>
