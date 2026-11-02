<?php
class UserController extends Controller {
    private function guard() { $this->requireLogin(); if ($_SESSION['user']['role'] !== 'admin') { $this->flash('err','Hanya admin yang boleh mengelola pengguna.'); $this->redirect('dashboard/index'); } }
    public function index() { $this->guard(); $this->view('users/index', ['title'=>'Pengguna','rows'=>(new User)->all()]); }
    public function create() {
        $this->guard(); $error = null; $row = ['nama'=>'','email'=>'','role'=>'user'];
        if ($this->isPost()) {
            $row = ['nama'=>trim($_POST['nama']),'email'=>trim($_POST['email']),'role'=>$_POST['role']];
            if ($row['nama']==='' || !filter_var($row['email'],FILTER_VALIDATE_EMAIL) || strlen($_POST['password'])<6) $error = 'Isi nama, email valid, dan password minimal 6 karakter.';
            elseif ((new User)->findByEmail($row['email'])) $error = 'Email sudah terdaftar.';
            else { (new User)->create($row['nama'],$row['email'],$_POST['password'],$row['role']); $this->flash('ok','Pengguna ditambahkan.'); $this->redirect('user/index'); }
        }
        $this->view('users/form', ['title'=>'Tambah Pengguna','row'=>$row,'error'=>$error,'edit'=>false]);
    }
    public function edit() {
        $this->guard(); $id = (int)($_GET['id'] ?? 0); $row = (new User)->find($id); $error = null;
        if (!$row) $this->redirect('user/index');
        if ($this->isPost()) {
            $row = array_merge($row, ['nama'=>trim($_POST['nama']),'email'=>trim($_POST['email']),'role'=>$_POST['role']]);
            $pass = $_POST['password'] ?: null;
            if ($row['nama']==='' || !filter_var($row['email'],FILTER_VALIDATE_EMAIL) || ($pass && strlen($pass)<6)) $error = 'Data tidak valid. Password baru minimal 6 karakter.';
            else { (new User)->update($id,$row['nama'],$row['email'],$row['role'],$pass); $this->flash('ok','Pengguna diperbarui.'); $this->redirect('user/index'); }
        }
        $this->view('users/form', ['title'=>'Edit Pengguna','row'=>$row,'error'=>$error,'edit'=>true]);
    }
    public function delete() {
        $this->guard(); $id = (int)($_POST['id'] ?? 0);
        if ($this->isPost() && $id !== (int)$_SESSION['user']['id']) { (new User)->delete($id); $this->flash('ok','Pengguna dihapus.'); }
        else $this->flash('err','Akun yang sedang dipakai tidak bisa dihapus.');
        $this->redirect('user/index');
    }
}
