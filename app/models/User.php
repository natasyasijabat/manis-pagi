<?php
class User {
    private PDO $db;
    public function __construct() { $this->db = Database::conn(); }
    public function all(): array { return $this->db->query("SELECT id,nama,email,role,created_at FROM users ORDER BY id DESC")->fetchAll(); }
    public function find(int $id) { $s = $this->db->prepare("SELECT * FROM users WHERE id=?"); $s->execute([$id]); return $s->fetch(); }
    public function findByEmail(string $e) { $s = $this->db->prepare("SELECT * FROM users WHERE email=?"); $s->execute([$e]); return $s->fetch(); }
    public function create(string $nama, string $email, string $pass, string $role = 'user'): void {
        $hash = password_hash($pass, PASSWORD_BCRYPT);   // BCRYPT
        $this->db->prepare("INSERT INTO users (nama,email,password,role) VALUES (?,?,?,?)")->execute([$nama,$email,$hash,$role]);
    }
    public function update(int $id, string $nama, string $email, string $role, ?string $pass): void {
        if ($pass) {
            $this->db->prepare("UPDATE users SET nama=?,email=?,role=?,password=? WHERE id=?")
                ->execute([$nama,$email,$role,password_hash($pass, PASSWORD_BCRYPT),$id]);
        } else {
            $this->db->prepare("UPDATE users SET nama=?,email=?,role=? WHERE id=?")->execute([$nama,$email,$role,$id]);
        }
    }
    public function delete(int $id): void { $this->db->prepare("DELETE FROM users WHERE id=?")->execute([$id]); }
    public function count(): int { return (int)$this->db->query("SELECT COUNT(*) FROM users")->fetchColumn(); }
}
