<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="main-wrapper jecrc-page">
        <div class="right-container">
            <div class="content">
                <h3>Jecrc University</h3>
                <div class="action_sign_up_btn">
                    <!-- <div class="sign_up_btn">
                        <a href="{{route('verify-page')}}" role="">Sign Up
                        </a>
                    </div> -->
                </div>
            </div>
            <img src="{{asset('assets/container-pic-2.png')}}" alt="">
        </div>
        <div class="left-container">
            <div class="form-container">

                <div class="signinform">
                    <form action="{{route('jecrc.verify-otp')}}" method="POST" class="sign-in-form">
                        @csrf
                        <h2 class="title negative-margin">Aadhaar verificatiton</h2>
                        <h2 class="page_title mb-5">Please fill with your Aadhaar Details</h2>

                        <!-- Alert message -->
                        @if(session('message'))
                        <div class="alert alert-success text-center">{{session('message')}}</div>
                        @elseif(session('error'))
                        <div class="alert alert-danger text-center">{{session('error')}}</div>
                        @endif
            
                        @if($errors->any())
                        <p class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</p>
                        @endif

                        <div class="usernamew-100">
                            <div class="input-field">
                            <input type="text" name="otp" class="form-control" id="" placeholder="Enter otp no.">
                            @if($errors->has('otp'))
                            <li style="color: red">
                                {{$errors->first('otp')}}
                            </li>
                            @endif
                            </div>
                        </div>

                        
                        <input type="hidden" name="mobile_no" value="{{Session::get('userData')['mobile_no'] ? Session::get('userData')['mobile_no'] : ''}}">
                        
                        <div class="action_btn">
                            <div class="sign_in_btn">
                                <button class="submit-btn" type="submit">Sign in</button>
                            </div>
                        </div>
                        <p class="mt-4">Didn't get the otp? <a class="resend-btn" data-number="{{Session::get('userData')['mobile_no']}}" style="cursor:pointer;">click to resend</a></p>
                    </form>
                </div>
            </div>
        </div>
       

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous">
        </script>
</body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript">

    $(".resend-btn").click(function() {
        var data = $(this).data('number');

        $.ajax({
            type: 'GET',
            url: `${APP_BASE_URL}/resend-otp`,
            data: {'value': data},
    
            success: function(response){
                console.log(response);
                if(response == 1)
                {
                    alert("Code Resend")
                }
                else
                {
                    alert('some erro occur while resend process');
                }
            },
            error: function(response){
                alert('Error'+response);
            }
        });
    });
</script>
<script type="text/javascript">
    const APP_BASE_URL = "{{config('app.url')}}";
</script>

</html>