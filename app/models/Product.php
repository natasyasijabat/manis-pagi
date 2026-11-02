<?php
class Product {
    private PDO $db;
    public function __construct() { $this->db = Database::conn(); }
    public function all(): array { return $this->db->query("SELECT * FROM produk ORDER BY id DESC")->fetchAll(); }
    public function find(int $id) { $s = $this->db->prepare("SELECT * FROM produk WHERE id=?"); $s->execute([$id]); return $s->fetch(); }
    public function create(array $d): void {
        $this->db->prepare("INSERT INTO produk (nama,kategori,harga,stok,deskripsi) VALUES (?,?,?,?,?)")
            ->execute([$d['nama'],$d['kategori'],$d['harga'],$d['stok'],$d['deskripsi']]);
    }
    public function update(int $id, array $d): void {
        $this->db->prepare("UPDATE produk SET nama=?,kategori=?,harga=?,stok=?,deskripsi=? WHERE id=?")
            ->execute([$d['nama'],$d['kategori'],$d['harga'],$d['stok'],$d['deskripsi'],$id]);
    }
    public function delete(int $id): void { $this->db->prepare("DELETE FROM produk WHERE id=?")->execute([$id]); }
    public function stats(): array {
        return $this->db->query("SELECT COUNT(*) total, COALESCE(SUM(stok),0) stok, COALESCE(SUM(harga*stok),0) nilai FROM produk")->fetch();
    }
}
