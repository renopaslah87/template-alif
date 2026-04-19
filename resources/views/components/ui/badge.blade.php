{{--
  x-ui.badge — Badge label kecil

  Props:
    $type   string   'success' | 'danger' | 'warning' | 'info' | 'neutral' | 'primary' | 'purple'
    $dot    boolean  Tampilkan titik indikator (default: false)

  Slot: teks label

  Contoh:
    <x-ui.badge type="success">Aktif</x-ui.badge>
    <x-ui.badge type="warning" :dot="true">Menunggu</x-ui.badge>
--}}

@props([
  'type' => 'neutral',
  'dot'  => false,
])

<span class="badge-ui {{ $type }} {{ $dot ? 'dot' : '' }}">{{ $slot }}</span>
