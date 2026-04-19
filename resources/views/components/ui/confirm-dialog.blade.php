{{--
  x-ui.confirm-dialog — Dialog konfirmasi sederhana

  Props:
    $id           string  ID elemen (wajib)
    $title        string  Judul konfirmasi  (default: 'Konfirmasi')
    $message      string  Teks pertanyaan
    $confirmText  string  Label tombol konfirmasi  (default: 'Ya, Lanjutkan')
    $onConfirm    string  Ekspresi JavaScript yang dijalankan saat konfirmasi diklik

  Penggunaan:
    <x-ui.confirm-dialog
        id="dlgHapus"
        title="Hapus Data"
        message="Apakah Anda yakin ingin menghapus data ini? Tindakan tidak dapat dibatalkan."
        confirm-text="Ya, Hapus"
        on-confirm="doDelete()" />

  JS: App.dialog.open('dlgHapus')
--}}

@props([
  'id'          => 'confirmDialog',
  'title'       => 'Konfirmasi',
  'message'     => 'Apakah Anda yakin?',
  'confirmText' => 'Ya, Lanjutkan',
  'onConfirm'   => '',
])

<div id="{{ $id }}" class="dialog-backdrop">
  <div class="confirm-dialog">

    {{-- Header --}}
    <div class="panel-header">
      <i class="bi bi-exclamation-triangle text-warning"></i>
      {{ $title }}
      <button class="btn-close ms-auto" style="font-size:11px;"
              onclick="App.dialog.close('{{ $id }}')"></button>
    </div>

    {{-- Body --}}
    <div class="p-4">
      <p class="mb-0" style="font-size:13px; line-height:1.6;">{{ $message }}</p>
    </div>

    {{-- Footer --}}
    <div class="dialog-btnbar">
      <button class="btn-ui ghost" onclick="App.dialog.close('{{ $id }}')">Batal</button>
      <button class="btn-ui danger primary"
              onclick="{{ $onConfirm }}; App.dialog.close('{{ $id }}')">
        {{ $confirmText }}
      </button>
    </div>

  </div>
</div>
