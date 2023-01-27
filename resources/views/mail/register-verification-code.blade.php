@component('mail::message')
    Verification register code
    @component('mail::panel')
        {{ $user->validate_code }}
    @endcomponent
@endcomponent
