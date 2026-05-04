<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk — Kredio</title>
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
    input[type=email],
    input[type=password],
    input[type=text] {
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
    .mb { margin-bottom: 16px; }
    .row-check {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      margin-top: 4px;
    }
    .row-check label { font-size: 13px; font-weight: 400; color: #6b7280; margin: 0; cursor: pointer; }
    .row-check input { width: auto; margin-right: 6px; accent-color: #1969ff; }
    .forgot { font-size: 13px; color: #6b7280; text-decoration: none; }
    .forgot:hover { color: #1969ff; }
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
    }
    button[type=submit]:hover { background: #1148cc; }
  </style>
</head>
<body>
<div class="card">
  <div class="brand">Kredio</div>
  <h1>Masuk</h1>
  <p class="sub">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb">
      <label for="email">Email</label>
      <input type="email" id="email" name="email"
        value="{{ old('email') }}"
        class="{{ $errors->has('email') ? 'error' : '' }}"
        placeholder="email@kamu.com"
        required autofocus autocomplete="email">
      @error('email')
        <div class="err-msg">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb">
      <label for="password">Password</label>
      <input type="password" id="password" name="password"
        class="{{ $errors->has('password') ? 'error' : '' }}"
        placeholder="Password kamu"
        required autocomplete="current-password">
      @error('password')
        <div class="err-msg">{{ $message }}</div>
      @enderror
    </div>

    <div class="row-check">
      <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
        Ingat saya
      </label>
      @if(Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="forgot">Lupa password?</a>
      @endif
    </div>

    <button type="submit">Masuk</button>
  </form>
</div>
</body>
</html>