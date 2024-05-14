<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bytes - Your ID</title>
    <link rel="shortcut icon" href="{{ asset('admin')}}/images/favicon.png"/>
    <link rel="stylesheet" href="{{ asset('template')}}/css/card.css">
</head>
<body>
    <div class="card">
        <h1>{{ $businessCard->nama }}</h1>
        <div class="info">
            <img src="{{ asset('template')}}/images/whatsapp-icon.png" alt="WhatsApp">
            <p>{{ $businessCard->nomor_telepon }}</p>
            <a href="https://wa.me/{{ substr_replace($businessCard->nomor_telepon, '62', 0, 1) }}">WhatsApp</a>
        </div>
        <div class="info">
            <img src="{{ asset('template')}}/images/email-icon.png" alt="Email">
            <p>{{ $businessCard->email }}</p>
            <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to={{ $businessCard->email }}">Email</a>
        </div>
        <div class="info">
            <img src="{{ asset('template')}}/images/instagram-icon.png" alt="Instagram">
            <p>{{ $businessCard->instagram }}</p>
            <a href="https://instagram.com/{{ $businessCard->instagram }}">Instagram</a>
        </div>
        <div class="info">
            <img src="{{ asset('template')}}/images/linkedin-icon.png" alt="LinkedIn">
            <p>{{ $businessCard->linkedin }}</p>
            <a href="https://www.linkedin.com/search/results/all/?keywords={{ urlencode($businessCard->linkedin) }}&origin=TYPEAHEAD_ESCAPE_HATCH&sid=vYq">LinkedIn</a>
        </div>
    </div>
</body>
</html>
