<?php
// Front controller: semua request lewat sini.  Format: index.php?r=controller/aksi
session_start();
foreach (['core/Database','core/Controller','models/User','models/Product'] as $f) require __DIR__ . "/../app/$f.php";

define('BASE', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));
function url(string $r = ''): string { return BASE . '/index.php?r=' . $r; }
function e($v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function rupiah($n): string { return 'Rp ' . number_format((float)$n, 0, ',', '.'); }

$r = $_GET['r'] ?? 'home/index';
[$c, $a] = array_pad(explode('/', $r), 2, 'index');
if (!preg_match('/^[a-z]+$/', $c) || !preg_match('/^[a-z]+$/', $a)) { http_response_code(404); exit('Halaman tidak ditemukan.'); }
$class = ucfirst($c) . 'Controller';
$file = __DIR__ . "/../app/controllers/$class.php";
if (!is_file($file)) { http_response_code(404); exit('Halaman tidak ditemukan.'); }
require $file;
$obj = new $class;
if (!method_exists($obj, $a)) { http_response_code(404); exit('Halaman tidak ditemukan.'); }
$obj->$a();
