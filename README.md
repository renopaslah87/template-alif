# AlifUI

> **Enterprise Admin UI Template** — Laravel 10 + Bootstrap 5

AlifUI adalah starter template untuk aplikasi web enterprise internal berbasis **Laravel 10**, menggunakan **Bootstrap 5.3** dan desain sistem CSS kustom tanpa ketergantungan build tool untuk styling. Cocok untuk aplikasi back-office, sistem informasi manajemen, dashboard operasional, dan aplikasi internal lainnya.

---

## Filosofi

**"Alif"** (ا) adalah huruf pertama dalam abjad Arab — simbol fondasi dan permulaan. AlifUI hadir sebagai fondasi solid untuk membangun antarmuka aplikasi enterprise yang cepat, rapi, dan konsisten.

---

## Tech Stack

| Komponen | Teknologi |
|---|---|
| Framework | Laravel 10 (PHP ^8.1) |
| CSS Framework | Bootstrap 5.3.2 (CDN) |
| Ikon | Bootstrap Icons 1.11.1 (CDN) |
| Font | Inter via Google Fonts (CDN) |
| Custom Styling | `public/css/ui.css` (no build tool) |
| JS Utility | `public/js/ui.js` (vanilla JS) |
| Blade Components | `resources/views/components/ui/` |

---

## Fitur

- **Layout shell reusable** (`x-layouts.app`) dengan named slots untuk header, menubar, sidebar, dialogs, footer, dan scripts
- **Multi-tab navigation** — pola desktop-app dalam browser, cocok untuk aplikasi operasional intensif
- **Sidebar collapsible** dengan tree navigation dan dukungan swipe gesture di mobile
- **Responsive penuh** — hamburger menu, sidebar overlay, tab header scrollable di layar kecil
- **Design tokens** via CSS custom properties — ganti tema cukup di satu tempat (`:root`)
- **7 Blade components** siap pakai dengan props yang terdokumentasi
- **App JS utility object** — `App.dialog`, `App.mask`, `App.toast`, `App.tab`, `App.sidebar`, `App.table`

---

## Komponen Blade

| Komponen | Tag | Deskripsi |
|---|---|---|
| Stat Card | `<x-ui.stat-card>` | Kartu KPI/statistik dengan aksen warna dan delta |
| Alert Inline | `<x-ui.alert>` | Pesan sukses/error/warning/info |
| Badge | `<x-ui.badge>` | Label status kecil dengan variasi warna dan dot |
| Empty State | `<x-ui.empty-state>` | Tampilan ketika tidak ada data |
| Panel | `<x-ui.panel>` | Kotak container dengan header opsional |
| Dialog | `<x-ui.dialog>` | Modal dialog dengan slot footer |
| Confirm Dialog | `<x-ui.confirm-dialog>` | Dialog konfirmasi aksi destruktif |

> **Catatan performa:** Gunakan HTML + CSS class langsung (`badge-ui success`, `alert-inline`) di dalam loop/tabel. Gunakan `<x-ui.*>` untuk elemen tunggal agar overhead instansiasi komponen minimal.

---

## Struktur Direktori

```
public/
  css/
    ui.css                    ← Design tokens + semua custom CSS
  js/
    ui.js                     ← App utility object (window.App)

resources/views/
  components/
    layouts/
      app.blade.php           ← Shell layout utama
    ui/
      stat-card.blade.php
      alert.blade.php
      badge.blade.php
      empty-state.blade.php
      panel.blade.php
      dialog.blade.php
      confirm-dialog.blade.php
  pages/
    demo.blade.php            ← Demo semua komponen (4 tab)
```

---

## Penggunaan Layout

```blade
<x-layouts.app title="Nama Halaman" brand="Nama Aplikasi">

  <x-slot:headerRight>
    <span>Admin</span>
    <a href="/logout" class="text-white opacity-75">Keluar</a>
  </x-slot:headerRight>

  <x-slot:menubar>
    {{-- .menu-group > .menu-item + .menu-dropdown --}}
  </x-slot:menubar>

  <x-slot:sidebar>
    {{-- .panel-header + .tree-node items --}}
  </x-slot:sidebar>

  {{-- Default slot: tabs-header + tab-content divs --}}
  <div class="tabs-header">
    <div class="tab active" data-tab="tab-main" onclick="App.tab.show('tab-main')">
      <i class="bi bi-grid"></i> Halaman Utama
    </div>
  </div>

  <div id="tab-main" class="tab-content flex-grow-1 overflow-auto p-3">
    {{-- konten --}}
  </div>

  <x-slot:dialogs>
    {{-- dialog backdrop HTML atau <x-ui.dialog> --}}
  </x-slot:dialogs>

  <x-slot:footer>
    <span>Nama Aplikasi &copy; {{ date('Y') }}</span>
  </x-slot:footer>

  <x-slot:scripts>
    <script>
      document.addEventListener('DOMContentLoaded', () => App.tab.show('tab-main'));
    </script>
  </x-slot:scripts>

</x-layouts.app>
```

---

## App JS — Referensi Cepat

```js
// Dialog
App.dialog.open('myDialogId')
App.dialog.close('myDialogId')

// Loading Mask (default: #globalMask)
App.mask.show()
App.mask.hide()
App.mask.show('customMaskId')   // mask spesifik

// Toast
App.toast('Judul', 'Pesan...', 'success')   // success | error | warning | info

// Tabs
App.tab.show('tab-datagrid')
App.tab.close('tab-form')

// Sidebar
App.sidebar.toggle('sub-menu-id', this)     // collapse/expand
App.sidebar.select(this)                     // set active node
App.sidebar.mobileOpen()
App.sidebar.mobileClose()

// Table
App.table.checkAll(masterCheckboxEl)
```

---

## CSS — Design Tokens

```css
/* Override di :root untuk ganti tema global */
:root {
  --primary:       #2563eb;
  --success:       #16a34a;
  --danger:        #dc2626;
  --warning:       #d97706;
  --info:          #0891b2;
  --bg-header:     #0f172a;   /* warna top bar */
  --bg-body:       #f1f5f9;
  --text-main:     #334155;
  --text-muted:    #64748b;
}
```

---

## Instalasi

```bash
git clone <repo-url> project-name
cd project-name

composer install
cp .env.example .env
php artisan key:generate

# Jalankan server development
php artisan serve
```

Akses `http://localhost:8000` — demo halaman langsung tampil.

> Tidak perlu `npm install` atau build step untuk CSS/JS. Semua asset ada di `public/` dan di-load via CDN.

---

## Dikembangkan oleh

**PT. Tata Riau Saudjana**

---
