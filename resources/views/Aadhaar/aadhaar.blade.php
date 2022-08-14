<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aadhaar store</title>
    <link rel="stylesheet" href="{{asset('css/aadhaar.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="form-wrapper">
    <h3 class="mb-2">Store aadhaar details</h3>

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
        <form class="my-form" action="{{route('aadhaar-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Aadhaar no.</label>
                        <input type="aadhhar_no" name="aadhaar_no" class="form-control" id="" placeholder="Enter aadhaar no.">
                        @if($errors->has('aadhaar_no'))
                        <li style="color: red">
                            {{$errors->first('aadhaar_no')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image:</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                        @if($errors->has('image'))
                        <li style="color: red">
                            {{$errors->first('image')}}
                        </li>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Name:</label>
                        <input type="name" class="form-control" name="name" id="" placeholder="Enter name">
                        @if($errors->has('name'))
                        <li style="color: red">
                            {{$errors->first('name')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Father name:</label>
                        <input type="father_name" name="father_name" class="form-control" id="" placeholder="Enter father name">
                        @if($errors->has('father_name'))
                        <li style="color: red">
                            {{$errors->first('father_name')}}
                        </li>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Mobile No.</label>
                        <input type="mobile_no" name="mobile_no" class="form-control" id="" placeholder="Enter mobile">
                        @if($errors->has('mobile_no'))
                        <li style="color: red">
                            {{$errors->first('mobile_no')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Age:</label>
                            <input type="mobile_no" name="age" class="form-control" id="" placeholder="Enter age">
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
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
        </form>
    </div>
    <a href="{{route('verify-page')}}" class="btn btn-success mt-4">Aadhaar verification</a>
</body>
</html>