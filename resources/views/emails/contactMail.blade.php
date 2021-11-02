@component('mail::message')
   <b>Name:</b> {{ $data['name'] }}<br>
   <b>Email:</b> {{ $data['email'] }}<br>
   <b>Mobile:</b> {{ $data['mobile'] }}<br>
   <b>Subject:</b> {{ $data['subject'] }}<br>
   <b>Message:</b> <br>
   {{ $data['message'] }}<br>

@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply to {{ $data['name'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
