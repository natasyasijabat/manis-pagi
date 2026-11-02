<?php
class ProductController extends Controller {
    private function input(): array {
        return ['nama'=>trim($_POST['nama']),'kategori'=>trim($_POST['kategori']),'harga'=>max(0,(int)$_POST['harga']),'stok'=>max(0,(int)$_POST['stok']),'deskripsi'=>trim($_POST['deskripsi'])];
    }
    public function index() { $this->requireLogin(); $this->view('products/index', ['title'=>'Produk','rows'=>(new Product)->all()]); }
    public function create() {
        $this->requireLogin(); $error = null; $row = ['nama'=>'','kategori'=>'','harga'=>'','stok'=>'','deskripsi'=>''];
        if ($this->isPost()) {
            $row = $this->input();
            if ($row['nama']==='' || $row['kategori']==='') $error = 'Nama dan kategori wajib diisi.';
            else { (new Product)->create($row); $this->flash('ok','Produk ditambahkan.'); $this->redirect('product/index'); }
        }
        $this->view('products/form', ['title'=>'Tambah Produk','row'=>$row,'error'=>$error,'edit'=>false]);
    }
    public function edit() {
        $this->requireLogin(); $id = (int)($_GET['id'] ?? 0); $row = (new Product)->find($id); $error = null;
        if (!$row) $this->redirect('product/index');
        if ($this->isPost()) {
            $row = array_merge($row, $this->input());
            if ($row['nama']==='' || $row['kategori']==='') $error = 'Nama dan kategori wajib diisi.';
            else { (new Product)->update($id,$row); $this->flash('ok','Produk diperbarui.'); $this->redirect('product/index'); }
        }
        $this->view('products/form', ['title'=>'Edit Produk','row'=>$row,'error'=>$error,'edit'=>true]);
    }
    public function delete() {
        $this->requireLogin();
        if ($this->isPost()) { (new Product)->delete((int)$_POST['id']); $this->flash('ok','Produk dihapus.'); }
        $this->redirect('product/index');
    }
}
