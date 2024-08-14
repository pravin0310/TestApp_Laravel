<!-- resources/views/emails/user_import.blade.php -->
@component('mail::message')
# Welcome {{ $user->name }}

Your account has been created. Please use the following credentials to log in:

- **Email:** {{ $user->email }}
- **Password:** {{ $password }}

Click the button below to log in:

@component('mail::button', ['url' => $loginUrl])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent