{{--
  x-ui.dialog — Modal dialog

  Props:
    $id     string  ID elemen (wajib), digunakan oleh App.dialog.open(id)
    $title  string  Judul dialog
    $icon   string  Bootstrap Icon class (opsional)
    $size   string  'sm' | 'md' | 'lg' | 'xl'  (default: md)

  Slot default : konten body dialog
  Named slot "$footer" : tombol-tombol aksi (App.dialog.close, simpan, dll.)

  Penggunaan:
    <x-ui.dialog id="dlgTambah" title="Tambah Data" icon="bi-plus-circle" size="md">
      ... (body content) ...
      <div class="p-4"> ... </div>

      <x-slot:footer>
        <button class="btn-ui ghost" onclick="App.dialog.close('dlgTambah')">Batal</button>
        <button class="btn-ui primary">Simpan</button>
      </x-slot:footer>
    </x-ui.dialog>

  JS: App.dialog.open('dlgTambah')  /  App.dialog.close('dlgTambah')
--}}

@props([
  'id'    => 'dialog',
  'title' => 'Dialog',
  'icon'  => null,
  'size'  => 'md',
])

<div id="{{ $id }}" class="dialog-backdrop">
  <div class="dialog {{ $size }}">

    {{-- Header --}}
    <div class="panel-header">
      @if ($icon)
        <i class="bi {{ $icon }} text-primary"></i>
      @endif
      {{ $title }}
      <button class="btn-close ms-auto" style="font-size:11px;"
              onclick="App.dialog.close('{{ $id }}')"></button>
    </div>

    {{-- Body --}}
    {{ $slot }}

    {{-- Footer / Button bar --}}
    @if (isset($footer))
      <div class="dialog-btnbar">
        {{ $footer }}
      </div>
    @endif

  </div>
</div>
