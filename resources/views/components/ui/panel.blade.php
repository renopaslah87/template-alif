{{--
  x-ui.panel — Kotak panel dengan header opsional

  Props:
    $title  string  Judul panel (opsional)
    $icon   string  Bootstrap Icon class (opsional, hanya tampil jika $title ada)

  Slot: konten body panel

  Named slot "$header" tersedia untuk mengganti header secara penuh.

  Contoh:
    <x-ui.panel title="Data Pegawai" icon="bi-people">
        <p>Isi konten di sini.</p>
    </x-ui.panel>

    {{-- Tanpa judul --}}
    <x-ui.panel>
        <p>Panel sederhana.</p>
    </x-ui.panel>
--}}

@props([
  'title' => null,
  'icon'  => null,
])

<div class="panel">
  @if (isset($header))
    {{ $header }}
  @elseif ($title)
    <div class="panel-header">
      @if ($icon)
        <i class="bi {{ $icon }} text-primary"></i>
      @endif
      {{ $title }}
    </div>
  @endif

  {{ $slot }}
</div>
