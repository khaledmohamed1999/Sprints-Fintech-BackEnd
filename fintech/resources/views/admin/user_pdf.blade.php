<h1>Users</h1>


<table class="table ml-2" border="1" style="width: 80vw">
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
          </form>
      </td>
      </tr>
      <?php
  }
  
  ?>
  
    </tbody>
  </table>