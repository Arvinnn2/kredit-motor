@extends('layouts.admin')
@section('page-title', 'Jenis Cicilan')

@section('content')
<div class="page-header">
    <div>
        <h1>Jenis Cicilan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Jenis Cicilan</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('admin.jenis-cicilan.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lama Cicilan</th>
                    <th>Margin Kredit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jenisCicilan as $i => $jc)
                <tr>
                    <td>{{ $jenisCicilan->firstItem() + $i }}</td>
                    <td>{{ $jc->lama_cicilan }} bulan</td>
                    <td>{{ $jc->margin_kredit }}%</td>
                    <td>
                        <a href="{{ route('admin.jenis-cicilan.edit', $jc) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.jenis-cicilan.destroy', $jc) }}" method="POST"
                              class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data jenis cicilan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($jenisCicilan->hasPages())
    <div class="card-body border-top py-3">{{ $jenisCicilan->links() }}</div>
    @endif
</div>
@endsection