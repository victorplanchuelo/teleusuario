@component('mail::message')
# {{trans('email.verification_email.title')}}

{{trans('email.verification_email.body')}}

@component('mail::button', ['url' => url('activate/' . $user->validation_token)])
{{trans('email.verification_email.button')}}
@endcomponent

@endcomponent
