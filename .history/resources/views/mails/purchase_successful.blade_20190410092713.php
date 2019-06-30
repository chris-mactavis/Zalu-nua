@component('mail::message')
Purchase Successful

Your order has been completed!
An agent will get 

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent