<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link href="{{ url('css/style.css') }}" rel="stylesheet" />
</head>
<body style="padding: 100px">
    <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Add Vendor</h1>
<form method="POST" action="{{ url('admin/vendor/create') }}" enctype="multipart/form-data">
    @csrf
    
    <input  class="form-group hidden" name="user_id" type="hidden" value="{{$user['id']}}"  />
   
    <br>
    <label>Vendor Image</label>
    <br>
    <input name="image" type="file" /><br />
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br><br><br>
    <button class="btn btn-primary">Add</button>
    <a class="btn btn-secondary" href="{{ url('admin/vendors') }}">Cancel</a>
</form>
</body>
</html>