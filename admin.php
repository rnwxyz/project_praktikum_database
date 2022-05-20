<?php
    require 'function.php';
    $delete = $_GET;
    if ($delete != NULL) {
        deleteSiswa($delete['id']);
        deleteGuru($delete['id']);
    }
    $admin = admin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <div class="header">
        <h1><?= "Admin"?></h1>
        
        <br><br>
    </div>
    <!-- Record data -->
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
            <th>Kode Unik</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>

        <?php foreach($admin as $row) : ?>
        <tr>
            <td><?= $row["kodeUnik"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["kodeKelas"] ?></td>
            <td><?= $row["alamat"] ?></td>
            <td><?= $row["telepon"] ?></td>
            <td>
                <a href="admin.php?id=<?= $row['kodeUnik']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br>
    <a href="createData.php">Siswa Baru</a>
    <br>
    <a href="createGuru.php">Guru Baru</a>
    <br>
    <a href="index.php">Logout</a>
</body>