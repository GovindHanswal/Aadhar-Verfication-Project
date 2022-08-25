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
    <h3 class="mb-2">Create Marksheet</h3> 

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
        <form class="my-form" action="{{route('admin.store-marksheet-data')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">10th roll number</label>
                        <input type="aadhhar_no" name="10th_roll" class="form-control" id="" placeholder="Enter 10th roll number">
                        @if($errors->has('10th_roll'))
                        <li style="color: red">
                            {{$errors->first('10th_roll')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                <div class="mb-3">
                        <label for="" class="form-label">12th roll number</label>
                        <input type="aadhhar_no" name="12th_roll" class="form-control" id="" placeholder="Enter 12th roll number">
                        @if($errors->has('12th_roll'))
                        <li style="color: red">
                            {{$errors->first('12th_roll')}}
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
                        <label for="" class="form-label">Mother name</label>
                        <input type="mobile_no" name="mother_name" class="form-control" id="" placeholder="Enter mother name">
                        @if($errors->has('mother_name'))
                        <li style="color: red">
                            {{$errors->first('mother_name')}}
                        </li>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Age:</label>
                            <input type="date" name="dob" class="form-control" id="" placeholder="Enter age">
                            @if($errors->has('dob'))
                            <li style="color: red">
                                {{$errors->first('dob')}}
                            </li>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
        </form>
    </div>
    <a href="{{route('college-list')}}" class="btn btn-success mt-4">Home page</a>
</body>
</html>