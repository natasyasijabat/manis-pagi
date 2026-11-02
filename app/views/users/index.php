<div class="row between"><h1>Pengguna</h1><a class="btn" href="<?= url('user/create') ?>">Tambah pengguna</a></div>
<div class="table-wrap"><table>
<tr><th>Nama</th><th>Email</th><th>Peran</th><th>Bergabung</th><th></th></tr>
<?php foreach ($rows as $u): ?>
<tr>
  <td><?= e($u['nama']) ?></td><td><?= e($u['email']) ?></td>
  <td><span class="pill <?= $u['role']==='admin' ? 'admin' : '' ?>"><?= e($u['role']) ?></span></td>
  <td><?= e(date('d M Y', strtotime($u['created_at']))) ?></td>
  <td class="act">
    <a href="<?= url('user/edit&id='.$u['id']) ?>">Edit</a>
    <form method="post" action="<?= url('user/delete') ?>" data-confirm="Hapus pengguna <?= e($u['nama']) ?>?">
      <input type="hidden" name="id" value="<?= $u['id'] ?>"><button class="link-danger">Hapus</button></form>
  </td>
</tr>
<?php endforeach; ?>
</table></div>
