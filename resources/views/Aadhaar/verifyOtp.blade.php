<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Otp</title>
    <link rel="stylesheet" href="{{asset('css/aadhaar.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="form-wrapper">
    <h3 class="mb-2">Mobile number verification</h3>

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
        <form class="my-form" action="{{route('verify-otp')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">OTP</label>
                <input type="text" name="otp" class="form-control" id="" placeholder="Enter OTP">
                @if($errors->has('otp'))
                <li style="color: red">
                    {{$errors->first('otp')}}
                </li>
                @endif
            </div>
            <p>Didn't get the otp? <a class="resend-btn" data-number="{{Session::get('userData')['mobile_no']}}" style="cursor:pointer;">click to resend</a></p>

            <input type="hidden" name="mobile_no" value="{{Session::get('userData')['mobile_no'] ? Session::get('userData')['mobile_no'] : ''}}">
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
            <a class="btn btn-success submit-btn" style="margin-right:10px" href="{{route('verify-page')}}">Back</a>
        </form>

    </div>
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
                    alert("Successfully resend")
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