<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? config('app.name') }}</title>

  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Bootstrap 5 + Bootstrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css">

  {{-- Custom UI stylesheet --}}
  <link rel="stylesheet" href="{{ asset('css/ui.css') }}">

  {{-- Page-level extra head (meta tags, extra CSS, etc.) --}}
  {{ $head ?? '' }}
</head>

<body class="d-flex flex-column vh-100 w-100 position-relative">

  {{-- ============================================================
       HEADER
       Props   : $brand (string, app name)
       Slot    : $headerRight (user info, logout, etc.)
       ============================================================ --}}
  <header class="app-header">
    <button class="btn-hamburger" onclick="App.sidebar.mobileOpen()" aria-label="Buka menu">
      <i class="bi bi-list"></i>
    </button>

    @if (isset($brandIcon))
      {!! $brandIcon !!}
    @else
      <i class="bi bi-layers-fill brand-icon"></i>
    @endif

    <span class="brand">{{ $brand ?? config('app.name') }}</span>

    @if (isset($headerRight))
      <div class="header-right">{{ $headerRight }}</div>
    @endif
  </header>

  {{-- ============================================================
       MENUBAR (optional)
       Render hanya jika slot $menubar diisi
       ============================================================ --}}
  @if (isset($menubar))
    <div class="menubar">{{ $menubar }}</div>
  @endif

  {{-- ============================================================
       MAIN AREA — Sidebar + Content
       ============================================================ --}}
  <div class="main-area d-flex flex-grow-1 overflow-hidden p-2 gap-2">

    {{-- SIDEBAR (optional)
         Render hanya jika slot $sidebar diisi --}}
    @if (isset($sidebar))
      <aside class="panel d-flex flex-column" style="width: 220px; min-width: 220px;">
        {{ $sidebar }}
      </aside>
    @endif

    {{-- CONTENT — Tab area --}}
    <main class="panel flex-grow-1 d-flex flex-column overflow-hidden" style="position: relative;">

      {{-- Loading Mask (scoped ke konten, bukan fullscreen) --}}
      <div id="globalMask" class="loading-mask">
        <div class="loading-mask-msg">
          <div class="spinner-border spinner-border-sm text-primary" style="width:1.1rem;height:1.1rem;"></div>
          Memproses permintaan...
        </div>
      </div>

      {{-- Default slot: diisi dengan tabs-header + tab-content oleh halaman --}}
      {{ $slot }}

    </main>
  </div>

  {{-- ============================================================
       FOOTER (optional)
       Slot    : $footer (teks kiri + kanan)
       ============================================================ --}}
  <footer class="app-footer">
    @if (isset($footer))
      {{ $footer }}
    @else
      <span class="footer-brand">{{ config('app.name') }}</span>
      <span>v{{ config('app.version', '1.0') }}</span>
    @endif
  </footer>

  {{-- ============================================================
       GLOBAL CHROME — selalu ada, tidak perlu di-slot
       ============================================================ --}}
  {{-- Sidebar backdrop (mobile overlay) --}}
  <div id="sidebarBackdrop" class="sidebar-backdrop" onclick="App.sidebar.mobileClose()"></div>

  {{-- Toast container --}}
  <div id="toastContainer" class="toast-container"></div>

  {{-- Page-level dialogs --}}
  @if (isset($dialogs))
    {{ $dialogs }}
  @endif

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Custom App utility object --}}
  <script src="{{ asset('js/ui.js') }}"></script>

  {{-- Page-level extra scripts --}}
  {{ $scripts ?? '' }}

</body>
</html>
