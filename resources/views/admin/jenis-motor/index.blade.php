@extends('layouts.admin')
@section('page-title', 'Jenis Motor')

@section('content')
<div class="page-header">
    <div>
        <h1>Jenis Motor</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Jenis Motor</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('admin.jenis-motor.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Motor</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jenisMotor as $i => $j)
                <tr>
                    <td>{{ $jenisMotor->firstItem() + $i }}</td>
                    <td>{{ $j->merk }}</td>
                    <td>{{ $j->jenis }}</td>
                    <td>{{ $j->deskripsi_jenis ?? '-' }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ $j->motor_count }} motor</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.jenis-motor.edit', $j) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.jenis-motor.destroy', $j) }}" method="POST"
                              class="d-inline" onsubmit="return confirm('Hapus jenis motor ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data jenis motor</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($jenisMotor->hasPages())
    <div class="card-body border-top py-3">{{ $jenisMotor->links() }}</div>
    @endif
</div>
@endsection