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
            <div class="desc">
                <h6 class="primary-text">{{ $businessCard->nama }}</h6>
            </div>
            <button class="primary-text" onclick="window.location.href='https://wa.me/{{ substr_replace($businessCard->nomor_telepon, '62', 0, 1) }}'">Phone Number</button>
            <button class="primary-text" onclick="window.location.href='https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to={{ $businessCard->email }}'">Email</button>
            <button class="primary-text" onclick="window.location.href='https://instagram.com/{{ $businessCard->instagram }}'">Instagram</button>
            <button class="primary-text" onclick="window.location.href='https://www.linkedin.com/search/results/all/?keywords={{ urlencode($businessCard->linkedin) }}&origin=TYPEAHEAD_ESCAPE_HATCH&sid=vYq'">LinkedIn</button>
            
            <!-- Tombol Custom Link hanya ditampilkan jika ada custom_link -->
            @if ($businessCard->custom_link)
                <button class="primary-text" onclick="window.location.href='{{ $businessCard->custom_link }}'">Lainnya</button>
            @endif

            <div class="logo">
                <img style="height:50px; width:auto" src="{{asset('template')}}/images/logo-pattern.png" onclick="window.location.href='https://bytes.biz.id'"></img>
            </div>
        </div>
    </body>
</html>
