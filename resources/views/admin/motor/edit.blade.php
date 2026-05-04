@extends('layouts.admin')
@section('page-title', 'Edit Motor')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Motor</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motor.index') }}">Data Motor</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.motor.update', $motor) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Merk <span class="text-danger">*</span></label>
                    <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror"
                           value="{{ old('merk', $motor->merk) }}">
                    @error('merk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Motor <span class="text-danger">*</span></label>
                    <input type="text" name="nama_motor" class="form-control @error('nama_motor') is-invalid @enderror"
                           value="{{ old('nama_motor', $motor->nama_motor) }}">
                    @error('nama_motor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Motor <span class="text-danger">*</span></label>
                    <select name="idjenis" class="form-select">
                        @foreach($jenisMotor as $j)
                            <option value="{{ $j->id }}" {{ $motor->idjenis == $j->id ? 'selected' : '' }}>
                                {{ $j->merk }} - {{ $j->jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Harga Jual <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga_jual" class="form-control"
                               value="{{ old('harga_jual', $motor->harga_jual) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Warna</label>
                    <input type="text" name="warna" class="form-control" value="{{ old('warna', $motor->warna) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kapasitas Mesin</label>
                    <input type="text" name="kapasitas_mesin" class="form-control"
                           value="{{ old('kapasitas_mesin', $motor->kapasitas_mesin) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tahun Produksi</label>
                    <input type="text" name="tahun_produksi" class="form-control"
                           value="{{ old('tahun_produksi', $motor->tahun_produksi) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stok <span class="text-danger">*</span></label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $motor->stok) }}" min="0">
                </div>
                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_motor" class="form-control" rows="3">{{ old('deskripsi_motor', $motor->deskripsi_motor) }}</textarea>
                </div>
                @foreach(['foto1','foto2','foto3'] as $f)
                <div class="col-md-4">
                    <label class="form-label">{{ ucfirst($f) }}</label>
                    @if($motor->$f)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$motor->$f) }}" height="60"
                                 style="border-radius:6px;object-fit:cover">
                        </div>
                    @endif
                    <input type="file" name="{{ $f }}" class="form-control" accept="image/*">
                    <div class="form-text">Kosongkan jika tidak ingin mengubah</div>
                </div>
                @endforeach
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i> Update
                    </button>
                    <a href="{{ route('admin.motor.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection