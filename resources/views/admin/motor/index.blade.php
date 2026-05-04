@extends('layouts.admin')
@section('page-title', 'Data Motor')

@section('content')
<div class="page-header">
    <div>
        <h1>Data Motor</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Motor</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('admin.motor.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Motor
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Motor</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($motor as $i => $m)
                <tr>
                    <td>{{ $motor->firstItem() + $i }}</td>
                    <td>
                        @if($m->foto1)
                            <img src="{{ asset('storage/'.$m->foto1) }}" width="50" height="50"
                                 style="object-fit:cover;border-radius:6px">
                        @else
                            <div style="width:50px;height:50px;background:#f3f4f6;border-radius:6px;display:flex;align-items:center;justify-content:center">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:500">{{ $m->nama_motor }}</div>
                        <div style="font-size:12px;color:#6b7280">{{ $m->merk }}</div>
                    </td>
                    <td>{{ $m->jenisMotor->jenis ?? '-' }}</td>
                    <td>Rp {{ number_format($m->harga_jual, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ $m->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $m->stok }} unit
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.motor.show', $m) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('admin.motor.edit', $m) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.motor.destroy', $m) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus motor ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data motor</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($motor->hasPages())
    <div class="card-body border-top py-3">{{ $motor->links() }}</div>
    @endif
</div>
@endsection