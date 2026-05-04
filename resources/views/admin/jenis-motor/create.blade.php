@extends('layouts.admin')
@section('page-title', 'Tambah Jenis Motor')

@section('content')
<div class="page-header">
    <div>
        <h1>Tambah Jenis Motor</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.jenis-motor.index') }}">Jenis Motor</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card" style="max-width:550px">
    <div class="card-body">
        <form action="{{ route('admin.jenis-motor.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Merk <span class="text-danger">*</span></label>
                <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror"
                       value="{{ old('merk') }}" placeholder="Honda, Yamaha...">
                @error('merk')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis <span class="text-danger">*</span></label>
                <select name="jenis" class="form-select @error('jenis') is-invalid @enderror">
                    <option value="">-- Pilih Jenis --</option>
                    @foreach(['Bebek','Skuter','Dual Sport','Naked Sport','Sport Bike','Retro','Cruiser','Sport Touring','Dirt Bike','Motocross','Scrambler','ATV','Motor Adventure','Lainnya'] as $jenis)
                        <option value="{{ $jenis }}" {{ old('jenis') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                    @endforeach
                </select>
                @error('jenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi_jenis" class="form-control" rows="2"
                          placeholder="Deskripsi singkat...">{{ old('deskripsi_jenis') }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.jenis-motor.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection