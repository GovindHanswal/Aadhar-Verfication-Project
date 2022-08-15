<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="main-wrapper">
        <div class="left-container">
            <ul>
                <li><a href="{{route('verify-page')}}">Register into Jaipur national University</a></li>
                <li><a href="{{route('jecrc.aadhaarVerificationPage')}}">Register into Jecrc University</a></li>
            </ul>
        </div>
        <div class="right-container">
            <div class="content">
                <h3>College List</h3>
            </div>
            <img src="{{asset('assets/container-pic-2.png')}}" alt="">
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
</body>

</html>