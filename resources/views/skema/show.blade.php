@extends('layouts.app')

@section('title', 'Detail Skema')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between">
                <strong>Detail Skema</strong>
                <a href="{{ route('skema.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="160" class="text-muted">Kode Skema</td>
                        <td class="fw-semibold">{{ $skema->kode_skema }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Nama Skema</td>
                        <td>{{ $skema->nama_skema }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Deskripsi</td>
                        <td>{{ $skema->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Jumlah Peserta</td>
                        <td>{{ $skema->pesertas->count() }} orang</td>
                    </tr>
                </table>

                @if(auth()->user()->isAdmin())
                <div class="mt-3">
                    <a href="{{ route('skema.edit', $skema->id) }}" class="btn btn-warning btn-sm">Edit Data</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
