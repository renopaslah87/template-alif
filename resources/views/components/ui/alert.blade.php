{{--
  x-ui.alert — Pesan alert inline

  Props:
    $type   string  'success' | 'error' | 'warning' | 'info'  (default: info)

  Slot: pesan teks / HTML

  Contoh:
    <x-ui.alert type="success">Data berhasil disimpan.</x-ui.alert>
    <x-ui.alert type="error">Terjadi kesalahan pada server.</x-ui.alert>
--}}

@props(['type' => 'info'])

@php
  $icons = [
    'success' => 'bi-check-circle-fill',
    'error'   => 'bi-x-circle-fill',
    'warning' => 'bi-exclamation-triangle-fill',
    'info'    => 'bi-info-circle-fill',
  ];
  $icon = $icons[$type] ?? 'bi-info-circle-fill';
@endphp

<div class="alert-inline {{ $type }}">
  <i class="bi {{ $icon }} fs-5 flex-shrink-0"></i>
  <span>{{ $slot }}</span>
</div>
