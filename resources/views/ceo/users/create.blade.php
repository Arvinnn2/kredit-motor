@extends('layouts.ceo')
@section('title', 'Tambah User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Tambah User</h4>
    <a href="{{ route('ceo.users.index') }}" class="text-muted" style="font-size:13px;text-decoration:none;">
      <i class="mdi mdi-arrow-left me-1"></i> Kembali
    </a>
  </div>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;">
      <div class="card-body p-4">
        <form action="{{ route('ceo.users.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" name="name"
              class="form-control @error('name') is-invalid @enderror"
              value="{{ old('name') }}" placeholder="Nama lengkap user">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
            <input type="email" name="email"
              class="form-control @error('email') is-invalid @enderror"
              value="{{ old('email') }}" placeholder="email@domain.com">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
            <input type="password" name="password"
              class="form-control @error('password') is-invalid @enderror"
              placeholder="Minimal 5 karakter">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Konfirmasi Password <span class="text-danger">*</span></label>
            <input type="password" name="password_confirmation"
              class="form-control" placeholder="Ulangi password">
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
            <select name="role" class="form-select @error('role') is-invalid @enderror">
              <option value="">-- Pilih Role --</option>
              @foreach($roles as $role)
                <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                  {{ ucfirst($role->name) }}
                </option>
              @endforeach
            </select>
            @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary"
              style="background:#b45309;border-color:#b45309;border-radius:8px;font-weight:600;">
              <i class="mdi mdi-check me-1"></i> Simpan
            </button>
            <a href="{{ route('ceo.users.index') }}" class="btn btn-outline-secondary"
               style="border-radius:8px;">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
