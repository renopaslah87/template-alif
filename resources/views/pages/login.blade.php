{{--
  Login Page
  Route: GET /login
  Layout: x-layouts.auth
--}}
<x-layouts.auth
  title="Masuk — {{ config('app.name') }}"
  brand="{{ config('app.name') }}"
  brandSub="Enterprise Workspace">

  <div class="auth-title">Masuk ke Akun</div>
  <div class="auth-subtitle">Masukkan kredensial Anda untuk melanjutkan</div>

  {{-- Tampilkan error validasi --}}
  @if ($errors->any())
    <div class="auth-error">
      <i class="bi bi-exclamation-triangle-fill me-1"></i>
      {{ $errors->first() }}
    </div>
  @endif

  {{-- Session status (misal setelah logout) --}}
  @if (session('status'))
    <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:6px;padding:10px 14px;font-size:12px;color:var(--success);margin-bottom:16px;">
      <i class="bi bi-check-circle-fill me-1"></i>
      {{ session('status') }}
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf

    {{-- Email --}}
    <div class="form-group-auth">
      <label class="form-label" for="email">Email / Username</label>
      <div class="form-ctrl-wrap">
        <i class="bi bi-person input-icon"></i>
        <input
          id="email"
          type="text"
          name="email"
          class="form-ctrl @error('email') is-error @enderror"
          value="{{ old('email') }}"
          placeholder="Email atau username"
          required
          autofocus
          autocomplete="username">
      </div>
    </div>

    {{-- Password --}}
    <div class="form-group-auth">
      <div class="d-flex justify-content-between align-items-center mb-1">
        <label class="form-label mb-0" for="password">Kata Sandi</label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" style="font-size:11px;color:var(--primary);text-decoration:none;">
            Lupa kata sandi?
          </a>
        @endif
      </div>
      <div class="form-ctrl-wrap">
        <i class="bi bi-lock input-icon"></i>
        <input
          id="password"
          type="password"
          name="password"
          class="form-ctrl @error('password') is-error @enderror"
          placeholder="••••••••"
          required
          autocomplete="current-password">
        <button type="button" class="btn-toggle-pw" onclick="togglePw('password', this)" tabindex="-1" aria-label="Tampilkan kata sandi">
          <i class="bi bi-eye-slash"></i>
        </button>
      </div>
    </div>

    {{-- Remember me --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
      <label class="d-flex align-items-center gap-2 m-0" style="font-size:12px;cursor:pointer;">
        <input type="checkbox" name="remember" id="remember" style="width:14px;height:14px;accent-color:var(--primary);">
        <span>Ingat saya</span>
      </label>
    </div>

    <button type="submit" class="btn-auth">
      <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
    </button>
  </form>

  {{-- <x-slot:footer>
    @if (Route::has('register'))
      Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    @endif
    <div style="margin-top:12px;padding-top:12px;border-top:1px solid var(--border-light);">
      <a href="{{ url('/demo') }}" style="color:var(--text-muted);font-size:11px;">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke Demo Template
      </a>
    </div>
  </x-slot:footer> --}}

  <x-slot:scripts>
    <script>
      function togglePw(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon  = btn.querySelector('i');
        if (input.type === 'password') {
          input.type = 'text';
          icon.className = 'bi bi-eye';
        } else {
          input.type = 'password';
          icon.className = 'bi bi-eye-slash';
        }
      }
    </script>
  </x-slot:scripts>

</x-layouts.auth>
