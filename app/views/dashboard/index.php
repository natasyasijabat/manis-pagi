<h1>Dashboard Admin · Halo, <?= e($_SESSION['user']['nama']) ?></h1>
<div class="stats">
  <div class="stat"><b><?= (int)$stats['total'] ?></b><span>Jenis produk</span></div>
  <div class="stat"><b><?= (int)$stats['stok'] ?></b><span>Total stok</span></div>
  <div class="stat"><b><?= rupiah($stats['nilai']) ?></b><span>Nilai persediaan</span></div>
  <div class="stat"><b><?= $users ?></b><span>Pengguna</span></div>
</div>
<div class="row between"><h2 class="sec">Produk terbaru</h2><a class="btn" href="<?= url('product/create') ?>">Tambah menu</a></div>
<div class="table-wrap"><table>
<tr><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th></tr>
<?php foreach ($terbaru as $p): ?>
<tr><td><?= e($p['nama']) ?></td><td><?= e($p['kategori']) ?></td><td><?= rupiah($p['harga']) ?></td><td><?= (int)$p['stok'] ?></td></tr>
<?php endforeach; if (!$terbaru): ?><tr><td colspan="4" class="empty">Belum ada produk.</td></tr><?php endif; ?>
</table></div>
