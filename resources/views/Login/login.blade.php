<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/aadhaar.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="form-wrapper">
    <h3 class="mb-2">Login page</h3>

    <!-- Alert message -->
    @if(session('message'))
    <div class="alert alert-success text-center">{{session('message')}}</div>
    @elseif(session('error'))
    <div class="alert alert-danger text-center">{{session('error')}}</div>
    @endif

    @if($errors->any())
    <p class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</p>
    @endif
    
    <div class="small-form-container mt-4">
        <form class="my-form" action="{{route('login.authenticate')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" id="" placeholder="Enter Username">
                @if($errors->has('username'))
                <li style="color: red">
                    {{$errors->first('username')}}
                </li>
                @endif
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="" placeholder="Enter Password">
                    @if($errors->has('password'))
                    <li style="color: red">
                        {{$errors->first('password')}}
                    </li>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
        </form>
        <p class="mt-2">New User, <a href="{{route('verify-page')}}">Click here</a> to Register</p>
    </div>
</body>
</html>