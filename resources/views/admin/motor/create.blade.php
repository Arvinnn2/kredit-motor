@extends('layouts.admin')
@section('page-title', 'Tambah Motor')

@section('content')
<div class="page-header">
    <div>
        <h1>Tambah Motor</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motor.index') }}">Data Motor</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.motor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Merk <span class="text-danger">*</span></label>
                    <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror"
                           value="{{ old('merk') }}" placeholder="Honda, Yamaha, Suzuki...">
                    @error('merk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Motor <span class="text-danger">*</span></label>
                    <input type="text" name="nama_motor" class="form-control @error('nama_motor') is-invalid @enderror"
                           value="{{ old('nama_motor') }}" placeholder="Vario 125, NMAX, PCX...">
                    @error('nama_motor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Motor <span class="text-danger">*</span></label>
                    <select name="idjenis" class="form-select @error('idjenis') is-invalid @enderror">
                        <option value="">-- Pilih Jenis --</option>
                        @foreach($jenisMotor as $j)
                            <option value="{{ $j->id }}" {{ old('idjenis') == $j->id ? 'selected' : '' }}>
                                {{ $j->merk }} - {{ $j->jenis }}
                            </option>
                        @endforeach
                    </select>
                    @error('idjenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Harga Jual <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror"
                               value="{{ old('harga_jual') }}" placeholder="0">
                    </div>
                    @error('harga_jual')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Warna</label>
                    <input type="text" name="warna" class="form-control" value="{{ old('warna') }}" placeholder="Merah, Hitam...">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kapasitas Mesin</label>
                    <input type="text" name="kapasitas_mesin" class="form-control" value="{{ old('kapasitas_mesin') }}" placeholder="125cc">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tahun Produksi</label>
                    <input type="text" name="tahun_produksi" class="form-control" value="{{ old('tahun_produksi') }}" placeholder="2024">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stok <span class="text-danger">*</span></label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                           value="{{ old('stok', 0) }}" min="0">
                    @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_motor" class="form-control" rows="3"
                              placeholder="Deskripsi motor...">{{ old('deskripsi_motor') }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Foto 1</label>
                    <input type="file" name="foto1" class="form-control" accept="image/*">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Foto 2</label>
                    <input type="file" name="foto2" class="form-control" accept="image/*">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Foto 3</label>
                    <input type="file" name="foto3" class="form-control" accept="image/*">
                </div>
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.motor.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection