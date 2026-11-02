<?php
class Controller {
    protected function view(string $name, array $data = []): void {
        extract($data);
        require __DIR__ . "/../views/layouts/header.php";
        require __DIR__ . "/../views/$name.php";
        require __DIR__ . "/../views/layouts/footer.php";
    }
    protected function redirect(string $route): void { header('Location: ' . url($route)); exit; }
    protected function requireLogin(): void { if (empty($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') $this->redirect('auth/login'); }
    protected function flash(string $type, string $msg): void { $_SESSION['flash'] = [$type, $msg]; }
    protected function isPost(): bool { return $_SERVER['REQUEST_METHOD'] === 'POST'; }
}
