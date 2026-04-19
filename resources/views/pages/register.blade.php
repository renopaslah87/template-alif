{{--
  Register Page
  Route: GET /register
  Layout: x-layouts.auth
--}}
<x-layouts.auth
  title="Daftar — {{ config('app.name') }}"
  brand="{{ config('app.name') }}"
  brandSub="Enterprise Workspace">

  <div class="auth-title">Buat Akun Baru</div>
  <div class="auth-subtitle">Lengkapi data berikut untuk mendaftar</div>

  {{-- Tampilkan error validasi --}}
  @if ($errors->any())
    <div class="auth-error">
      <i class="bi bi-exclamation-triangle-fill me-1"></i>
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}" autocomplete="off">
    @csrf

    {{-- Nama --}}
    <div class="form-group-auth">
      <label class="form-label" for="name">Nama Lengkap <span class="req">*</span></label>
      <div class="form-ctrl-wrap">
        <i class="bi bi-person input-icon"></i>
        <input
          id="name"
          type="text"
          name="name"
          class="form-ctrl @error('name') is-error @enderror"
          value="{{ old('name') }}"
          placeholder="Nama lengkap Anda"
          required
          autofocus
          autocomplete="name">
      </div>
      @error('name')
        <div style="font-size:11px;color:var(--danger);margin-top:4px;">{{ $message }}</div>
      @enderror
    </div>

    {{-- Email --}}
    <div class="form-group-auth">
      <label class="form-label" for="email">Email <span class="req">*</span></label>
      <div class="form-ctrl-wrap">
        <i class="bi bi-envelope input-icon"></i>
        <input
          id="email"
          type="email"
          name="email"
          class="form-ctrl @error('email') is-error @enderror"
          value="{{ old('email') }}"
          placeholder="nama@domain.com"
          required
          autocomplete="email">
      </div>
      @error('email')
        <div style="font-size:11px;color:var(--danger);margin-top:4px;">{{ $message }}</div>
      @enderror
    </div>

    {{-- Password --}}
    <div class="form-group-auth">
      <label class="form-label" for="password">Kata Sandi <span class="req">*</span></label>
      <div class="form-ctrl-wrap">
        <i class="bi bi-lock input-icon"></i>
        <input
          id="password"
          type="password"
          name="password"
          class="form-ctrl @error('password') is-error @enderror"
          placeholder="Min. 8 karakter"
          required
          autocomplete="new-password">
        <button type="button" class="btn-toggle-pw" onclick="togglePw('password', this)" tabindex="-1" aria-label="Tampilkan kata sandi">
          <i class="bi bi-eye-slash"></i>
        </button>
      </div>
      @error('password')
        <div style="font-size:11px;color:var(--danger);margin-top:4px;">{{ $message }}</div>
      @enderror
    </div>

    {{-- Konfirmasi Password --}}
    <div class="form-group-auth">
      <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi <span class="req">*</span></label>
      <div class="form-ctrl-wrap">
        <i class="bi bi-lock-fill input-icon"></i>
        <input
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          class="form-ctrl"
          placeholder="Ulangi kata sandi"
          required
          autocomplete="new-password">
        <button type="button" class="btn-toggle-pw" onclick="togglePw('password_confirmation', this)" tabindex="-1" aria-label="Tampilkan kata sandi">
          <i class="bi bi-eye-slash"></i>
        </button>
      </div>
    </div>

    <button type="submit" class="btn-auth">
      <i class="bi bi-person-check me-1"></i> Daftar Sekarang
    </button>
  </form>

  <x-slot:footer>
    Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    <div style="margin-top:12px;padding-top:12px;border-top:1px solid var(--border-light);">
      <a href="{{ url('/demo') }}" style="color:var(--text-muted);font-size:11px;">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke Demo Template
      </a>
    </div>
  </x-slot:footer>

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
