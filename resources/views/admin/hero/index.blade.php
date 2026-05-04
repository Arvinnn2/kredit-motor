@extends('layouts.admin')
@section('title', 'Pengaturan Hero Banner')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h4 class="fw-bold mb-1" style="color:#1a1a2e;">Pengaturan Hero Banner</h4>
        <p class="text-muted mb-0" style="font-size:13px;">Atur tampilan banner utama di halaman home pelanggan</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-7">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label class="form-label fw-semibold">Judul Banner <span class="text-danger">*</span></label>
            <input type="text" name="judul"
              class="form-control @error('judul') is-invalid @enderror"
              value="{{ old('judul', $hero->judul ?? '') }}"
              placeholder="Contoh: Motor Impianmu, Sekarang Bisa Kamu Miliki">
            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"
              placeholder="Deskripsi singkat di bawah judul...">{{ old('deskripsi', $hero->deskripsi ?? '') }}</textarea>
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold">Gambar Banner</label>
            @if($hero && $hero->gambar)
              <div class="mb-2">
                <img src="{{ Storage::url($hero->gambar) }}" alt="Banner saat ini"
                  style="width:100%;max-height:200px;object-fit:cover;border-radius:8px;border:1px solid #e8ecf1;">
                <small class="text-muted">Gambar saat ini. Upload baru untuk mengganti.</small>
              </div>
            @endif
            <input type="file" name="gambar"
              class="form-control @error('gambar') is-invalid @enderror"
              accept="image/*">
            <small class="text-muted">Format: JPG, PNG, WebP. Maks 2MB. Disarankan 1920×1080px.</small>
            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <button type="submit" class="btn btn-primary px-4"
            style="background:#1969ff;border-color:#1969ff;border-radius:8px;">
            <i class="mdi mdi-content-save me-1"></i> Simpan Perubahan
          </button>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card" style="border-radius:12px;border:1px solid #e8ecf1;box-shadow:0 2px 8px rgba(0,0,0,0.04);">
      <div class="card-body p-4">
        <h6 class="fw-bold mb-3">Preview Data Saat Ini</h6>
        @if($hero && $hero->judul)
          @if($hero->gambar)
            <img src="{{ Storage::url($hero->gambar) }}" alt="Preview"
              style="width:100%;max-height:150px;object-fit:cover;border-radius:8px;margin-bottom:12px;">
          @endif
          <table class="table table-sm table-borderless mb-0">
            <tr>
              <td class="text-muted" style="font-size:12px;width:35%">Judul</td>
              <td class="fw-medium" style="font-size:13px;">{{ $hero->judul }}</td>
            </tr>
            <tr>
              <td class="text-muted" style="font-size:12px;">Deskripsi</td>
              <td class="fw-medium" style="font-size:13px;">{{ Str::limit($hero->deskripsi, 80) ?? '-' }}</td>
            </tr>
            <tr>
              <td class="text-muted" style="font-size:12px;">Gambar</td>
              <td style="font-size:13px;">{{ $hero->gambar ? 'Ada' : '❌ Belum' }}</td>
            </tr>
            <tr>
              <td class="text-muted" style="font-size:12px;">Diupdate</td>
              <td style="font-size:13px;">{{ $hero->updated_at?->format('d/m/Y H:i') ?? '-' }}</td>
            </tr>
          </table>
        @else
          <div class="text-center py-4 text-muted">
            <i class="mdi mdi-image-off-outline" style="font-size:40px;opacity:0.3;display:block;margin-bottom:8px;"></i>
            Hero banner belum diatur
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection