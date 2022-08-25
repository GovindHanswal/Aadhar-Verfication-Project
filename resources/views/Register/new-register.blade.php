<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register page</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
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
                    <div class="bullet active no-transition" >
                        <span></span>
                    </div>
                    <div class="check fas fa-"></div>
                </div>
                <div class="step">
                    <p>
                            
                    </p>
                    <div class="bullet active">
                        <span></span>
                    </div>
                    <div class="check fas fa-check "></div>
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
            <div class="form-container register-form-container" data-aos="fade-right" data-aos-duration="1000">
                <div class="signinform">
                    <form action="{{route('register-create')}}" method="POST" class="sign-in-form" enctype="multipart/form-data">
                        @csrf
                        <h2 class="title">Register</h2>
                        <div class="usernamew-100">
                            <div class="input-field">
                                <input type="text" name="full_name" id="user_name" placeholder="Enter your full name" autocomplete='false'>
                                @if($errors->has('full_name'))
                                <li style="color: red">
                                    {{$errors->first('full_name')}}
                                </li>
                                @endif
                            </div>
                        </div>
                           
                        <div class="">
                            <label for="formFile" class="input-label" class="form-label">Profile image :</label>
                            <input class="form-control" name="profile_image" type="file" id="formFile">
                            @if($errors->has('10_marksheet'))
                            <li style="color: red">
                                {{$errors->first('10_marksheet')}}
                            </li>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="usernamew-100">
                                    <div class="input-field">
                                        <input type="text" name="mobile_no"  placeholder="Enter your mobile no." autocomplete='false'>
                                        @if($errors->has('mobile_no'))
                                        <li style="color: red">
                                            {{$errors->first('mobile_no')}}
                                        </li>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="usernamew-100">
                                    <div class="input-field">
                                        <input type="email" name="email"  placeholder="example@gmail.com" autocomplete='false'>
                                        @if($errors->has('email'))
                                        <li style="color: red">
                                            {{$errors->first('email')}}
                                        </li>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="usernamew-100">
                                    <div class="input-field">
                                        <input type="text" name="father_name"  placeholder="Enter your father name" autocomplete='false'>
                                        @if($errors->has('father_name'))
                                        <li style="color: red">
                                            {{$errors->first('father_name')}}
                                        </li>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="usernamew-100">
                                <label for="formFile" class="input-label" class="form-label" style="margin-bottom:-3px;">Date of Birth :</label>
                                    <div class="input-field">
                                        <input type="date" name="dob"  placeholder="enter your date of birth">
                                    </div>
                                    @if($errors->has('dob'))
                                    <li style="color: red">
                                        {{$errors->first('dob')}}
                                    </li>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <select class="form-select select-input" name="course" aria-label="Default select example">
                                    <option selected disabled>Select course</option>
                                        <option value="Bca">BCA</option>
                                        <option value="Mca">MCA</option>
                                        <option value="B.Tech">B.tech</option>
                                        <option value="M.Tech">M.tech</option>
                                    </select>
                                    @if($errors->has('course'))
                                    <li style="color: red">
                                        {{$errors->first('course')}}
                                    </li>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <label for="formFile" class="input-label" class="form-label">Upload 10th marksheet :</label>
                                    <input class="form-control" name="10_marksheet" type="file" id="formFile">
                                    @if($errors->has('10_marksheet'))
                                    <li style="color: red">
                                        {{$errors->first('10_marksheet')}}
                                    </li>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="">
                                    <label for="formFile" class="input-label" class="form-label">Upload 12th marksheet :</label>
                                    <input class="form-control" name="12_marksheet" type="file" id="formFile">
                                    @if($errors->has('12_marksheet'))
                                    <li style="color: red">
                                        {{$errors->first('12_marksheet')}}
                                    </li>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-2">
                                <label for="gender">Gender: </label>
                            </div>
                            <div class="col-2 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" checked>
                                    <label class="form-check-label mr-4" for="exampleRadios1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input ml-2" type="radio" name="gender" id="exampleRadios2" value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- <input type="hidden" name="college_name" value="{{Session::get('collegeData')['college_name']}}">
                        <input type="hidden" name="college_id" value="{{Session::get('collegeData')['college_id']}}"> --}}
                        {{-- <input type="hidden" name="aadhaar_no" value="{{Session::get('userData')['aadhaar_no'] ? Session::get('userData')['aadhaar_no'] : ''}}"> --}}

                        <div class="action_btn" style="margin-top:20px">
                            <div class="sign_in_btn">
                                <button class="submit-btn" type="submit">Sign up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="content">
                <h3>{{-- Session::get('collegeData')['college_name'] --}}</h3>
            </div>
            <img src="{{asset('assets/container-pic-2.png')}}" alt="">
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
</body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-39066431-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-39066431-1');
</script>
<script src="{{asset('js/aos.js')}}"></script>

<script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

<script>
    $('.alert-success').delay(1000).fadeOut('slow');
</script>



</html>