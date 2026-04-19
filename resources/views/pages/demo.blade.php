{{--
  Demo Page — Menampilkan seluruh komponen UI dari layouts/app.blade.php
  Route: GET /  atau  GET /demo

  Catatan performa: gunakan HTML/CSS langsung di dalam loop, bukan <x-ui.*>,
  untuk menghindari overhead instansiasi anonymous component yang berlebihan.
--}}
<x-layouts.app title="Demo Komponen UI" brand="Enterprise Workspace">

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
        <div class="menu-dropdown-item" onclick="App.dialog.open('dlgTambah')">
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
        <div class="menu-dropdown-item" style="color:var(--text-muted);cursor:default;background:var(--bg-hover);">
          <i class="bi bi-layout-tabs text-primary fs-6"></i> Multi-Tab <span style="font-size:10px;">(aktif)</span>
        </div>
        <a href="{{ url('/demo-simple') }}" class="menu-dropdown-item text-decoration-none" style="color:inherit;">
          <i class="bi bi-layout-text-sidebar text-success fs-6"></i> Halaman Biasa
        </a>
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
          <div class="tree-node active" onclick="App.tab.show('tab-datagrid'); App.sidebar.select(this)">
            <i class="bi bi-people text-muted me-2"></i><span>Data Pegawai</span>
          </div>
          <div class="tree-node" onclick="App.tab.show('tab-form'); App.sidebar.select(this)">
            <i class="bi bi-file-text text-muted me-2"></i><span>Form Input</span>
          </div>
          <div class="tree-node" onclick="App.tab.show('tab-dashboard'); App.sidebar.select(this)">
            <i class="bi bi-grid text-muted me-2"></i><span>Dashboard</span>
          </div>
          <div class="tree-node" onclick="App.tab.show('tab-komponen'); App.sidebar.select(this)">
            <i class="bi bi-boxes text-muted me-2"></i><span>Komponen UI</span>
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
      <div class="tree-node active" style="pointer-events:none;opacity:.65;">
        <i class="bi bi-layout-tabs text-primary me-2"></i><span>Multi-Tab</span>
      </div>
      <a href="{{ url('/demo-simple') }}" class="tree-node text-decoration-none" style="color:inherit;">
        <i class="bi bi-layout-text-sidebar text-success me-2"></i><span>Halaman Biasa</span>
      </a>
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
       TABS HEADER
       ═══════════════════════════════════════════════════════════ --}}
  <div class="tabs-header">
    <div class="tab active" data-tab="tab-datagrid" onclick="App.tab.show('tab-datagrid')">
      <i class="bi bi-people-fill text-primary"></i> Data Pegawai
    </div>
    <div class="tab" data-tab="tab-form" onclick="App.tab.show('tab-form')">
      <i class="bi bi-file-text"></i> Form Input
      <span class="tab-close" onclick="event.stopPropagation();App.tab.close('tab-form')"><i class="bi bi-x"></i></span>
    </div>
    <div class="tab" data-tab="tab-dashboard" onclick="App.tab.show('tab-dashboard')">
      <i class="bi bi-grid"></i> Dashboard
      <span class="tab-close" onclick="event.stopPropagation();App.tab.close('tab-dashboard')"><i class="bi bi-x"></i></span>
    </div>
    <div class="tab" data-tab="tab-komponen" onclick="App.tab.show('tab-komponen')">
      <i class="bi bi-boxes"></i> Komponen UI
      <span class="tab-close" onclick="event.stopPropagation();App.tab.close('tab-komponen')"><i class="bi bi-x"></i></span>
    </div>
  </div>

  {{-- ═══════════════════════════════════════════════════════════
       TAB 1 — DATA PEGAWAI
       Gunakan HTML langsung (bukan <x-ui.*>) di dalam tabel
       agar tidak ada overhead instansiasi komponen per-baris.
       ═══════════════════════════════════════════════════════════ --}}
  <div id="tab-datagrid" class="tab-content flex-grow-1 d-flex flex-column overflow-hidden">
    <div class="toolbar">
      <button class="btn-ui primary" onclick="App.dialog.open('dlgTambah')"><i class="bi bi-plus-lg"></i> Tambah</button>
      <button class="btn-ui outline"><i class="bi bi-pencil"></i> Ubah</button>
      <div class="toolbar-sep"></div>
      <button class="btn-ui danger" onclick="App.dialog.open('dlgHapus')"><i class="bi bi-trash"></i> Hapus</button>
      <div class="toolbar-sep"></div>
      <button class="btn-ui ghost"><i class="bi bi-arrow-repeat"></i> Segarkan</button>
      <div class="ms-auto">
        <input type="search" class="form-ctrl" style="width:200px" placeholder="Cari nama...">
      </div>
    </div>

    <div class="flex-grow-1 overflow-auto scroll">
      <table class="datagrid">
        <thead>
          <tr>
            <th style="width:36px"><input type="checkbox" onclick="App.table.checkAll(this)"></th>
            <th>#</th><th>Nama</th><th>Departemen</th><th>Jabatan</th><th>Status</th>
            <th style="width:100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox"></td><td class="text-muted-ui">1</td>
            <td><strong>Ahmad Fauzi</strong></td><td>IT &amp; Engineering</td>
            <td class="text-muted-ui">Senior Dev</td>
            <td><span class="badge-ui success dot">Aktif</span></td>
            <td>
              <button class="btn-ui outline" style="padding:2px 8px;font-size:12px" onclick="App.dialog.open('dlgTambah')"><i class="bi bi-pencil"></i></button>
              <button class="btn-ui danger" style="padding:2px 8px;font-size:12px" onclick="App.dialog.open('dlgHapus')"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td><td class="text-muted-ui">2</td>
            <td><strong>Budi Santoso</strong></td><td>Finance</td>
            <td class="text-muted-ui">Staff Akuntansi</td>
            <td><span class="badge-ui success dot">Aktif</span></td>
            <td>
              <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
              <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td><td class="text-muted-ui">3</td>
            <td><strong>Citra Dewi</strong></td><td>Human Resources</td>
            <td class="text-muted-ui">HR Manager</td>
            <td><span class="badge-ui success dot">Aktif</span></td>
            <td>
              <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
              <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td><td class="text-muted-ui">4</td>
            <td><strong>Diana Putri</strong></td><td>Marketing</td>
            <td class="text-muted-ui">Content Creator</td>
            <td><span class="badge-ui warning dot">Cuti</span></td>
            <td>
              <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
              <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td><td class="text-muted-ui">5</td>
            <td><strong>Eko Prasetyo</strong></td><td>IT &amp; Engineering</td>
            <td class="text-muted-ui">QA Engineer</td>
            <td><span class="badge-ui danger dot">Nonaktif</span></td>
            <td>
              <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
              <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td><td class="text-muted-ui">6</td>
            <td><strong>Fajar Ramadhan</strong></td><td>Finance</td>
            <td class="text-muted-ui">Analis Keuangan</td>
            <td><span class="badge-ui success dot">Aktif</span></td>
            <td>
              <button class="btn-ui outline" style="padding:2px 8px;font-size:12px"><i class="bi bi-pencil"></i></button>
              <button class="btn-ui danger" style="padding:2px 8px;font-size:12px"><i class="bi bi-trash"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="pagination-bar">
      <span class="text-muted-ui">Menampilkan 1–6 dari 6 data</span>
      <div class="d-flex gap-1">
        <button class="btn-ui outline" disabled><i class="bi bi-chevron-left"></i></button>
        <button class="btn-ui primary" style="padding:3px 10px">1</button>
        <button class="btn-ui outline" disabled><i class="bi bi-chevron-right"></i></button>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════════════════════════════
       TAB 2 — FORM INPUT
       ═══════════════════════════════════════════════════════════ --}}
  <div id="tab-form" class="tab-content flex-grow-1 overflow-auto scroll p-3 d-none">
    <div class="panel">
      <div class="panel-header"><i class="bi bi-person-plus text-primary"></i> Form Tambah / Edit Data</div>
      <div class="p-4">
        <div class="alert-inline info mb-4">
          <i class="bi bi-info-circle-fill fs-5 flex-shrink-0"></i>
          <span>Field bertanda <strong>*</strong> wajib diisi sebelum menyimpan data.</span>
        </div>

        <div class="form-row">
          <div class="form-row-label">ID Sistem</div>
          <div class="form-row-control"><input type="text" class="form-ctrl" value="Auto-generated" readonly></div>
        </div>
        <div class="form-row">
          <div class="form-row-label">Nama Lengkap <span class="req">*</span></div>
          <div class="form-row-control"><input type="text" class="form-ctrl" placeholder="Masukkan nama lengkap"></div>
        </div>
        <div class="form-row">
          <div class="form-row-label">Email <span class="req">*</span></div>
          <div class="form-row-control">
            <input type="email" class="form-ctrl is-error" value="email-salah">
            <div class="form-error"><i class="bi bi-exclamation-circle me-1"></i>Format email tidak valid.</div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-row-label">Departemen <span class="req">*</span></div>
          <div class="form-row-control">
            <select class="form-ctrl">
              <option value="">-- Pilih Departemen --</option>
              <option>IT &amp; Engineering</option>
              <option>Finance</option>
              <option>Human Resources</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-row-label">Status</div>
          <div class="form-row-control d-flex gap-4 pt-1">
            <label class="d-flex align-items-center gap-2 cursor-pointer"><input type="radio" name="status" checked> Aktif</label>
            <label class="d-flex align-items-center gap-2 cursor-pointer"><input type="radio" name="status"> Nonaktif</label>
            <label class="d-flex align-items-center gap-2 cursor-pointer"><input type="radio" name="status"> Cuti</label>
          </div>
        </div>
        <div class="form-row">
          <div class="form-row-label">Keterangan</div>
          <div class="form-row-control">
            <textarea class="form-ctrl" rows="3" placeholder="Tuliskan keterangan tambahan..."></textarea>
            <div class="form-hint">Maks. 500 karakter.</div>
          </div>
        </div>

        <div class="d-flex gap-2 justify-content-end mt-2">
          <button class="btn-ui ghost">Batal</button>
          <button class="btn-ui primary" onclick="App.toast('Berhasil','Data berhasil disimpan.','success')">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════════════════════════════
       TAB 3 — DASHBOARD
       ═══════════════════════════════════════════════════════════ --}}
  <div id="tab-dashboard" class="tab-content flex-grow-1 overflow-auto scroll p-3 d-none">

    {{-- Stat Cards — HTML langsung untuk performa --}}
    <div class="stat-grid mb-4" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px">
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

    <div class="row g-3">
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-clock-history text-primary"></i> Aktivitas Terakhir</div>
          <div class="p-3">
            <div class="d-flex align-items-center gap-3 py-2" style="border-bottom:1px solid var(--border-light)">
              <i class="bi bi-circle-fill" style="font-size:7px;color:var(--primary)"></i>
              <div class="flex-grow-1">
                <div class="fw-medium">Ahmad Fauzi</div>
                <div class="text-muted-ui" style="font-size:12px">Login ke sistem</div>
              </div>
              <div class="text-muted-ui" style="font-size:11px">2 menit lalu</div>
            </div>
            <div class="d-flex align-items-center gap-3 py-2" style="border-bottom:1px solid var(--border-light)">
              <i class="bi bi-circle-fill" style="font-size:7px;color:var(--warning)"></i>
              <div class="flex-grow-1">
                <div class="fw-medium">Budi Santoso</div>
                <div class="text-muted-ui" style="font-size:12px">Mengubah data karyawan</div>
              </div>
              <div class="text-muted-ui" style="font-size:11px">15 menit lalu</div>
            </div>
            <div class="d-flex align-items-center gap-3 py-2" style="border-bottom:1px solid var(--border-light)">
              <i class="bi bi-circle-fill" style="font-size:7px;color:var(--success)"></i>
              <div class="flex-grow-1">
                <div class="fw-medium">Citra Dewi</div>
                <div class="text-muted-ui" style="font-size:12px">Mengekspor laporan ke Excel</div>
              </div>
              <div class="text-muted-ui" style="font-size:11px">1 jam lalu</div>
            </div>
            <div class="d-flex align-items-center gap-3 py-2">
              <i class="bi bi-circle-fill" style="font-size:7px;color:var(--info)"></i>
              <div class="flex-grow-1">
                <div class="fw-medium">Diana Putri</div>
                <div class="text-muted-ui" style="font-size:12px">Mengajukan permohonan cuti</div>
              </div>
              <div class="text-muted-ui" style="font-size:11px">3 jam lalu</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-activity text-primary"></i> Status Sistem</div>
          <div class="p-3 d-flex flex-column gap-2">
            <div class="alert-inline success">
              <i class="bi bi-check-circle-fill fs-5 flex-shrink-0"></i>
              <span>Semua layanan beroperasi normal.</span>
            </div>
            <div class="alert-inline warning">
              <i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0"></i>
              <span>Pembaruan dijadwalkan Minggu 02:00 WIB.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- ═══════════════════════════════════════════════════════════
       TAB 4 — KOMPONEN UI
       Showcase statis — tidak ada komponen di dalam loop
       ═══════════════════════════════════════════════════════════ --}}
  <div id="tab-komponen" class="tab-content flex-grow-1 overflow-auto scroll p-3 d-none">
    <div class="row g-3">

      {{-- Alert --}}
      <div class="col-12">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-bell text-primary"></i> Alert Inline &nbsp;<code class="font-mono" style="font-size:11px">.alert-inline</code></div>
          <div class="p-3 d-flex flex-column gap-2">
            <div class="alert-inline success"><i class="bi bi-check-circle-fill fs-5 flex-shrink-0"></i><span>Operasi berhasil diselesaikan tanpa error.</span></div>
            <div class="alert-inline error"><i class="bi bi-x-circle-fill fs-5 flex-shrink-0"></i><span>Terjadi kegagalan koneksi ke server database.</span></div>
            <div class="alert-inline warning"><i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0"></i><span>Sesi Anda akan berakhir dalam 5 menit.</span></div>
            <div class="alert-inline info"><i class="bi bi-info-circle-fill fs-5 flex-shrink-0"></i><span>Gunakan Ctrl+S untuk menyimpan perubahan.</span></div>
          </div>
        </div>
      </div>

      {{-- Badge --}}
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-tag text-primary"></i> Badge &nbsp;<code class="font-mono" style="font-size:11px">.badge-ui</code></div>
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

      {{-- Buttons --}}
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-cursor text-primary"></i> Tombol &nbsp;<code class="font-mono" style="font-size:11px">.btn-ui</code></div>
          <div class="p-3 d-flex flex-wrap gap-2 align-items-center">
            <button class="btn-ui primary"><i class="bi bi-save"></i> Simpan</button>
            <button class="btn-ui success"><i class="bi bi-check-lg"></i> Konfirmasi</button>
            <button class="btn-ui danger"><i class="bi bi-trash"></i> Hapus</button>
            <button class="btn-ui outline"><i class="bi bi-pencil"></i> Ubah</button>
            <button class="btn-ui ghost"><i class="bi bi-x-lg"></i> Batal</button>
            <button class="btn-ui" disabled><i class="bi bi-lock"></i> Disabled</button>
          </div>
        </div>
      </div>

      {{-- Empty State --}}
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-inbox text-primary"></i> Empty State</div>
          <div class="empty-state">
            <div class="empty-icon"><i class="bi bi-search"></i></div>
            <div class="empty-title">Tidak ada hasil</div>
            <div class="empty-desc">Tidak ditemukan data yang cocok dengan kata kunci pencarian Anda.</div>
            <button class="btn-ui outline mt-3" onclick="App.toast('Info','Filter dihapus.','info')">
              <i class="bi bi-x-circle"></i> Hapus Filter
            </button>
          </div>
        </div>
      </div>

      {{-- Interaktif --}}
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-header"><i class="bi bi-window text-primary"></i> Interaktif</div>
          <div class="p-3 d-flex flex-wrap gap-2">
            <button class="btn-ui primary" onclick="App.dialog.open('dlgTambah')"><i class="bi bi-window"></i> Buka Dialog</button>
            <button class="btn-ui danger" onclick="App.dialog.open('dlgHapus')"><i class="bi bi-exclamation-triangle"></i> Konfirmasi Hapus</button>
            <button class="btn-ui outline" onclick="App.mask.show(); setTimeout(App.mask.hide, 1500)"><i class="bi bi-hourglass-split"></i> Loading Mask</button>
            <button class="btn-ui ghost" onclick="App.toast('Toast','Notifikasi berhasil ditampilkan.','success')"><i class="bi bi-bell"></i> Toast</button>
          </div>
        </div>
      </div>

    </div>
  </div>

  {{-- ── Dialogs ──────────────────────────────────────────────── --}}
  <x-slot:dialogs>
    {{-- Dialog: Tambah / Edit --}}
    <div id="dlgTambah" class="dialog-backdrop">
      <div class="dialog md">
        <div class="panel-header">
          <i class="bi bi-person-plus text-primary"></i> Tambah / Edit Pegawai
          <button class="btn-close ms-auto" style="font-size:11px" onclick="App.dialog.close('dlgTambah')"></button>
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
                <option value="">-- Pilih Departemen --</option>
                <option>IT &amp; Engineering</option>
                <option>Finance</option>
              </select>
            </div>
          </div>
          <div class="form-row mb-0">
            <div class="form-row-label">Status</div>
            <div class="form-row-control d-flex gap-4 pt-1">
              <label class="d-flex align-items-center gap-2 cursor-pointer"><input type="radio" name="dlg-status" checked> Aktif</label>
              <label class="d-flex align-items-center gap-2 cursor-pointer"><input type="radio" name="dlg-status"> Nonaktif</label>
            </div>
          </div>
        </div>
        <div class="dialog-btnbar">
          <button class="btn-ui ghost" onclick="App.dialog.close('dlgTambah')">Batal</button>
          <button class="btn-ui primary"
                  onclick="App.toast('Berhasil','Data berhasil disimpan.','success'); App.dialog.close('dlgTambah')">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </div>
    </div>

    {{-- Confirm Dialog: Hapus --}}
    <div id="dlgHapus" class="dialog-backdrop">
      <div class="confirm-dialog">
        <div class="panel-header">
          <i class="bi bi-exclamation-triangle text-warning"></i> Hapus Data Pegawai
          <button class="btn-close ms-auto" style="font-size:11px" onclick="App.dialog.close('dlgHapus')"></button>
        </div>
        <div class="p-4">
          <p class="mb-0" style="font-size:13px;line-height:1.6">
            Apakah Anda yakin ingin menghapus data pegawai ini? Tindakan ini tidak dapat dibatalkan.
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

  {{-- ── Scripts ───────────────────────────────────────────────── --}}
  <x-slot:scripts>
    <script>
      document.addEventListener('DOMContentLoaded', () => App.tab.show('tab-datagrid'));
    </script>
  </x-slot:scripts>

</x-layouts.app>
