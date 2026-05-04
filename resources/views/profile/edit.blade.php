@php
    $user = auth()->user();
    $role = $user->getRoleNames()->first();
    $layout = match($role) {
        'admin'     => 'layouts.admin',
        'marketing' => 'layouts.marketing',
        'ceo'       => 'layouts.ceo',
        default     => 'layouts.client',
    };
@endphp

@extends($layout)
@section('title', 'Profil Saya')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">

    <div class="mb-4">
      <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Profil Saya</h4>
      <p class="text-muted mb-0" style="font-size:13px;">Kelola informasi akun Anda</p>
    </div>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-4" style="border-radius:10px;">
        <i class="mdi mdi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="card" style="border-radius:14px;border:1px solid #e8ecf1;box-shadow:0 2px 12px rgba(0,0,0,0.05);">
      <div class="card-body p-4">

        {{-- Avatar --}}
        <div class="text-center mb-4">
          @php
            $avatarColor = match($role) {
              'admin'     => 'linear-gradient(135deg,#1969ff,#6ea8fe)',
              'marketing' => 'linear-gradient(135deg,#059669,#34d399)',
              'ceo'       => 'linear-gradient(135deg,#f59e0b,#fcd34d)',
              default     => 'linear-gradient(135deg,#1969ff,#6ea8fe)',
            };
            $badgeColor = match($role) {
              'admin'     => '#1969ff',
              'marketing' => '#059669',
              'ceo'       => '#b45309',
              default     => '#6b7280',
            };
          @endphp
          <div style="width:80px;height:80px;border-radius:50%;background:{{ $avatarColor }};
            color:#fff;display:flex;align-items:center;justify-content:center;
            font-weight:700;font-size:28px;margin:0 auto 12px;border:3px solid #e8ecf1;">
            {{ strtoupper(substr($user->name, 0, 2)) }}
          </div>
          <div style="font-weight:700;font-size:16px;color:#111827;">{{ $user->name }}</div>
          <div style="font-size:12.5px;color:#6b7280;margin-top:2px;">{{ $user->email }}</div>
          <span style="display:inline-block;margin-top:8px;
            background:{{ $badgeColor }}18;color:{{ $badgeColor }};
            padding:3px 12px;border-radius:20px;font-size:12px;font-weight:600;">
            {{ ucfirst($role) }}
          </span>
        </div>

        <hr style="border-color:#f3f4f6;margin:20px 0;">

        <form action="{{ route('profile.update') }}" method="POST">
          @csrf @method('PUT')

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Nama Lengkap</label>
            <input type="text" name="name"
              class="form-control @error('name') is-invalid @enderror"
              value="{{ old('name', $user->name) }}"
              style="border-radius:8px;font-size:14px;">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold" style="font-size:13px;">Email</label>
            <input type="email" class="form-control" value="{{ $user->email }}" disabled
              style="border-radius:8px;font-size:14px;background:#f9fafb;">
            <div style="font-size:11.5px;color:#9ca3af;margin-top:4px;">Email tidak dapat diubah.</div>
          </div>

          <hr style="border-color:#f3f4f6;margin:20px 0;">

          <div style="font-size:13px;font-weight:600;color:#374151;margin-bottom:14px;">
            Ganti Password
            <span style="font-weight:400;color:#9ca3af;">(kosongkan jika tidak ingin ganti)</span>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size:13px;">Password Baru</label>
            <input type="password" name="password"
              class="form-control @error('password') is-invalid @enderror"
              placeholder="Minimal 5 karakter"
              style="border-radius:8px;font-size:14px;">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold" style="font-size:13px;">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation"
              class="form-control" placeholder="Ulangi password baru"
              style="border-radius:8px;font-size:14px;">
          </div>

          <button type="submit" class="btn btn-primary w-100"
            style="border-radius:8px;font-weight:600;padding:11px;
              background:{{ $badgeColor }};border-color:{{ $badgeColor }};">
            <i class="mdi mdi-check me-1"></i> Simpan Perubahan
          </button>
        </form>

      </div>
    </div>

  </div>
</div>
@endsection
