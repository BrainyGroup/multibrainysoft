<x-mail::message>
Dear [client name],

# Welcome

{{ $user }}

We'd like to welcome you to [company name], and thank you for joining us. My name is [your name], and I'm here to show you everything you need for success. Here at [company name], we dedicate ourselves to [your company's value proposition for the customer].

At [company name], you can receive:

[Product or service]
[Product or service]
[Product or service]
Take some time to [describe the next steps that customer can take on their journey].


<div>
    Price: {{ $user }}
</div>

[List resources that can help customers make the best use of their subscription/ membership].

[Resource]
[Resource]
[Resource]
If you have any further questions, you can email me at [your email address] or contact support at [phone number or email address for customer support].

[Remind the customer to follow you on social media platforms]

<x-mail::panel>
This is the panel content.
</x-mail::panel>



<x-mail::button :url="''">
Button Text
</x-mail::button>

Regards,

[Your name]

[Your job title]


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>



