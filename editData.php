<?php

    require 'function.php';

    $siswa = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
         JOIN guru g ON s.kodeKelas = g.kodeKelas JOIN login l ON g.NIP = l.NIP");

    $guru = query("SELECT * FROM guru g JOIN login l ON g.NIP = l.NIP");
    $kelas = $guru[0]['kodeKelas'];
    $namaGuru = $guru[0]['nama'];
    $mapel = readMapel($kelas);
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
            <?php foreach($mapel as $eachmapel):?>
                <th><?=$eachmapel['kodeMapel']?></th>
            <?php endforeach ?>
            <td>AVG</td>
        </tr>

        <?php foreach($siswa as $row) : ?>
        <tr>
            <?php 
                $nilai = readNilai($row['NIS']);
                $avg = readAVG($row['NIS']);
            ?>
            <td><?= $row["absen"] ?></td>
            <td><?= $row["nama"] ?></td>
            <?php foreach($nilai as $eachnilai):?>
                <td><?=$eachnilai["AVG"]?></td>
            <?php endforeach ?>
            <td><?= $avg[0]["AVGNilai"] ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>