// 1. Konfirmasi sebelum hapus
document.querySelectorAll('form[data-confirm]').forEach(f =>
  f.addEventListener('submit', e => { if (!confirm(f.dataset.confirm)) e.preventDefault(); }));

// 2. Pencarian produk langsung di tabel
const s = document.getElementById('search');
if (s) s.addEventListener('input', () => {
  const q = s.value.toLowerCase();
  document.querySelectorAll('#tbl tr:not(:first-child)').forEach(tr =>
    tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none');
});

// 3. Tombol lihat/sembunyikan password
document.querySelectorAll('[data-eye]').forEach(b => b.addEventListener('click', () => {
  const i = b.previousElementSibling; const show = i.type === 'password';
  i.type = show ? 'text' : 'password'; b.textContent = show ? 'Sembunyi' : 'Lihat';
}));

// 4. Indikator kekuatan password
const pw = document.getElementById('pw1'), m = document.getElementById('meter');
if (pw && m) pw.addEventListener('input', () => {
  const v = pw.value; let n = 0;
  if (v.length >= 6) n++; if (v.length >= 10) n++; if (/[A-Z]/.test(v) && /[a-z]/.test(v)) n++; if (/\d/.test(v) && /\W/.test(v)) n++;
  m.style.width = (n * 25) + '%'; m.style.background = ['#b3392f','#b3392f','#f6c667','#a9581a','#a9581a'][n];
});

// 5. Notifikasi sukses hilang otomatis
document.querySelectorAll('.toast.ok').forEach(t => setTimeout(() => { t.style.opacity = 0; setTimeout(() => t.remove(), 400); }, 3500));
