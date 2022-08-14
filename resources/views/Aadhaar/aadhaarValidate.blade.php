<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aadhaar validation</title>
    <link rel="stylesheet" href="{{asset('css/aadhaar.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="form-wrapper">
    <h3 class="mb-2">Aadhaar verification</h3>

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
        <form class="my-form" action="{{route('verify-aadhaar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Aadhaar no.</label>
                <input type="aadhhar_no" name="aadhaar_no" class="form-control" id="" placeholder="Enter aadhaar no.">
                @if($errors->has('aadhaar_no'))
                <li style="color: red">
                    {{$errors->first('aadhaar_no')}}
                </li>
                @endif
            </div>
            <p>Already a user, <a href="{{route('login')}}"> Login page</a></p>
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>