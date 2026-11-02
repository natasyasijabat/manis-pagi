<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title ?? 'Manis Pagi Bakery') ?> · Manis Pagi Bakery</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE ?>/css/style.css">
</head>
<body>
<header class="nav">
  <a class="brand" href="<?= url('home/index') ?>">manis<span>pagi</span></a>
  <button class="burger" aria-label="Menu" onclick="document.body.classList.toggle('menu-open')">☰</button>
  <nav>
  <?php if (!empty($_SESSION['user'])): ?>
    <a href="<?= url('dashboard/index') ?>">Dashboard</a>
    <a href="<?= url('product/index') ?>">Produk</a>
    <?php if ($_SESSION['user']['role']==='admin'): ?><a href="<?= url('user/index') ?>">Pengguna</a><?php endif; ?>
    <span class="who"><?= e($_SESSION['user']['nama']) ?></span>
    <a class="btn btn-line" href="<?= url('auth/logout') ?>">Keluar</a>
  <?php else: ?>
    <a href="<?= url('auth/login') ?>">Masuk</a>
    <a class="btn" href="<?= url('auth/register') ?>">Daftar</a>
  <?php endif; ?>
  </nav>
</header>
<main class="wrap">
<?php if (!empty($_SESSION['flash'])): [$t,$m] = $_SESSION['flash']; unset($_SESSION['flash']); ?>
  <div class="toast <?= $t ?>"><?= e($m) ?></div>
<?php endif; ?>
