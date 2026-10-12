@extends('layouts.app')

@section('title', 'Tambah Skema')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-white"><strong>Tambah Skema Sertifikasi</strong></div>
            <div class="card-body">
                <form method="POST" action="{{ route('skema.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Skema <span class="text-danger">*</span></label>
                        <input type="text" name="kode_skema" class="form-control @error('kode_skema') is-invalid @enderror"
                               value="{{ old('kode_skema') }}" placeholder="Contoh: JWD-001" required>
                        @error('kode_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Skema <span class="text-danger">*</span></label>
                        <input type="text" name="nama_skema" class="form-control @error('nama_skema') is-invalid @enderror"
                               value="{{ old('nama_skema') }}" required>
                        @error('nama_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                                  placeholder="Opsional">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('skema.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
