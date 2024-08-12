@extends('layout')
@section('konten')
<div class="container mt-4">
   <div class="row">
      <div class="col-md-12">
         <h3 class="card-title">Daftar Kartu Nama</h3>
         <!-- Tombol Tambah Kartu Nama -->
         <div class="pb-3">
            <a href="{{ route('business_cards.create') }}" class="btn btn-primary">Tambah Kartu Nama</a>
         </div>
         <!-- Form Pencarian -->
         <form method="GET" action="{{ route('business_cards.index') }}">
            <div class="input-group mb-3">
               <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama..." value="{{ request('search') }}">
               <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Cari</button>
               </div>
            </div>
         </form>
         <!-- Tabel Data Kartu Nama -->
         <div class="table-responsive">
            <table class="table table-striped table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th>
                        <a href="{{ route('business_cards.index', ['sort_by' => 'nama', 'sort_direction' => ($sortBy == 'nama' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Nama
                        @if ($sortBy == 'nama')
                        <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                        </a>
                     </th>
                     <th>
                        <a href="{{ route('business_cards.index', ['sort_by' => 'nomor_telepon', 'sort_direction' => ($sortBy == 'nomor_telepon' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Nomor Telepon
                        @if ($sortBy == 'nomor_telepon')
                        <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                        </a>
                     </th>
                     <th>
                        <a href="{{ route('business_cards.index', ['sort_by' => 'email', 'sort_direction' => ($sortBy == 'email' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Email
                        @if ($sortBy == 'email')
                        <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                        </a>
                     </th>
                     <th>
                        <a href="{{ route('business_cards.index', ['sort_by' => 'instagram', 'sort_direction' => ($sortBy == 'instagram' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Instagram
                        @if ($sortBy == 'instagram')
                        <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                        </a>
                     </th>
                     <th>
                        <a href="{{ route('business_cards.index', ['sort_by' => 'linkedin', 'sort_direction' => ($sortBy == 'linkedin' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Linkedin
                        @if ($sortBy == 'linkedin')
                        <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                        </a>
                     </th>
                     <th>
                        <a href="{{ route('business_cards.index', ['sort_by' => 'expired_at', 'sort_direction' => ($sortBy == 'expired_at' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Status
                        @if ($sortBy == 'expired_at')
                        <i class="fas fa-sort-{{ $sortDirection == 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                        </a>
                     </th>
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
                           <a href="{{ route('business_cards.edit', $businessCard->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>
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
         <!-- Pagination -->
         <div class="d-flex justify-content-between align-items-center mt-3">
            {{ $businessCards->appends(['search' => request('search'), 'per_page' => $perPage, 'sort_by' => $sortBy, 'sort_direction' => $sortDirection])->links('pagination::bootstrap-4') }}
         </div>
      </div>
   </div>
</div>
@endsection