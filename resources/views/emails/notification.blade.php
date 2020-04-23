@component('mail::message')
# Hello from DesignHub

Your order had been shipped out.

Click here for the order and  tracking details.
@component('mail::button', ['url' => 'http://www.designhub.com/'])
Tracking Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
