@component('mail::message')
Purchase Successful

Your order has been completed!
Your order details are as follows:

Transaction ID: {{$order->transaction_id}}


    
| Items         |   Quantity      |   Price(₦)  |
| ----------------------------- |:---------------------------:| -------------------------------:|
@foreach($order_details as $detail)
| **{{$detail->product->product_name}}** | {{$detail->quantity}} | {{number_format($detail->price)}} |
@endforeach



Thanks,<br>
{{ config('app.name') }}
@endcomponent