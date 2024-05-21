<?php 
include('./koneksi.php');

$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];
$pengeluaran = $_POST['pengeluaran'];

$simpanData = $koneksi->query("INSERT INTO db_uang(`Tanggal`,`Deskripsi`,`Pengeluaran`) VALUES ('$tanggal','$deskripsi','$pengeluaran')");

if ($simpanData) {
    header('Location: index.php');
    exit();
} else {
    echo "Gagal menyimpan data pengeluaran";
}
?>