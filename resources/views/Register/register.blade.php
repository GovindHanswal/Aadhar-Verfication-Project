<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="{{asset('css/aadhaar.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="form-wrapper">
    <h3 class="mb-2">Registration page</h3>

    <!-- Alert message -->
    @if(session('message'))
    <div class="alert alert-success text-center">{{session('message')}}</div>
    @elseif(session('error'))
    <div class="alert alert-danger text-center">{{session('error')}}</div>
    @endif

    @if($errors->any())
    <p class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</p>
    @endif
    
    <div class="form-container mt-4">
        <form class="my-form" action="{{route('register-create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Full name</label>
                        <input type="text" name="full_name" class="form-control" id="" placeholder="Enter first name">
                        @if($errors->has('full_name'))
                        <li style="color: red">
                            {{$errors->first('full_name')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Age:</label>
                            <input type="text" name="age" class="form-control" id="" placeholder="Enter age">
                            @if($errors->has('age'))
                            <li style="color: red">
                                {{$errors->first('age')}}
                            </li>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Father name:</label>
                        <input type="text" name="father_name" class="form-control" id="" placeholder="Enter father name">
                        @if($errors->has('father_name'))
                        <li style="color: red">
                            {{$errors->first('father_name')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Mobile No.</label>
                        <input type="text" name="mobile_no" class="form-control" id="" placeholder="Enter mobile">
                        @if($errors->has('mobile_no'))
                        <li style="color: red">
                            {{$errors->first('mobile_no')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="" placeholder="example@gmail.com">
                        @if($errors->has('email'))
                        <li style="color: red">
                            {{$errors->first('email')}}
                        </li>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload 10th marksheet:</label>
                        <input class="form-control" name="10_marksheet" type="file" id="formFile">
                        @if($errors->has('10_marksheet'))
                        <li style="color: red">
                            {{$errors->first('10_marksheet')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload 12th marksheet:</label>
                        <input class="form-control" name="12_marksheet" type="file" id="formFile">
                        @if($errors->has('12_marksheet'))
                        <li style="color: red">
                            {{$errors->first('12_marksheet')}}
                        </li>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="course" class="mb-2">course: </label>
                    <div class="mb-3">
                        <select class="form-select" name="course" aria-label="Default select example">
                        <option selected disabled>Select course</option>
                            <option value="Bca">BCA</option>
                            <option value="Mca">MCA</option>
                            <option value="B.Tech">B.tech</option>
                            <option value="M.Tech">M.tech</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <label for="gender">Gender: </label>
                </div>
                <div class="col-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="2">
                        <label class="form-check-label" for="exampleRadios2">
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="aadhaar_no" value="{{Session::get('userData')['aadhaar_no'] ? Session::get('userData')['aadhaar_no'] : ''}}">

            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
            <a class="btn btn-success submit-btn" style="margin-right:10px" href="{{route('verify-page')}}">Back</a>
        </form>
    </div>
    <!-- <a href="{{route('verify-page')}}" class="btn btn-success mt-4">Aadhaar verification</a> -->
</body>
</html>