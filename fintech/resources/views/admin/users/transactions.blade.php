@extends('admin.admin')
@section('users')


<div>
  <h2 class="m-2" style="color: blue">{{$users['name']}} Transactions</h2>

 
  <br>
  
  

<table class="table ml-2" style="width: 80vw">
  <thead>
    <tr>
      
      <th><h5>Sender</h5></th>
      <th><h5>Reciever</h5></th>
      <th><h5>Amount</h5></th>
      <th><h5>Status</h5></th>
      <th><h5>Date & Time</h5></th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transactions as $transaction){?>
    <tr>
        
        <td style="color: blue">{{$transaction['sender']['name']}}</td>
        @if($transaction['status']!='Failed')
        <td  style="color: rgb(9, 207, 9)">{{$transaction['reciever']['name']}}</td>
        @else
        <td style="color: red"> Not completed</td>
        @endif
        <td style="color:brown">{{$transaction['amount']}}</td>
        <td @if ($transaction['status']=='Failed') style="color: red" @endif  >{{$transaction['status']}}</td>
    </td>
    <td>{{$transaction['created_at']}}</td>
    </tr>
    <?php
}

?>

  </tbody>
</table>
<div style="margin: 0 45%">
  {!!$transactions->links()!!}
</div>
@endsection