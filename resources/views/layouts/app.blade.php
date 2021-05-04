<html>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="http://192.168.0.10:8000" class="nav-link active">Home</a></li>
            <li class="nav-item"><a href="http://192.168.0.10:8000/industry" class="nav-link">Industry</a></li>
            <li class="nav-item"><a href="http://192.168.0.10:8000/users" class="nav-link">Users</a></li>
            <li class="nav-item"><a href="http://192.168.0.10:8000/employment_type" class="nav-link">Employment type</a></li>
        </ul>
    </header>
</div>
<head>
    <title>App Name - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
          rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #9C27B0;
            color: white;
            text-align: center;
        }

    </style>

</head>

<body>
@section('sidebar')

@show

<div class="container">
    @yield('content')
</div>

</body>

</html>
