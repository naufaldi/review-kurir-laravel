@component('mail::message')
# Introduction
<br/>
Hello {{ $user->name }} Welcome to our portal social media.<br/>
<br/>
We glad to annaunce you that your register has saved and it just need one more step to make you fully registered in our portal. <br/>
<br/>

please click bellow button for the last step.

@component('mail::button', ['url' => route('register-confirmation', $user->token_register)])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
