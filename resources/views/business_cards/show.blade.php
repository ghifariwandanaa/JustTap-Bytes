@extends('layout')

@section('konten')
<div style="margin-bottom: 20px;">
    <a href="{{ route('business_cards.index') }}" class="btn btn-secondary">Kembali</a>
</div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $businessCard->nama }}</h5>
            <p class="card-text">ID: {{ $businessCard->id }}</p>
            <p class="card-text">Nomor Telepon: {{ $businessCard->nomor_telepon }}</p>
            <p class="card-text">Email: {{ $businessCard->email }}</p>
            <p class="card-text">Instagram: {{ $businessCard->instagram }}</p>
            <p class="card-text">Linkedin: {{ $businessCard->linkedin }}</p>
            <p class="card-text">Tanggal Kedaluwarsa: {{ $businessCard->expired_at }}</p>
            <p class="card-text">QR Code : <a href="{{ url('qrcode/' . $businessCard->id) }}" class="btn btn-info">Unduh QR</a>
            </p>
                <a style="margin-top: 10px;" href="{{ route('card.display', $businessCard->id) }}" class="btn btn-primary">Tampilkan</a>
        </div>
    </div>

@endsection
