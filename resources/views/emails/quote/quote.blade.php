@component('mail::message')

# Hi, Luis and Hendry

## {{ $name }} requested a quote from the {{ config('app.name') }} website.

### There details
	Name: {{ $name }}
	Email: {{ $email }}
	Phone: {{ $phone }}

___	

{!! nl2br($message_body) !!}	

___

Thanks,<br>
{{ config('app.name') }}
@endcomponent
