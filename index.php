<?php 
include_once('./koneksi.php');

$dariTanggal = (isset($_POST['dariTanggal']) ? $_POST['dariTanggal'] : "");
$sampaiTanggal = (isset($_POST['sampaiTanggal']) ? $_POST['sampaiTanggal'] : "");

if (!empty($dariTanggal) && !empty($sampaiTanggal)) {
    $sql = "SELECT * FROM db_uang  WHERE `Tanggal` >= '$dariTanggal' && `Tanggal` <= '$sampaiTanggal'";
    $dataPengeluaran = $koneksi->query($sql);
    $data = $dataPengeluaran->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: aliceblue;
            display: block;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        table {
          display: flex;
          justify-content: center;
          align-items: center;
          
        }
    </style>
</head>

<body>
    <h1>Catatan pengeluaran</h1>
    <br>
    <form class="form" action="./handler_pengeluaran.php" method="post" >
        <input type="date" name="tanggal">
        <input type="number" name="pengeluaran" id="" placeholder="Total pengeluaran...">
        <br>
        <textarea type="text" name="deskripsi" id="" placeholder="Deskripsi pengeluaran"></textarea>
        <br>
        <button type="submit">Add</button>
    </form>
    <br>
    <hr>
    <br>
    <form action="./index.php" method="post">
        <input type="date" name="dariTanggal">
        <input type="date" name="sampaiTanggal">
        <button type="submit">Tampilkan</button>
    </form>
    <h3>Data pengeluaran</h3>
    <form action=""></form>
    <table border="2px" style="text-align: center;">
        <tr>
            <th>Tanggal</th>
            <th>Total Pengeluaran</th>
            <th>Deskripsi</th>
        </tr>
        <?php if(!empty($data)): ?>
        <?php foreach ($data as $pengeluaran): ?>
        <tr class=>
            <td><?= $pengeluaran['Tanggal'] ?></td>
            <td><?= $pengeluaran['Pengeluaran'] ?></td>
            <td><?= $pengeluaran['Deskripsi'] ?></td>
        </tr>
        <?php endforeach ?>
        <?php endif ?>
        <?php if(empty($data)): ?>
        <tr>
            <td colspan="3">Tidak ada data dalam jangka waktu <?= $dariTanggal ?> sampai <?= $sampaiTanggal ?></td>
        </tr>
        <?php endif ?>
    </table>
</body>

</html>