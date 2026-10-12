@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Dashboard</h4>
    <span class="text-muted">Halo, {{ $user->name }}!</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="text-muted small">Total Peserta</div>
                <div class="fs-3 fw-bold">{{ $totalPeserta }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card" style="border-left-color:#198754;">
            <div class="card-body">
                <div class="text-muted small">Total Skema</div>
                <div class="fs-3 fw-bold">{{ $totalSkema }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card" style="border-left-color:#fd7e14;">
            <div class="card-body">
                <div class="text-muted small">Total User</div>
                <div class="fs-3 fw-bold">{{ $totalUser }}</div>
            </div>
        </div>
    </div>
</div>

@if(auth()->user()->isAdmin())
<div class="mb-4">
    <a href="{{ route('peserta.create') }}" class="btn btn-primary btn-sm me-2">+ Tambah Peserta</a>
    <a href="{{ route('skema.create') }}" class="btn btn-success btn-sm me-2">+ Tambah Skema</a>
    <a href="{{ route('users.create') }}" class="btn btn-warning btn-sm">+ Tambah User</a>
</div>
@endif

<div class="card">
    <div class="card-header bg-white">
        <strong>Peserta Terbaru</strong>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Skema</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertaTerbaru as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->nik }}</td>
                        <td>{{ $p->skema->nama_skema ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Belum ada data peserta</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
