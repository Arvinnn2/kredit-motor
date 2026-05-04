@extends('layouts.admin')
@section('page-title', 'Edit Metode Bayar')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Metode Bayar</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.metode-bayar.index') }}">Metode Bayar</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card" style="max-width:500px">
    <div class="card-body">
        <form action="{{ route('admin.metode-bayar.update', $metodeBayar) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Metode Pembayaran <span class="text-danger">*</span></label>
                <input type="text" name="metode_pembayaran" class="form-control"
                       value="{{ old('metode_pembayaran', $metodeBayar->metode_pembayaran) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Bayar</label>
                <input type="text" name="tempat_bayar" class="form-control"
                       value="{{ old('tempat_bayar', $metodeBayar->tempat_bayar) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">No. Rekening</label>
                <input type="text" name="no_rekening" class="form-control"
                       value="{{ old('no_rekening', $metodeBayar->no_rekening) }}">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Update
                </button>
                <a href="{{ route('admin.metode-bayar.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection