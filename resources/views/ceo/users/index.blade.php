@extends('layouts.ceo')
@section('title', 'Manajemen User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Manajemen User</h4>
    <p class="text-muted mb-0" style="font-size:13px;">Kelola akun semua pengguna sistem</p>
  </div>
  <a href="{{ route('ceo.users.create') }}" class="btn btn-sm"
     style="background:#b45309;color:#fff;border-radius:8px;font-weight:600;padding:8px 16px;">
    <i class="mdi mdi-plus me-1"></i> Tambah User
  </a>
</div>

<div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0" style="font-size:13px;">
        <thead style="background:#f9fafb;">
          <tr>
            <th class="px-4 py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">No</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Nama</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Email</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Role</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Terdaftar</th>
            <th class="py-3 text-muted fw-semibold" style="font-size:11px;text-transform:uppercase;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $i => $u)
          <tr>
            <td class="px-4 py-3">{{ $users->firstItem() + $i }}</td>
            <td class="py-3">
              <div class="d-flex align-items-center gap-2">
                <div style="width:32px;height:32px;border-radius:50%;
                  background:linear-gradient(135deg,#f59e0b,#fcd34d);
                  color:#fff;display:flex;align-items:center;justify-content:center;
                  font-weight:700;font-size:12px;flex-shrink:0;">
                  {{ strtoupper(substr($u->name, 0, 2)) }}
                </div>
                <span class="fw-medium">{{ $u->name }}</span>
              </div>
            </td>
            <td class="py-3 text-muted">{{ $u->email }}</td>
            <td class="py-3">
              @foreach($u->roles as $role)
                @php
                  $rc = match($role->name) {
                    'admin'     => '#1969ff',
                    'marketing' => '#059669',
                    'ceo'       => '#b45309',
                    default     => '#6b7280',
                  };
                @endphp
                <span style="background:{{ $rc }}18;color:{{ $rc }};
                  padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600;">
                  {{ $role->name }}
                </span>
              @endforeach
            </td>
            <td class="py-3 text-muted">{{ $u->created_at->format('d/m/Y') }}</td>
            <td class="py-3">
              @if($u->id !== auth()->id())
              <form action="{{ route('ceo.users.destroy', $u) }}" method="POST"
                    class="d-inline" onsubmit="return confirm('Hapus user ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" style="border-radius:6px;">
                  <i class="mdi mdi-trash-can-outline"></i>
                </button>
              </form>
              @else
              <span style="font-size:12px;color:#9ca3af;">Akun Anda</span>
              @endif
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">Belum ada user</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($users->hasPages())
    <div class="px-4 py-3 border-top">{{ $users->withQueryString()->links() }}</div>
    @endif
  </div>
</div>
@endsection
