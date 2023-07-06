<x-mail::message>
    Hola, {{ $user->name }} {{ $user->last_name }}.

    este es tu código para activar tu cuenta

    # {{ $user->code_confirm }}

    ingresa el código para activar tu cuenta.

    gracias,<br>
    {{ config('app.name') }}
</x-mail::message>
