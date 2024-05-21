<?php 
$koneksi = new mysqli('localhost','root','123','pengeluaran_uang');

if (!$koneksi) {
    die("Koneksi dengan database gagal!");
}
?>