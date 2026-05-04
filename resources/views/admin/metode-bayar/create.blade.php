@extends('layouts.admin')
@section('page-title', 'Tambah Metode Bayar')

@section('content')
<div class="page-header">
    <div>
        <h1>Tambah Metode Bayar</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.metode-bayar.index') }}">Metode Bayar</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card" style="max-width:500px">
    <div class="card-body">
        <form action="{{ route('admin.metode-bayar.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                <input type="text" name="metode_pembayaran"
                       class="form-control @error('metode_pembayaran') is-invalid @enderror"
                       value="{{ old('metode_pembayaran') }}" placeholder="Transfer Bank, COD...">
                @error('metode_pembayaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Bayar</label>
                <input type="text" name="tempat_bayar" class="form-control"
                       value="{{ old('tempat_bayar') }}" placeholder="BCA, Mandiri, Indomaret...">
            </div>
            <div class="mb-3">
                <label class="form-label">No. Rekening</label>
                <input type="text" name="no_rekening" class="form-control"
                       value="{{ old('no_rekening') }}" placeholder="1234567890">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.metode-bayar.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection