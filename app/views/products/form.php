<div class="auth wide">
  <h1><?= $edit ? 'Edit produk' : 'Tambah produk' ?></h1>
  <?php if ($error): ?><div class="toast err"><?= e($error) ?></div><?php endif; ?>
  <form method="post" class="form">
    <label>Nama produk<input name="nama" value="<?= e($row['nama']) ?>" required></label>
    <label>Kategori<input name="kategori" value="<?= e($row['kategori']) ?>" required></label>
    <div class="two">
      <label>Harga (Rp)<input type="number" min="0" name="harga" value="<?= e($row['harga']) ?>" required></label>
      <label>Stok<input type="number" min="0" name="stok" value="<?= e($row['stok']) ?>" required></label>
    </div>
    <label>Deskripsi<textarea name="deskripsi" rows="4"><?= e($row['deskripsi']) ?></textarea></label>
    <div class="row"><button class="btn">Simpan</button><a class="btn btn-line" href="<?= url('product/index') ?>">Batal</a></div>
  </form>
</div>
