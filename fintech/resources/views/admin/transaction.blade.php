@extends('admin.admin')
@section('users')
    <div>
        <h2 class="m-2" style="color: blue"> Transactions</h2>


        <br>

        <div style="display: inline-flexbox">
            <form method="GET" action="{{ url('admin/search/transaction') }}" enctype="multipart/form-data">

                @csrf
                <label class="ml-5">Search By</label>
                <select class="form-group" name="search_name">
                    <option value="amount">
                        Search By Amount</option>

                    <option value="status">
                        Search By Status</option>

                    <option value="created_at">
                        Search By Date & Time</option>
                </select>
                <br>
                <input class=" border ml-5" type="text" placeholder="Search here" name="name" style="width: 240px">
                <button class="btn"><i class="fa fa-search"></i></button>
            </form>
            <a href="{{url('admin/transactions/pdf')}}"  class="btn btn-success  " style="margin:0 0 1% 85% "><i class="fas fa-file-download"></i> Download PDF</a>
        </div>


        <table class="table ml-2" style="width: 80vw">
            <thead>
                <tr>

                    <th>
                        <h5>Sender</h5>
                    </th>
                    <th>
                        <h5>Reciever</h5>
                    </th>
                    <th>
                        <h5>Amount</h5>
                    </th>
                    <th>
                        <h5>Status</h5>
                    </th>
                    <th>
                        <h5>Date & Time</h5>
                    </th>
                    <th>
                        <h5>Method</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction){?>
                <tr>

                    <td style="color: blue">{{ $transaction['sender']['name'] }}</td>
                    @if ($transaction['status'] != 'Failed')
                        <td style="color: rgb(9, 207, 9)">{{ $transaction['reciever']['name'] }}</td>
                    @else
                        <td style="color: red"> Not completed</td>
                    @endif
                    <td style="color:brown">{{ $transaction['amount'] }}</td>
                    <td @if ($transaction['status'] == 'Failed') style="color: red" @endif>{{ $transaction['status'] }}</td>
                    </td>
                    <td>{{ $transaction['created_at'] }}</td>
                    <td>{{ $transaction['method'] }}</td>
                </tr>
                <?php
                      }

              ?>

            </tbody>
        </table>
        <div style="margin: 0 45%">
            {!! $transactions->links() !!}
        </div>
    @endsection
