@extends('layouts.app')

@section('title', 'Data Skema')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Skema Sertifikasi</h4>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('skema.create') }}" class="btn btn-primary btn-sm">+ Tambah Skema</a>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skemas as $i => $s)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $s->kode_skema }}</td>
                        <td>{{ $s->nama_skema }}</td>
                        <td>
                            <a href="{{ route('skema.show', $s->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('skema.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('skema.destroy', $s->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus skema ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada data skema</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
