<div class="auth">
  <h1>Login Admin</h1>
  <?php if ($error): ?><div class="toast err"><?= e($error) ?></div><?php endif; ?>
  <form method="post" class="form">
    <label>Email<input type="email" name="email" required autofocus></label>
    <label>Password<div class="pw"><input type="password" name="password" required><button type="button" class="eye" data-eye>Lihat</button></div></label>
    <button class="btn">Masuk</button>
  </form>
  <p class="muted">Demo: admin@manispagi.com / admin123</p>
  <p class="muted">Belum punya akun? <a href="<?= url('auth/register') ?>">Daftar di sini</a></p>
</div>
