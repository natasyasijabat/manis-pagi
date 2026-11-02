<?php
class AuthController extends Controller {
    public function login() {
        $error = null;
        if ($this->isPost()) {
            $u = (new User)->findByEmail(trim($_POST['email'] ?? ''));
            if ($u && password_verify($_POST['password'] ?? '', $u['password'])) {
                if ($u['role'] !== 'admin') { $this->view('auth/login', ['title'=>'Masuk','error'=>'Akun ini bukan admin.']); return; }
                $_SESSION['user'] = ['id'=>$u['id'],'nama'=>$u['nama'],'role'=>$u['role']];
                $this->flash('ok', 'Selamat datang, ' . $u['nama'] . '!');
                $this->redirect('dashboard/index');
            }
            $error = 'Email atau password salah.';
        }
        $this->view('auth/login', ['title' => 'Masuk', 'error' => $error]);
    }
    public function register() {
        $error = null; $old = ['nama'=>'','email'=>''];
        if ($this->isPost()) {
            $old = ['nama'=>trim($_POST['nama']), 'email'=>trim($_POST['email'])];
            $pass = $_POST['password'] ?? '';
            if ($old['nama']==='' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $error = 'Nama dan email wajib diisi dengan benar.';
            elseif (strlen($pass) < 6) $error = 'Password minimal 6 karakter.';
            elseif ($pass !== ($_POST['password2'] ?? '')) $error = 'Konfirmasi password tidak sama.';
            elseif ((new User)->findByEmail($old['email'])) $error = 'Email sudah terdaftar.';
            else {
                $m = new User;
                $role = 'user';   // admin hanya dari seed/kelola pengguna
                $m->create($old['nama'], $old['email'], $pass, $role);
                $this->flash('ok', 'Akun dibuat. Silakan masuk.');
                $this->redirect('auth/login');
            }
        }
        $this->view('auth/register', ['title' => 'Daftar', 'error' => $error, 'old' => $old]);
    }
    public function logout() { session_destroy(); session_start(); $this->flash('ok','Kamu sudah keluar.'); $this->redirect('home/index'); }
}
