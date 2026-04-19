/**
 * Enterprise UI — ui.js
 * App utility object untuk layouts/app.blade.php
 * Penggunaan: App.dialog.open('id'), App.toast('Judul','Pesan','success'), dll.
 */
const App = {

  // ── Dialog ──────────────────────────────────────────────────────
  dialog: {
    open(id) {
      document.getElementById(id).classList.add('show');
      const firstInput = document.querySelector(`#${id} input:not([type=checkbox]):not([type=radio])`);
      if (firstInput) setTimeout(() => firstInput.focus(), 150);
    },
    close(id) {
      document.getElementById(id).classList.remove('show');
    }
  },

  // ── Loading Mask ─────────────────────────────────────────────────
  // Penggunaan: App.mask.show() / App.mask.hide()
  //             App.mask.show('customMaskId') untuk mask spesifik
  mask: {
    show(id = 'globalMask') {
      document.getElementById(id).classList.add('show');
    },
    hide(id = 'globalMask') {
      document.getElementById(id).classList.remove('show');
    }
  },

  // ── Toast Notification ───────────────────────────────────────────
  // Penggunaan: App.toast('Judul', 'Pesan deskripsi.', 'success|error|warning|info')
  toast(title, message, type = 'info') {
    const container = document.getElementById('toastContainer');
    const id = 'toast-' + Date.now();

    const icons = {
      success: 'bi-check-circle-fill text-success',
      error:   'bi-x-circle-fill text-danger',
      warning: 'bi-exclamation-triangle-fill text-warning',
      info:    'bi-info-circle-fill text-info',
    };

    container.insertAdjacentHTML('beforeend', `
      <div id="${id}" class="toast">
        <div class="toast-border ${type}"></div>
        <div class="p-3 d-flex align-items-start gap-3">
          <i class="bi ${icons[type] || icons.info} fs-5 flex-shrink-0 lh-1 mt-1"></i>
          <div class="flex-grow-1">
            <div class="fw-bold" style="font-size:13px;">${title}</div>
            <div class="text-muted-ui mt-1" style="font-size:12px;line-height:1.4;">${message}</div>
          </div>
          <button class="btn-close" style="font-size:10px;" onclick="document.getElementById('${id}').remove()"></button>
        </div>
      </div>
    `);

    setTimeout(() => {
      const el = document.getElementById(id);
      if (!el) return;
      el.style.cssText += 'opacity:0;transform:translateX(100%);transition:all 0.3s ease-in;';
      setTimeout(() => el.remove(), 320);
    }, 4000);
  },

  // ── Tabs ─────────────────────────────────────────────────────────
  tab: {
    show(tabId) {
      document.querySelectorAll('.tab-content').forEach(el => {
        el.classList.add('d-none');
        el.classList.remove('d-flex');
      });
      const target = document.getElementById(tabId);
      if (!target) return;
      target.classList.remove('d-none');
      if (target.classList.contains('overflow-hidden')) {
        target.classList.add('d-flex');
      }
      document.querySelectorAll('.tab').forEach(t => {
        t.classList.toggle('active', t.dataset.tab === tabId);
      });
    },
    close(tabId) {
      const header = document.querySelector(`.tab[data-tab="${tabId}"]`);
      if (header) header.style.display = 'none';
      const content = document.getElementById(tabId);
      if (content) { content.classList.add('d-none'); content.classList.remove('d-flex'); }
      const firstVisible = document.querySelector('.tab:not([style*="display: none"])');
      if (firstVisible) App.tab.show(firstVisible.dataset.tab);
    }
  },

  // ── Sidebar ──────────────────────────────────────────────────────
  sidebar: {
    toggle(menuId, element) {
      const sub = document.getElementById(menuId);
      const icon = element.querySelector('[data-toggle-icon]');
      const hidden = sub.classList.toggle('d-none');
      if (icon) icon.style.transform = hidden ? 'rotate(-90deg)' : 'rotate(0deg)';
    },
    select(el) {
      document.querySelectorAll('.tree-node').forEach(n => n.classList.remove('active'));
      el.classList.add('active');
      if (window.innerWidth <= 768) App.sidebar.mobileClose();
    },
    mobileOpen() {
      document.querySelector('aside.panel').classList.add('mobile-open');
      document.getElementById('sidebarBackdrop').classList.add('show');
    },
    mobileClose() {
      document.querySelector('aside.panel').classList.remove('mobile-open');
      document.getElementById('sidebarBackdrop').classList.remove('show');
    }
  },

  // ── Swipe gesture support (mobile sidebar) ───────────────────────
  _swipe: {
    startX: 0,
    init() {
      document.addEventListener('touchstart', e => {
        App._swipe.startX = e.touches[0].clientX;
      }, { passive: true });
      document.addEventListener('touchend', e => {
        const dx = e.changedTouches[0].clientX - App._swipe.startX;
        if (App._swipe.startX < 30 && dx > 60) App.sidebar.mobileOpen();
        if (dx < -60 && document.querySelector('aside.panel.mobile-open')) App.sidebar.mobileClose();
      }, { passive: true });
    }
  },

  // ── Table helpers ─────────────────────────────────────────────────
  table: {
    checkAll(masterCb) {
      document.querySelectorAll('.datagrid tbody input[type=checkbox]').forEach(cb => {
        cb.checked = masterCb.checked;
        cb.closest('tr').classList.toggle('row-selected', masterCb.checked);
      });
    }
  }
};

// DOMContentLoaded — event wiring global
document.addEventListener('DOMContentLoaded', () => {

  // Row click select
  document.querySelectorAll('.datagrid tbody tr').forEach(row => {
    row.addEventListener('click', function (e) {
      if (e.target.closest('button')) return;
      if (e.target.type === 'checkbox') {
        this.classList.toggle('row-selected', e.target.checked);
        return;
      }
      const isSelected = this.classList.contains('row-selected');
      document.querySelectorAll('.datagrid tbody tr').forEach(r => {
        r.classList.remove('row-selected');
        const cb = r.querySelector('input[type=checkbox]');
        if (cb) cb.checked = false;
      });
      if (!isSelected) {
        this.classList.add('row-selected');
        const cb = this.querySelector('input[type=checkbox]');
        if (cb) cb.checked = true;
      }
    });
  });

  // Tutup dialog saat klik backdrop
  document.querySelectorAll('.dialog-backdrop').forEach(backdrop => {
    backdrop.addEventListener('click', function (e) {
      if (e.target === this) this.classList.remove('show');
    });
  });

  // Tutup dialog dengan Escape
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      document.querySelectorAll('.dialog-backdrop.show').forEach(d => d.classList.remove('show'));
      App.sidebar.mobileClose();
    }
  });

  // Inisialisasi swipe gesture untuk mobile
  App._swipe.init();
});
