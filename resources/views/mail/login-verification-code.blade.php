@component('mail::message')
    Verification login code
    @component('mail::panel')
        {{ $user->validate_code }}
    @endcomponent
@endcomponent
