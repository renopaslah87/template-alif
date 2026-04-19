{{--
  x-ui.empty-state — Tampilan saat tidak ada data

  Props:
    $icon         string  Bootstrap Icon class, e.g. 'bi-inbox'  (default: bi-inbox)
    $title        string  Judul singkat
    $description  string  Deskripsi detail (opsional)

  Contoh:
    <x-ui.empty-state icon="bi-search" title="Tidak ada data"
                      description="Coba ubah filter pencarian Anda." />
--}}

@props([
  'icon'        => 'bi-inbox',
  'title'       => 'Tidak ada data',
  'description' => null,
])

<div class="empty-state">
  <div class="empty-icon"><i class="bi {{ $icon }}"></i></div>
  <div class="empty-title">{{ $title }}</div>
  @if ($description)
    <div class="empty-desc">{{ $description }}</div>
  @endif
  @if ($slot->isNotEmpty())
    <div class="mt-3">{{ $slot }}</div>
  @endif
</div>
