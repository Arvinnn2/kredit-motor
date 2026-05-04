<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar — Kredio</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: #f9fafb;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px 16px;
    }
    .card {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 14px;
      padding: 40px 36px;
      width: 100%;
      max-width: 400px;
    }
    .brand {
      font-size: 20px;
      font-weight: 700;
      color: #1969ff;
      margin-bottom: 28px;
    }
    h1 {
      font-size: 18px;
      font-weight: 700;
      color: #111827;
      margin-bottom: 4px;
    }
    .sub {
      font-size: 13px;
      color: #6b7280;
      margin-bottom: 28px;
    }
    .sub a { color: #1969ff; text-decoration: none; font-weight: 500; }
    .sub a:hover { text-decoration: underline; }
    label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #374151;
      margin-bottom: 6px;
    }
    input[type=text],
    input[type=email],
    input[type=password] {
      width: 100%;
      padding: 10px 12px;
      border: 1.5px solid #e5e7eb;
      border-radius: 8px;
      font-size: 14px;
      font-family: inherit;
      color: #111827;
      background: #fff;
      transition: border-color .15s;
      outline: none;
    }
    input:focus { border-color: #1969ff; }
    input.error { border-color: #dc2626; }
    .err-msg { font-size: 12px; color: #dc2626; margin-top: 4px; }
    .hint { font-size: 12px; color: #9ca3af; margin-top: 4px; }
    .mb { margin-bottom: 16px; }
    button[type=submit] {
      width: 100%;
      padding: 11px;
      background: #1969ff;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      font-family: inherit;
      cursor: pointer;
      transition: background .15s;
      margin-top: 4px;
    }
    button[type=submit]:hover { background: #1148cc; }
    .bottom {
      font-size: 13px;
      color: #6b7280;
      text-align: center;
      margin-top: 20px;
    }
    .bottom a { color: #1969ff; text-decoration: none; font-weight: 500; }
    .bottom a:hover { text-decoration: underline; }
  </style>
</head>
<body>
<div class="card">
  <div class="brand">Kredio</div>
  <h1>Buat Akun</h1>
  <p class="sub">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb">
      <label for="name">Nama Lengkap</label>
      <input type="text" id="name" name="name"
        value="{{ old('name') }}"
        class="{{ $errors->has('name') ? 'error' : '' }}"
        placeholder="Nama lengkap kamu"
        required autofocus autocomplete="name">
      @error('name')
        <div class="err-msg">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb">
      <label for="email">Email</label>
      <input type="email" id="email" name="email"
        value="{{ old('email') }}"
        class="{{ $errors->has('email') ? 'error' : '' }}"
        placeholder="email@kamu.com"
        required autocomplete="email">
      @error('email')
        <div class="err-msg">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb">
      <label for="password">Password</label>
      <input type="password" id="password" name="password"
        class="{{ $errors->has('password') ? 'error' : '' }}"
        placeholder="Minimal 5 karakter"
        required autocomplete="new-password">
      @error('password')
        <div class="err-msg">{{ $message }}</div>
      @enderror
      <div class="hint">Minimal 5 karakter</div>
    </div>

    <div class="mb">
      <label for="password-confirm">Konfirmasi Password</label>
      <input type="password" id="password-confirm" name="password_confirmation"
        placeholder="Ulangi password kamu"
        required autocomplete="new-password">
    </div>

    <button type="submit">Daftar Sekarang</button>
  </form>

  <div class="bottom">
    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
  </div>
</div>
</body>
</html>