<div class="row between"><h1>Menu Roti &amp; Kue</h1><a class="btn" href="<?= url('product/create') ?>">Tambah menu</a></div>
<input class="search" id="search" placeholder="Cari roti atau kategori…" aria-label="Cari produk">
<div class="table-wrap"><table id="tbl">
<tr><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th></th></tr>
<?php foreach ($rows as $p): ?>
<tr>
  <td><?= e($p['nama']) ?></td><td><?= e($p['kategori']) ?></td><td><?= rupiah($p['harga']) ?></td>
  <td><span class="pill <?= $p['stok'] < 10 ? 'low' : '' ?>"><?= (int)$p['stok'] ?></span></td>
  <td class="act">
    <a href="<?= url('product/edit&id='.$p['id']) ?>">Edit</a>
    <form method="post" action="<?= url('product/delete') ?>" data-confirm="Hapus produk <?= e($p['nama']) ?>?">
      <input type="hidden" name="id" value="<?= $p['id'] ?>"><button class="link-danger">Hapus</button></form>
  </td>
</tr>
<?php endforeach; if (!$rows): ?><tr><td colspan="5" class="empty">Belum ada produk. Klik “Tambah menu”.</td></tr><?php endif; ?>
</table></div>
