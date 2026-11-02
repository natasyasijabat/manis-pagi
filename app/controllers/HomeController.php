<?php
class HomeController extends Controller {
    public function index() { $this->view('home/index', ['title' => 'Beranda', 'produk' => array_slice((new Product)->all(), 0, 6)]); }
}
