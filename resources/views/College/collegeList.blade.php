<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College List</title>
    <!-- <link rel="stylesheet" href="{{asset('css/login.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/college.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="main-wrapper">
        <div class="left-container">
                <h2 class="title">Register In</h2>
            <ul>
                <div class="jnu_container">
                    <img src="{{asset('assets/jnu_logo.png')}}" alt="">

                    <li><a href="{{route('verify-page')}}">Jaipur national University</a></li>
                </div>
                <div class="jecrc_container">
                    <img src="{{asset('assets/jecrc_logo.png')}}" alt="">

                    <li><a href="{{route('jecrc.aadhaarVerificationPage')}}">Jecrc University</a></li>
                </div>
            </ul>
        </div>
        <div class="right-container">
            <div class="content">
                <h3>Already a member ?</h3>
                <div class="action_sign_up_btn mt-3">
                    <div class="sign_up_btn">
                        <a href="{{route('login')}}" role="">Login
                        </a>
                    </div>
                </div>
            </div>
            <img src="{{asset('assets/college_list_pic_login.png')}}" alt="">
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>    
