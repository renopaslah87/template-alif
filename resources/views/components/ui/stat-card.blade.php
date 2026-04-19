{{--
  x-ui.stat-card — Kartu statistik ringkasan

  Props:
    $label      string  Label teks (uppercase kecil)
    $value      string  Nilai utama (angka besar)
    $delta      string  Teks perubahan  (opsional)
    $deltaType  string  'up' | 'down' | 'neutral'  (default: neutral)
    $accent     string  'blue' | 'green' | 'amber' | 'purple'  (default: blue)
    $icon       string  Bootstrap Icon class, e.g. 'bi-people-fill'  (opsional)
    $iconColor  string  'blue' | 'green' | 'amber' | 'purple'  (default: $accent)

  Contoh:
    <x-ui.stat-card label="Total Santri" value="1.240" delta="+12 bulan ini"
                    delta-type="up" accent="blue" icon="bi-people-fill" />
--}}

@props([
  'label'     => 'Label',
  'value'     => '0',
  'delta'     => null,
  'deltaType' => 'neutral',
  'accent'    => 'blue',
  'icon'      => null,
  'iconColor' => null,
])

@php
  $iconColor = $iconColor ?? $accent;

  $deltaIcons = [
    'up'      => 'bi-arrow-up-short',
    'down'    => 'bi-arrow-down-short',
    'neutral' => 'bi-dash',
  ];
  $deltaIcon = $deltaIcons[$deltaType] ?? 'bi-dash';
@endphp

<div class="stat-card accent-{{ $accent }}">
  <div class="stat-card-top">
    <span class="stat-label">{{ $label }}</span>
    @if ($icon)
      <div class="stat-icon {{ $iconColor }}">
        <i class="bi {{ $icon }}"></i>
      </div>
    @endif
  </div>

  <div class="stat-value">{{ $value }}</div>

  @if ($delta)
    <div class="stat-divider"></div>
    <div class="stat-delta {{ $deltaType }}">
      <i class="bi {{ $deltaIcon }}"></i>
      {{ $delta }}
    </div>
  @endif
</div>
