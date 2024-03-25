<x-mail::message>
# Welcome to X-Firm

Hi {{$firstName}}, we are happy to have you in X-Firm.

<x-mail::button :url="''">
Continue
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
