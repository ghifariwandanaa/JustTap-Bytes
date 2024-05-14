@extends('layout')
<!-- resources/views/business_cards/create.blade.php -->

@section('konten')
<div class="pb-3"><a href="{{ route('business_cards.index') }}" class="btn btn-secondary">Kembali</a></div>
<p class="card-title">Buat Kartu Nama Baru</p>
<div class="table-responsive"></div>
    <body>
    <form action="{{ route('business_cards.store') }}" method="POST">
        @csrf

        <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label><br>
        <input type="text" class="form-control form-control sm" name="nama" aria-describedby="helpId" placeholder="Nama"><br>
        </div>

        <div class="mb-3">
        <label for="nomor_telepon"class="form-label">Nomor Telepon:</label><br>
        <input type="text" class="form-control form-control sm" name="nomor_telepon" aria-describedby="helpId" placeholder="Nomor Telepon"><br>
        </div>

        <div class="mb-3">
        <label for="email"class="form-label">Email:</label><br>
        <input type="email" class="form-control form-control sm" name="email" aria-describedby="helpId" placeholder="Email"><br>
        </div>

        <div class="mb-3">
        <label for="instagram"class="form-label">Instagram:</label><br>
        <input type="text" class="form-control form-control sm" name="instagram" aria-describedby="helpId" placeholder="Instagram"><br>
        </div>

        <div class="mb-3">
        <label for="linkedin"class="form-label">Linkedin:</label><br>
        <input type="text" class="form-control form-control sm" name="linkedin" aria-describedby="helpId" placeholder="Linkedin"><br>
        </div>

        <div class="mb-3">
        <label for="expired_at"class="form-label">Tanggal Kedaluwarsa:</label><br>
        <input type="date" class="form-control form-control sm" name="expired_at" aria-describedby="helpId" placeholder="Tanggal Kedaluwarsa"><br><br>
        <div>

        <button type="submit" class="btn btn-secondary">Tambah Kartu Nama</button>
    </form>
</body>
</html>
@endsection