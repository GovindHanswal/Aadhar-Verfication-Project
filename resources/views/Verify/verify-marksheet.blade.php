<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Marksheet</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="main-wrapper">
        <div class="left-container">
            <div class="progress-bar">
                <div class="step">
                    <p>
                            
                    </p>
                    <div class="bullet">
                        <span></span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>
                            
                    </p>
                    <div class="bullet">
                        <span></span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>
                            
                    </p>
                    <div class="bullet">
                        <span></span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>
            <div class="form-container">
                <div class="signinform">
                    <form action="{{route('jnu-marksheet-verify')}}" method="POST" class="sign-in-form">
                        @csrf
                        <h2 class="title negative-margin">Verify Marksheet</h2>
                        <h2 class="page_title mb-5">Please fill with your Details</h2>

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
                            <input type="text" name="10th_roll" class="form-control" id="" placeholder="Enter 10th roll number">
                            @if($errors->has('10th_roll'))
                            <li style="color: red">
                                {{$errors->first('10th_roll')}}
                            </li>
                            @endif
                            </div>
                        </div>

                        <div class="usernamew-100">
                            <div class="input-field">
                            <input type="text" name="12th_roll" class="form-control" id="" placeholder="Enter 12th roll number">
                            @if($errors->has('12th_roll'))
                            <li style="color: red">
                                {{$errors->first('12th_roll')}}
                            </li>
                            @endif
                            </div>
                        </div>

                        <div class="action_btn">
                            <div class="sign_in_btn">
                                <button class="submit-btn" type="submit">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="content">
                <h3>Verify Marksheet</h3>
            </div>
            <img src="{{asset('assets/container-pic-2.png')}}" alt="">
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous">
        </script>
</body>

</html>