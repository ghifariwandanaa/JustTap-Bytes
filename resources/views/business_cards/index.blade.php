@extends('layout')

@section('konten')
<p class="card-title">Daftar Kartu Nama</p>
<div class="pb-3"><a href="{{ route('business_cards.create') }}" class="btn btn-primary">Tambah Kartu Nama</a></div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Instagram</th>
                <th>Linkedin</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($businessCards as $businessCard)
            <tr>
                <td>{{ $businessCard->nama }}</td>
                <td>{{ $businessCard->nomor_telepon }}</td>
                <td>{{ $businessCard->email }}</td>
                <td>{{ $businessCard->instagram }}</td>
                <td>{{ $businessCard->linkedin }}</td>
                <td>{{ $businessCard->expired_at ? ($businessCard->expired_at < now() ? 'Sudah Expired' : 'Belum Expired') : 'Tanpa Batas' }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('business_cards.show', $businessCard->id) }}" class="btn btn-success btn-sm">Show</a>
                        <span style="margin-right: 5px;"></span>
                        <a href="{{ route('business_cards.edit', $businessCard->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <span style="margin-right: 5px;"></span>
                        <form onsubmit="return confirm('Yakin ingin menghapus data ini?')" action="{{ route('business_cards.destroy', $businessCard->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" name='submit'>Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
