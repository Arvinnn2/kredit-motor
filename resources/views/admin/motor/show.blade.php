@extends('layouts.admin')
@section('page-title', 'Detail Motor')

@section('content')
<div class="page-header">
    <div>
        <h1>Detail Motor</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.motor.index') }}">Data Motor</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.motor.edit', $motor) }}" class="btn btn-primary">
            <i class="bi bi-pencil me-1"></i> Edit
        </a>
        <a href="{{ route('admin.motor.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                @if($motor->foto1)
                    <img src="{{ asset('storage/'.$motor->foto1) }}" class="img-fluid rounded mb-2"
                         style="width:100%;height:200px;object-fit:cover">
                @else
                    <div style="height:200px;background:#f3f4f6;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:40px">🏍️</div>
                @endif
                <div class="d-flex gap-2 mt-2">
                    @foreach(['foto2','foto3'] as $f)
                        @if($motor->$f)
                            <img src="{{ asset('storage/'.$motor->$f) }}"
                                 style="width:80px;height:60px;object-fit:cover;border-radius:6px">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Informasi Motor</div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Merk</dt>
                    <dd class="col-sm-8" style="font-weight:500">{{ $motor->merk }}</dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Nama Motor</dt>
                    <dd class="col-sm-8" style="font-weight:500">{{ $motor->nama_motor }}</dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Jenis</dt>
                    <dd class="col-sm-8" style="font-weight:500">{{ $motor->jenisMotor->jenis ?? '-' }}</dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Harga Jual</dt>
                    <dd class="col-sm-8" style="font-weight:500">Rp {{ number_format($motor->harga_jual, 0, ',', '.') }}</dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Warna</dt>
                    <dd class="col-sm-8" style="font-weight:500">{{ $motor->warna ?? '-' }}</dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Kapasitas Mesin</dt>
                    <dd class="col-sm-8" style="font-weight:500">{{ $motor->kapasitas_mesin ?? '-' }}</dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Tahun Produksi</dt>
                    <dd class="col-sm-8" style="font-weight:500">{{ $motor->tahun_produksi ?? '-' }}</dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Stok</dt>
                    <dd class="col-sm-8">
                        <span class="badge {{ $motor->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $motor->stok }} unit
                        </span>
                    </dd>
                    <dt class="col-sm-4" style="font-size:12px;color:#6b7280">Deskripsi</dt>
                    <dd class="col-sm-8" style="font-weight:500">{{ $motor->deskripsi_motor ?? '-' }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection