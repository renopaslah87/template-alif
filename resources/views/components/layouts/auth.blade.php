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

  <style>
    body.auth-page {
      min-height: 100vh;
      overflow: auto;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--bg-body);
    }
    .auth-card {
      width: 100%;
      max-width: 420px;
      background: var(--bg-surface);
      border: 1px solid var(--border-light);
      border-radius: 10px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.07);
      padding: 40px 36px 32px;
    }
    .auth-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center;
      margin-bottom: 28px;
    }
    .auth-brand .brand-icon-wrap {
      width: 38px; height: 38px;
      background: var(--bg-header);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
    }
    .auth-brand .brand-icon-wrap i { color: #60a5fa; font-size: 20px; }
    .auth-brand .brand-text {
      font-size: 17px;
      font-weight: 700;
      color: #0f172a;
      line-height: 1;
    }
    .auth-brand .brand-sub {
      font-size: 11px;
      color: var(--text-muted);
      margin-top: 2px;
    }
    .auth-title {
      font-size: 15px;
      font-weight: 600;
      color: #0f172a;
      margin-bottom: 4px;
    }
    .auth-subtitle {
      font-size: 12px;
      color: var(--text-muted);
      margin-bottom: 24px;
    }
    .auth-divider {
      border: none;
      border-top: 1px solid var(--border-light);
      margin: 24px 0;
    }
    .auth-footer {
      text-align: center;
      font-size: 12px;
      color: var(--text-muted);
      margin-top: 24px;
    }
    .auth-footer a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
    }
    .auth-footer a:hover { text-decoration: underline; }
    .auth-error {
      background: #fef2f2;
      border: 1px solid #fecaca;
      border-radius: 6px;
      padding: 10px 14px;
      font-size: 12px;
      color: var(--danger);
      margin-bottom: 16px;
    }
    .form-ctrl-wrap { position: relative; }
    .form-ctrl-wrap .input-icon {
      position: absolute;
      left: 10px; top: 50%; transform: translateY(-50%);
      color: var(--text-muted); font-size: 14px; pointer-events: none;
    }
    .form-ctrl-wrap .form-ctrl { padding-left: 32px; }
    .form-ctrl-wrap .btn-toggle-pw {
      position: absolute;
      right: 8px; top: 50%; transform: translateY(-50%);
      background: none; border: none; color: var(--text-muted);
      cursor: pointer; padding: 0; font-size: 15px;
    }
    .form-ctrl-wrap .btn-toggle-pw:hover { color: var(--text-main); }
    .btn-auth {
      width: 100%;
      padding: 9px;
      font-size: 13px;
      font-weight: 600;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      background: var(--primary);
      color: #fff;
      transition: background 0.15s;
    }
    .btn-auth:hover { background: var(--primary-hover); }
    .btn-auth:active { transform: translateY(1px); }
    .btn-auth:disabled { opacity: 0.55; cursor: not-allowed; }
    .form-group-auth { margin-bottom: 16px; }
    .form-group-auth:last-of-type { margin-bottom: 20px; }
    @media (max-width: 480px) {
      .auth-card { padding: 28px 20px 24px; margin: 16px; }
    }
  </style>

  {{ $head ?? '' }}
</head>

<body class="auth-page">
  <div class="auth-card">
    <div class="auth-brand">
      <div class="brand-icon-wrap">
        @if(isset($brandIcon))
          {!! $brandIcon !!}
        @else
          <i class="bi bi-layers-fill"></i>
        @endif
      </div>
      <div>
        <div class="brand-text">{{ $brand ?? config('app.name') }}</div>
        @if(isset($brandSub))
          <div class="brand-sub">{{ $brandSub }}</div>
        @endif
      </div>
    </div>

    {{ $slot }}

    <div class="auth-footer">
      {{ $footer ?? '' }}
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  {{ $scripts ?? '' }}
</body>
</html>
