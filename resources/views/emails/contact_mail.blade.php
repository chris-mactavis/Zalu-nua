@component('mail::message')
Hi,


{{$data['comment']}}


From: {{$data['email']}} ({{$data['phone']}})

@endcomponent
