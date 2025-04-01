@component('mail::message')
    # New Contact Form Submission

    **Name:** {{ $data['name'] }}
    **Email:** {{ $data['email'] }}
    **Message:**
    {{ $data['message'] }}
@endcomponent
