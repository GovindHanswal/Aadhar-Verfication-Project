<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form action="{{route('image-match')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" id="image-1" name="image-1">
      <input type="file" id="file" name="image-2">
      <button type="submit">Submit</button>
  </form>
  
</body>
</html>