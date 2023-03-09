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
    
<h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Edit User</h1>
<form method="POST" action="{{ url('admin/users/'.$user['id']) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label>Name</label>
    <input class="form-control" name="name" value="{{ old('name',$user->name) }}" />
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label>E-mail</label>
    <input class="form-control " name="email" value="{{ old('email',$user->email) }}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label>Balance</label>
    <input class="form-control" name="balance" type="number" value="{{ old('balance',$user->balance) }}" />
    @error('balance')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label>Phone Number</label>
    <input class="form-control" name="phone_number" type="text" value="{{ old('phone_number',$user->phone_number) }}"  />
    @error('phone_number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label>Type</label><br> <input class="form-control" name="type" type="text" value="{{ old('type',$user->type) }}" /></label>
    @error('type')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <br>
    <label>Is Admin <input name="is_admin" type="checkbox" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} /></label>
    <br />
    
    <button class="btn btn-primary">Edit</button>
    <a class="btn btn-secondary" href="{{ url('admin/') }}">Cancel</a>
</form>

</body>
</html>