<?php

    require 'function.php';

    //Menu Delete
    $delete = $_GET;
    if ($delete != NULL) {
        delete((int)$delete['id']);
    }

    $siswa = query("SELECT s.NIS, s.absen, s.nama FROM siswa s 
    JOIN guru g ON s.kodeKelas = g.kodeKelas JOIN login l ON g.NIP = l.NIP");

    $guru = query("SELECT * FROM guru g JOIN login l ON g.NIP = l.NIP");
    $kelas = $guru[0]['kodeKelas'];
    $namaGuru = $guru[0]['nama'];
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
        <h1><?= "Kelas : $kelas"?></h1>
        <h2><?= "$namaGuru"?></h2>
        <a href="home.php">Home</a>  |  <a href="nilai.php">Nilai</a>
        <br><br>
    </div>
    <!-- Record data -->
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
            <th>No Absen</th>
            <th>Nama</th>
            <th>Menu</th>
        </tr>

        <?php foreach($siswa as $row) : ?>
        <tr>
            <td><?= $row["absen"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td>
                <a href="editData.php?id=<?= $row['NIS']; ?>">Edit</a> | <a href="home.php?id=<?= $row['absen']; ?>">Delete</a> | <a href="rincianNilai.php?id=<?= $row['absen']; ?>">Rician</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br>
    <a href="createData.php">Input Siswa Baru</a>
</body>
</html>