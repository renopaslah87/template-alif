{{--
  Demo Sederhana — Contoh layout TANPA multi-tab (page-based / scrollable)
  Route: GET /demo-simple

  Pola ini cocok untuk:
  - Aplikasi CRUD standar dengan navigasi sidebar → halaman baru (full reload atau Livewire)
  - Dashboard informatif sederhana
  - Halaman detail / form tunggal

  Bandingkan dengan /demo (multi-tab) untuk memilih pola yang sesuai.
--}}
<x-layouts.app title="Demo Sederhana — Page Based" brand="Enterprise Workspace">

  {{-- ── Header right ──────────────────────────────────────── --}}
  <x-slot:headerRight>
    <div class="d-flex align-items-center gap-2">
      <i class="bi bi-person-circle fs-5" style="color:#94a3b8;"></i>
      <span class="user-info"><strong>Administrator</strong> <span style="color:#94a3b8">— Demo</span></span>
    </div>
    <a href="#" class="text-white text-decoration-none opacity-75 d-flex align-items-center gap-1">
      <i class="bi bi-box-arrow-right"></i> Keluar
    </a>
  </x-slot:headerRight>

  {{-- ── Menubar ────────────────────────────────────────────── --}}
  <x-slot:menubar>
    <div class="menu-group">
      <div class="menu-item">File</div>
      <div class="menu-dropdown">
        <div class="menu-dropdown-item" onclick="App.dialog.open('dlgForm')">
          <i class="bi bi-file-earmark-plus text-primary fs-6"></i> Data Baru...
        </div>
        <div class="menu-dropdown-divider"></div>
        <div class="menu-dropdown-item danger"><i class="bi bi-power fs-6"></i> Keluar Aplikasi</div>
      </div>
    </div>
    <div class="menu-group">
      <div class="menu-item">Tampilan</div>
      <div class="menu-dropdown">
        <div class="menu-dropdown-item" onclick="App.mask.show(); setTimeout(App.mask.hide, 800)">
          <i class="bi bi-arrow-repeat text-success fs-6"></i> Segarkan Layar
        </div>
      </div>
    </div>
    <div class="menu-group">
      <div class="menu-item">Contoh Layout</div>
      <div class="menu-dropdown">
        <a href="{{ url('/demo') }}" class="menu-dropdown-item text-decoration-none" style="color:inherit;">
          <i class="bi bi-layout-tabs text-primary fs-6"></i> Multi-Tab (Desktop App)
        </a>
        <div class="menu-dropdown-item" style="color:var(--text-muted);cursor:default;background:var(--bg-hover);">
          <i class="bi bi-layout-text-sidebar text-success fs-6"></i> Halaman Biasa <span style="font-size:10px;">(aktif)</span>
        </div>
      </div>
    </div>
    <div class="menu-group">
      <div class="menu-item">Halaman Auth</div>
      <div class="menu-dropdown">
        <a href="{{ route('login') }}" class="menu-dropdown-item text-decoration-none" style="color:inherit;">
          <i class="bi bi-box-arrow-in-right text-primary fs-6"></i> Login
        </a>
        <a href="{{ route('register') }}" class="menu-dropdown-item text-decoration-none" style="color:inherit;">
          <i class="bi bi-person-plus text-success fs-6"></i> Register
        </a>
      </div>
    </div>
    <div class="menu-group">
      <div class="menu-item">Bantuan</div>
      <div class="menu-dropdown">
        <div class="menu-dropdown-item"
             onclick="App.toast('Tentang','Enterprise UI v1.0 — Alif Template','info')">
          <i class="bi bi-info-circle text-info fs-6"></i> Tentang Aplikasi
        </div>
      </div>
    </div>
  </x-slot:menubar>

  {{-- ── Sidebar ─────────────────────────────────────────────── --}}
  <x-slot:sidebar>
    <div class="panel-header"><i class="bi bi-list"></i> Navigasi Modul</div>
    <div class="flex-grow-1 overflow-auto p-2 scroll">
      <div class="section-title">Menu Utama</div>
      <div>
        <div class="tree-node" onclick="App.sidebar.toggle('sub-data', this)">
          <i class="bi bi-chevron-down text-muted me-2" style="font-size:10px;transition:transform .2s" data-toggle-icon></i>
          <i class="bi bi-folder2-open text-primary me-2"></i><span>Data Master</span>
        </div>
        <div id="sub-data" class="ps-4">
          <div class="tree-node active" onclick="App.sidebar.select(this)">
            <i class="bi bi-people text-muted me-2"></i><span>Dashboard</span>
          </div>
          <div class="tree-node" onclick="App.dialog.open('dlgForm'); App.sidebar.select(this)">
            <i class="bi bi-file-text text-muted me-2"></i><span>Form Input</span>
          </div>
        </div>
      </div>
      <div class="sidebar-sep"></div>
      <div class="section-title">Referensi Cepat</div>
      <div class="tree-node" onclick="App.toast('Info','Pengaturan belum tersedia.','info')">
        <i class="bi bi-gear text-muted me-2"></i><span>Pengaturan</span>
      </div>
      <div class="sidebar-sep"></div>
      <div class="section-title">Contoh Layout</div>
      <a href="{{ url('/demo') }}" class="tree-node text-decoration-none" style="color:inherit;">
        <i class="bi bi-layout-tabs text-primary me-2"></i><span>Multi-Tab</span>
      </a>
      <div class="tree-node active" style="pointer-events:none;opacity:.65;">
        <i class="bi bi-layout-text-sidebar text-success me-2"></i><span>Halaman Biasa</span>
      </div>
      <div class="sidebar-sep"></div>
      <div class="section-title">Halaman Auth</div>
      <a href="{{ route('login') }}" class="tree-node text-decoration-none" style="color:inherit;">
        <i class="bi bi-box-arrow-in-right text-primary me-2"></i><span>Login</span>
      </a>
      <a href="{{ route('register') }}" class="tree-node text-decoration-none" style="color:inherit;">
        <i class="bi bi-person-plus text-success me-2"></i><span>Register</span>
      </a>
    </div>
  </x-slot:sidebar>

  {{-- ═══════════════════════════════════════════════════════════
       KONTEN UTAMA — Satu area scrollable, TANPA tabs
       Ini adalah pola "page-based" / halaman biasa.
       Klik sidebar → navigasi ke halaman/URL berbeda.
       ═══════════════════════════════════════════════════════════ --}}
  <div class="flex-grow-1 overflow-auto scroll p-3">

    {{-- ── Breadcrumb + judul halaman ────────────────────────── --}}
    <div class="d-flex align-items-center justify-content-between mb-3">
      <div>
        <div style="font-size:11px;color:var(--text-muted);margin-bottom:2px;">
          Data Master &rsaquo; Dashboard
        </div>
        <h6 class="mb-0 fw-semibold" style="color:#0f172a;">Ringkasan Dashboard</h6>
      </div>
      <div class="d-flex gap-2">
        <button class="btn-ui outline" onclick="App.mask.show(); setTimeout(App.mask.hide, 800)">
          <i class="bi bi-arrow-repeat"></i> Segarkan
        </button>
        <button class="btn-ui primary" onclick="App.dialog.open('dlgForm')">
          <i class="bi bi-plus-lg"></i> Tambah Data
        </button>
      </div>
    </div>

    {{-- ── Info: penjelasan pola layout ──────────────────────── --}}
    <div class="alert-inline info mb-4">
      <i class="bi bi-info-circle-fill fs-5 flex-shrink-0"></i>
      <span>
        <strong>Pola Page-Based:</strong> Konten mengisi satu area scrollable.
        Sidebar → navigasi antar halaman (full reload atau Livewire component swap).
        Bandingkan dengan <a href="{{ url('/demo') }}" style="color:var(--primary);">Demo Multi-Tab</a>
        untuk pola desktop-app.
      </span>
    </div>

    {{-- ── Stat Cards ─────────────────────────────────────────── --}}
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;" class="mb-4">
      <div class="stat-card accent-blue">
        <div class="stat-card-top">
          <span class="stat-label">Total Pegawai</span>
          <div class="stat-icon blue"><i class="bi bi-people-fill"></i></div>
        </div>
        <div class="stat-value">248</div>
        <div class="stat-divider"></div>
        <div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> +12 bulan ini</div>
      </div>
      <div class="stat-card accent-green">
        <div class="stat-card-top">
          <span class="stat-label">Pegawai Aktif</span>
          <div class="stat-icon green"><i class="bi bi-person-check-fill"></i></div>
        </div>
        <div class="stat-value">231</div>
        <div class="stat-divider"></div>
        <div class="stat-delta neutral"><i class="bi bi-dash"></i> 93.1% dari total</div>
      </div>
      <div class="stat-card accent-amber">
        <div class="stat-card-top">
          <span class="stat-label">Cuti Berjalan</span>
          <div class="stat-icon amber"><i class="bi bi-calendar2-event"></i></div>
        </div>
        <div class="stat-value">12</div>
        <div class="stat-divider"></div>
        <div class="stat-delta down"><i class="bi bi-arrow-down-short"></i> -3 dari bulan lalu</div>
      </div>
      <div class="stat-card accent-purple">
        <div class="stat-card-top">
          <span class="stat-label">Divisi Aktif</span>
          <div class="stat-icon purple"><i class="bi bi-diagram-3-fill"></i></div>
        </div>
        <div class="stat-value">8</div>
        <div class="stat-divider"></div>
        <div class="stat-delta neutral"><i class="bi bi-dash"></i> Tidak ada perubahan</div>
      </div>
    </div>

    {{-- ── Dua kolom: tabel ringkas + status ─────────────────── --}}
    <div class="row g-3 mb-3">
      <div class="col-lg-8">
        <div class="panel">
          <div class="panel-header">
            <i class="bi bi-people text-primary"></i> Data Pegawai Terbaru
            <a href="#" class="ms-auto" style="font-size:11px;color:var(--primary);text-decoration:none;">
              Lihat semua <i class="bi bi-arrow-right"></i>
            </a>
          </div>
          <div class="overflow-auto">
            <table class="datagrid">
              <thead>
                <tr>
                  <th>#</th><th>Nama</th><th>Departemen</th><th>Status</th><th style="width:80px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-muted-ui">1</td>
                  <td><strong>Ahmad Fauzi</strong></td>
                  <td>IT &amp; Engineering</td>
                  <td><span class="badge-ui success dot">Aktif</span></td>
                  <td>
                    <button class="btn-ui outline" style="padding:2px 8px;font-size:12px" onclick="App.dialog.open('dlgForm')"><i class="bi bi-pencil"></i></button>
                    <button class="btn-ui danger" style="padding:2px 8px;font-size:12px" onclick="App.dialog.open('dlgHapus')"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td class="text-muted-ui">2</td>
                  <td><strong>Budi Santoso</strong></td>
                  <td>Finance</td>
                  <td><span class="badge-ui success dot">Aktif</span></td>
                  <td>
                    <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
                    <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td class="text-muted-ui">3</td>
                  <td><strong>Citra Dewi</strong></td>
                  <td>Human Resources</td>
                  <td><span class="badge-ui success dot">Aktif</span></td>
                  <td>
                    <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
                    <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td class="text-muted-ui">4</td>
                  <td><strong>Diana Putri</strong></td>
                  <td>Marketing</td>
                  <td><span class="badge-ui warning dot">Cuti</span></td>
                  <td>
                    <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
                    <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td class="text-muted-ui">5</td>
                  <td><strong>Eko Prasetyo</strong></td>
                  <td>IT &amp; Engineering</td>
                  <td><span class="badge-ui danger dot">Nonaktif</span></td>
                  <td>
                    <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
                    <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="pagination-bar">
            <span class="text-muted-ui">Menampilkan 1–5 dari 5 data</span>
            <div class="d-flex gap-1">
              <button class="btn-ui outline" disabled><i class="bi bi-chevron-left"></i></button>
              <button class="btn-ui primary" style="padding:3px 10px">1</button>
              <button class="btn-ui outline" disabled><i class="bi bi-chevron-right"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 d-flex flex-column gap-3">
        {{-- Status Sistem --}}
        <div class="panel">
          <div class="panel-header"><i class="bi bi-activity text-primary"></i> Status Sistem</div>
          <div class="p-3 d-flex flex-column gap-2">
            <div class="alert-inline success">
              <i class="bi bi-check-circle-fill fs-5 flex-shrink-0"></i>
              <span>Semua layanan normal.</span>
            </div>
            <div class="alert-inline warning">
              <i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0"></i>
              <span>Pembaruan Minggu 02:00 WIB.</span>
            </div>
          </div>
        </div>

        {{-- Aktivitas --}}
        <div class="panel flex-grow-1">
          <div class="panel-header"><i class="bi bi-clock-history text-primary"></i> Aktivitas</div>
          <div class="p-3">
            <div class="d-flex align-items-start gap-2 py-2" style="border-bottom:1px solid var(--border-light)">
              <i class="bi bi-circle-fill mt-1" style="font-size:7px;color:var(--primary);flex-shrink:0;"></i>
              <div class="flex-grow-1">
                <div class="fw-medium">Ahmad Fauzi</div>
                <div class="text-muted-ui" style="font-size:11px">Login — 2 menit lalu</div>
              </div>
            </div>
            <div class="d-flex align-items-start gap-2 py-2" style="border-bottom:1px solid var(--border-light)">
              <i class="bi bi-circle-fill mt-1" style="font-size:7px;color:var(--warning);flex-shrink:0;"></i>
              <div class="flex-grow-1">
                <div class="fw-medium">Budi Santoso</div>
                <div class="text-muted-ui" style="font-size:11px">Edit data — 15 menit lalu</div>
              </div>
            </div>
            <div class="d-flex align-items-start gap-2 py-2">
              <i class="bi bi-circle-fill mt-1" style="font-size:7px;color:var(--success);flex-shrink:0;"></i>
              <div class="flex-grow-1">
                <div class="fw-medium">Citra Dewi</div>
                <div class="text-muted-ui" style="font-size:11px">Export Excel — 1 jam lalu</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- ── Badge & button showcase ────────────────────────────── --}}
    <div class="row g-3">
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-tag text-primary"></i> Badge</div>
          <div class="p-3 d-flex flex-wrap gap-2 align-items-center">
            <span class="badge-ui success">Aktif</span>
            <span class="badge-ui danger">Nonaktif</span>
            <span class="badge-ui warning">Cuti</span>
            <span class="badge-ui info">Proses</span>
            <span class="badge-ui neutral">Draft</span>
            <span class="badge-ui primary">Baru</span>
            <span class="badge-ui purple">Premium</span>
            <span class="badge-ui success dot">Online</span>
            <span class="badge-ui danger dot">Offline</span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-cursor text-primary"></i> Tombol &amp; Interaktif</div>
          <div class="p-3 d-flex flex-wrap gap-2 align-items-center">
            <button class="btn-ui primary" onclick="App.dialog.open('dlgForm')"><i class="bi bi-plus-lg"></i> Tambah</button>
            <button class="btn-ui outline"><i class="bi bi-pencil"></i> Ubah</button>
            <button class="btn-ui danger" onclick="App.dialog.open('dlgHapus')"><i class="bi bi-trash"></i> Hapus</button>
            <button class="btn-ui ghost" onclick="App.toast('Info','Notifikasi berhasil!','success')"><i class="bi bi-bell"></i> Toast</button>
            <button class="btn-ui outline" onclick="App.mask.show(); setTimeout(App.mask.hide, 1200)"><i class="bi bi-hourglass-split"></i> Loading</button>
          </div>
        </div>
      </div>
    </div>

  </div>{{-- /konten utama --}}

  {{-- ── Dialogs ──────────────────────────────────────────────── --}}
  <x-slot:dialogs>
    {{-- Dialog: Form --}}
    <div id="dlgForm" class="dialog-backdrop">
      <div class="dialog md">
        <div class="panel-header">
          <i class="bi bi-person-plus text-primary"></i> Tambah / Edit Data
          <button class="btn-close ms-auto" style="font-size:11px" onclick="App.dialog.close('dlgForm')"></button>
        </div>
        <div class="p-4">
          <div class="form-row">
            <div class="form-row-label">Nama Lengkap <span class="req">*</span></div>
            <div class="form-row-control"><input type="text" class="form-ctrl" placeholder="Masukkan nama lengkap"></div>
          </div>
          <div class="form-row">
            <div class="form-row-label">Departemen <span class="req">*</span></div>
            <div class="form-row-control">
              <select class="form-ctrl">
                <option value="">-- Pilih --</option>
                <option>IT &amp; Engineering</option>
                <option>Finance</option>
                <option>Human Resources</option>
              </select>
            </div>
          </div>
          <div class="form-row mb-0">
            <div class="form-row-label">Status</div>
            <div class="form-row-control d-flex gap-4 pt-1">
              <label class="d-flex align-items-center gap-2 cursor-pointer"><input type="radio" name="s-status" checked> Aktif</label>
              <label class="d-flex align-items-center gap-2 cursor-pointer"><input type="radio" name="s-status"> Nonaktif</label>
            </div>
          </div>
        </div>
        <div class="dialog-btnbar">
          <button class="btn-ui ghost" onclick="App.dialog.close('dlgForm')">Batal</button>
          <button class="btn-ui primary"
                  onclick="App.toast('Berhasil','Data berhasil disimpan.','success'); App.dialog.close('dlgForm')">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </div>
    </div>

    {{-- Confirm Dialog: Hapus --}}
    <div id="dlgHapus" class="dialog-backdrop">
      <div class="confirm-dialog">
        <div class="panel-header">
          <i class="bi bi-exclamation-triangle text-warning"></i> Hapus Data
          <button class="btn-close ms-auto" style="font-size:11px" onclick="App.dialog.close('dlgHapus')"></button>
        </div>
        <div class="p-4">
          <p class="mb-0" style="font-size:13px;line-height:1.6">
            Apakah Anda yakin ingin menghapus data ini? Tindakan tidak dapat dibatalkan.
          </p>
        </div>
        <div class="dialog-btnbar">
          <button class="btn-ui ghost" onclick="App.dialog.close('dlgHapus')">Batal</button>
          <button class="btn-ui danger primary"
                  onclick="App.toast('Berhasil','Data berhasil dihapus.','success'); App.dialog.close('dlgHapus')">
            Ya, Hapus
          </button>
        </div>
      </div>
    </div>
  </x-slot:dialogs>

  {{-- ── Footer ────────────────────────────────────────────────── --}}
  <x-slot:footer>
    <span class="footer-brand">Enterprise Workspace &copy; {{ date('Y') }}</span>
    <span>v1.0.0</span>
  </x-slot:footer>

</x-layouts.app>
