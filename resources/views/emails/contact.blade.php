@component('mail::message')
# Visitor Message

Some visitor left a message:
<br>
Firstname: {{ $firstname }}
<br>
Lastname: {{ $lastname }}
<br>
Email: {{ $email }}
<br>
Subject: {{ $subject }}
<br>
Message: {{ $message}}


@component('mail::button', ['url' => ''])
View message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
