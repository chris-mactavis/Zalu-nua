@component('mail::message')
Purchase Successful

Your order has been completed!
An agent will get in touch about your delivery 

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent