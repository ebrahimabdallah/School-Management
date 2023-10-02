@component('mail::message')
    Hello {{ $user->name }},
    Your order has been shipped!

    @component('mail::button', ['url' => url('reset', $user->remember_token)])
        Reset password
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent