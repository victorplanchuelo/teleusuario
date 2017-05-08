@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ trans('email.reset_password.title') }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello!
@endif
@endif

{{-- Intro Lines --}}
{{ trans('email.reset_password.line1') }}



{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ trans('email.reset_password.button') }}
@endcomponent
@endisset

{{-- Outro Lines --}}
{{ trans('email.reset_password.line2') }}

<!-- Salutation -->
{{trans('email.regards')}},<br>{{ config('app.name') }}

<!-- Subcopy -->
@isset($actionText)
@component('mail::subcopy')
{{trans('email.reset_password.subcopy')}} [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
