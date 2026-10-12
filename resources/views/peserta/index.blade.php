@extends('layouts.app')

@section('title', 'Data Peserta')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Peserta Sertifikasi</h4>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('peserta.create') }}" class="btn btn-primary btn-sm">+ Tambah Peserta</a>
    @endif
</div>

{{-- Form pencarian --}}
<form method="GET" action="{{ route('peserta.index') }}" class="mb-3">
    <div class="input-group" style="max-width: 450px;">
        <input type="text" name="search" class="form-control" placeholder="Cari nama, NIK, email..." value="{{ $search }}">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
        @if($search)
            <a href="{{ route('peserta.index') }}" class="btn btn-outline-danger">Reset</a>
        @endif
    </div>
</form>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Skema</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertas as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->nik }}</td>
                        <td>{{ $p->email ?? '-' }}</td>
                        <td>{{ $p->no_hp ?? '-' }}</td>
                        <td>{{ $p->skema->nama_skema ?? '-' }}</td>
                        <td>
                            <a href="{{ route('peserta.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('peserta.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Tidak ada data peserta</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
