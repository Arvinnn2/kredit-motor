@extends('layouts.admin')
@section('page-title', 'Metode Bayar')

@section('content')
<div class="page-header">
    <div>
        <h1>Metode Bayar</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Metode Bayar</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('admin.metode-bayar.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Metode Pembayaran</th>
                    <th>Tempat Bayar</th>
                    <th>No. Rekening</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($metodeBayar as $i => $m)
                <tr>
                    <td>{{ $metodeBayar->firstItem() + $i }}</td>
                    <td>{{ $m->metode_pembayaran }}</td>
                    <td>{{ $m->tempat_bayar ?? '-' }}</td>
                    <td>{{ $m->no_rekening ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.metode-bayar.edit', $m) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.metode-bayar.destroy', $m) }}" method="POST"
                              class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data metode bayar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($metodeBayar->hasPages())
    <div class="card-body border-top py-3">{{ $metodeBayar->links() }}</div>
    @endif
</div>
@endsection