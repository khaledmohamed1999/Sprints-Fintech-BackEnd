@extends('admin.admin')
@section('users')


<div>
  <h2 class="m-2" style="color: blue">Users</h2>

  @if (session()->has('message'))
<div  class="alert alert-success mb-3" role="alert">
    {{ Session::get('message')}}
  </div>
  @endif
  @if (session()->has('alert'))
<div  class="alert alert-danger" role="alert">
    {{ Session::get('alert')}}
  </div>
  @endif
  <br>
  
    <div style="display: inline-flexbox">
  <form method="POST" action="{{ url('admin/search') }}" enctype="multipart/form-data" >
    
    @csrf
    <label class="ml-5">Search By</label>
    <select class="form-group" name="search_name">
      <option value="name" {{ old('search_name') == 'name' ? 'selected' : '' }}>
              Search By Name</option>
           
                <option   {{ (request()->input('search') == 'phone_number') ? 'selected' : '' }}value="phone_number">
                 Search By Phone Number</option>
                    
                          <option value="email" {{ old('search_name') == 'email' ? 'selected' : '' }}>
                                  Search By E-mail</option>
            </select>
              <br>
    <input class=" border ml-5" type="text" placeholder="Search here" name="name" style="width: 255px">
								<button class="btn"><i class="fa fa-search"></i></button>
</form>
    </div>

<table class="table ml-2" style="width: 80vw">
  <thead>
    <tr>
      <th><h5>#Id</h5></th>
      <th><h5>Name</h5></th>
      <th><h5>E-mail</h5></th>
      <th><h5>Mobile NO.</h5></th>
      <th><h5>Balance</h5></th>
      <th><h5>Type</h5></th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user){?>
    <tr>
      <td>{{$user['id']}}</td>
      <td>{{$user['name']}}</td>
      <td>{{$user['email']}}</td>
      <td>{{$user['phone_number']}}</td>
      <td>{{$user['balance']}}</td>
      <td>{{$user['type']}}</td>
      <td>
        <a href="admin/user/transactions" style="color: green">Transactions</a>
      </td>
      <td   ><a  class="btn btn-primary" href="{{url('admin/users/'.$user['id'].'/edit')}}" role="button">EDIT</a></td> <td >
        <form action="{{ url('admin/users/'. $user['id']) }}" method="POST">
            @method('DELETE')
            @csrf
            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tr>
    <?php
}

?>

  </tbody>
</table>
<div style="margin: 0 45%">
  {!!$users->links()!!}
</div>
@endsection