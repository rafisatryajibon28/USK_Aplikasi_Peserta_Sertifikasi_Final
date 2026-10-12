@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <strong>Detail Peserta</strong>
                <a href="{{ route('peserta.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="180" class="text-muted">Nama Lengkap</td>
                        <td class="fw-semibold">{{ $peserta->nama }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">NIK</td>
                        <td>{{ $peserta->nik }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email</td>
                        <td>{{ $peserta->email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">No. HP</td>
                        <td>{{ $peserta->no_hp ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Alamat</td>
                        <td>{{ $peserta->alamat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Skema Sertifikasi</td>
                        <td>
                            @if($peserta->skema)
                                {{ $peserta->skema->kode_skema }} - {{ $peserta->skema->nama_skema }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                </table>

                @if(auth()->user()->isAdmin())
                <div class="mt-3">
                    <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning btn-sm">Edit Data</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
