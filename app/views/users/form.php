<div class="auth wide">
  <h1><?= $edit ? 'Edit pengguna' : 'Tambah pengguna' ?></h1>
  <?php if ($error): ?><div class="toast err"><?= e($error) ?></div><?php endif; ?>
  <form method="post" class="form">
    <label>Nama<input name="nama" value="<?= e($row['nama']) ?>" required></label>
    <label>Email<input type="email" name="email" value="<?= e($row['email']) ?>" required></label>
    <label>Peran
      <select name="role"><option value="user" <?= $row['role']==='user'?'selected':'' ?>>user</option><option value="admin" <?= $row['role']==='admin'?'selected':'' ?>>admin</option></select></label>
    <label>Password <?= $edit ? '(kosongkan jika tidak diganti)' : '' ?>
      <input type="password" name="password" minlength="6" <?= $edit ? '' : 'required' ?>></label>
    <div class="row"><button class="btn">Simpan</button><a class="btn btn-line" href="<?= url('user/index') ?>">Batal</a></div>
  </form>
</div>
