@extends('layout')

@section('konten')
<div class="pb-3"><a href="{{ route('business_cards.index') }}" class="btn btn-secondary">Kembali</a></div>
<p class="card-title">Edit Kartu Nama</p>
<div class="table-responsive"></div>
    <body>
    <form action="{{ route('business_cards.update', $businessCard->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label><br>
        <input type="text" class="form-control form-control sm" name="nama" aria-describedby="helpId" placeholder="Nama" value="{{ $businessCard->nama }}"><br>
        </div>

        <div class="mb-3">
        <label for="nomor_telepon"class="form-label">Nomor Telepon:</label><br>
        <input type="text" class="form-control form-control sm" name="nomor_telepon" aria-describedby="helpId" placeholder="Nomor Telepon" value="{{ $businessCard->nomor_telepon }}"><br>
        </div>

        <div class="mb-3">
        <label for="email"class="form-label">Email:</label><br>
        <input type="email" class="form-control form-control sm" name="email" aria-describedby="helpId" placeholder="Email" value="{{ $businessCard->email }}"><br>
        </div>

        <div class="mb-3">
        <label for="instagram"class="form-label">Instagram:</label><br>
        <input type="text" class="form-control form-control sm" name="instagram" aria-describedby="helpId" placeholder="Instagram" value="{{ $businessCard->instagram }}"><br>
        </div>

        <div class="mb-3">
        <label for="linkedin"class="form-label">Linkedin:</label><br>
        <input type="text" class="form-control form-control sm" name="linkedin" aria-describedby="helpId" placeholder="Linkedin" value="{{ $businessCard->linkedin }}"><br>
        </div>

        <div class="mb-3">
        <label for="expired_at"class="form-label">Tanggal Kedaluwarsa:</label><br>
        <input type="date" class="form-control form-control sm" name="expired_at" aria-describedby="helpId" placeholder="Tanggal Kedaluwarsa" value="{{ $businessCard->expired_at }}"><br><br>
        <div>

        <button type="submit" class="btn btn-secondary">Update Kartu Nama</button>
    </form>
</body>
@endsection
