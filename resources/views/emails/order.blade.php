<html>
    <head>
        <body>
            <h4> Shopper ,Welcome to shopper</h4>

            <h4>Name : {{$order_data['name']}}</h4>
            <h4>Contact : {{$order_data['contact']}}</h4>
            <h4>Alternate contact : {{ $order_data['alternate_contact'] }}</h4>
            <h4>Address : {{ $order_data['address'] }}</h4>
            <h4>City : {{ $order_data['city'] }}</h4>
            <h4>Zip code : {{ $order_data['zip_code'] }}</h4>
            <h4>order tracking : {{$order_data['track_no']}}</h4>

            <table cellpadding = "1" cellspacing="1" border="1">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>quantity</th>
                        <th>price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total ="0" @endphp
                    @foreach ($cart_data as $data )
                    <tr>
                        <td>{{$data['item_name']}}</td>
                        <td>{{$data['item_quantity']}}</td>
                        <td>{{ number_format((float)$data['item_price'],2) }}</td>
                    </tr>
                    @php $total = $total + ($data["item_quantity"] * (float)$data["item_price"]) @endphp
                    @endforeach
                    <tr>
                        <td colspan="2">Grand Total: </td>
                        <td> BDT: {{number_format($total,2)}}</td>
                    </tr>
                </tbody>
            </table>
        </body>
    </head>
</html>
