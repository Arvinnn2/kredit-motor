@extends('layouts.admin')
@section('page-title', 'Edit Jenis Cicilan')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Jenis Cicilan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.jenis-cicilan.index') }}">Jenis Cicilan</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card" style="max-width:500px">
    <div class="card-body">
        <form action="{{ route('admin.jenis-cicilan.update', $jenisCicilan) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Lama Cicilan (bulan) <span class="text-danger">*</span></label>
                <input type="number" name="lama_cicilan" class="form-control"
                       value="{{ old('lama_cicilan', $jenisCicilan->lama_cicilan) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Margin Kredit (%) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="margin_kredit" class="form-control"
                       value="{{ old('margin_kredit', $jenisCicilan->margin_kredit) }}">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Update
                </button>
                <a href="{{ route('admin.jenis-cicilan.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection