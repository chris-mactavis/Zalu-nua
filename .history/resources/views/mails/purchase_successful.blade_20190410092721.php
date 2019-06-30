@component('mail::message')
Purchase Successful

Your order has been completed!
An agent will get back to you on the delivery

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent