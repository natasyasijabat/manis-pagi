<div class="auth">
  <h1>Buat akun</h1>
  <?php if ($error): ?><div class="toast err"><?= e($error) ?></div><?php endif; ?>
  <form method="post" class="form">
    <label>Nama lengkap<input name="nama" value="<?= e($old['nama']) ?>" required></label>
    <label>Email<input type="email" name="email" value="<?= e($old['email']) ?>" required></label>
    <label>Password<div class="pw"><input type="password" name="password" minlength="6" required id="pw1"><button type="button" class="eye" data-eye>Lihat</button></div>
      <div class="meter"><i id="meter"></i></div></label>
    <label>Ulangi password<input type="password" name="password2" required></label>
    <button class="btn">Daftar</button>
  </form>
  <p class="muted">Sudah punya akun? <a href="<?= url('auth/login') ?>">Masuk</a></p>
</div>
