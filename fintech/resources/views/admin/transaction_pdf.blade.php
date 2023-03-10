
<h1>Transactions</h1>

    <table class="table ml-2" border="1" style="width: 80vw">
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

                <td style="color: blue">{{ $transaction['sender'] }}</td>
                @if ($transaction['status'] != 'Failed')
                    <td style="color: rgb(9, 207, 9)">{{ $transaction['reciever'] }}</td>
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
    <script>
        window.addEventListener("load", (event) => {
        window.print();
            });</script>