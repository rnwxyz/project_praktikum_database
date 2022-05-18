<?php

    require 'function.php';

    if(isset($_POST["sort"])){
        $siswa = sortnilai($_POST);
    } else {
        $siswa = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
            JOIN guru g ON s.kodeKelas = g.kodeKelas JOIN login l ON g.NIP = l.NIP
            ORDER BY s.NIS");
    }

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
    <title>nilai</title>
</head>
<body>
    <div class="header">
        <h1><?= "Kelas : $kelas"?></h1>
        <h2><?= "$namaGuru"?></h2>
        <a href="home.php">Home</a>  |  <a href="nilai.php">Nilai</a>
        <br><br>
    </div>
    <div class="sortBy">
        <form action="" method="post" autocomplete="off">

            <label for="sortby">Sort Nilai By </label>
            <select name="sortby" id="sortby" >
                <?php foreach($mapel as $eachmapel): ?>
                    <option value="<?=$eachmapel['kodeMapel']?>"><?=$eachmapel['kodeMapel']?></option>
                <?php endforeach ?>
                <option value="AVG">AVG</option>
            </select>

            <label for="range">Range </label>
            <input type="text" name="range1" id="range"> <label for="to">to </label> <input type="text" name="range2" id="to">
            <br>
            <input type="radio" id="desc" name="tipe" value="DESC" checked>
            <label for="desc">DESC</label>
            <input type="radio" id="asc" name="tipe" value="ASC">
            <label for="asc">ASC</label>
            <br><br>
            <button type="submit" name="sort">sort</button>
        </form>
    </div>
    <br><br>
    <!-- Record data -->
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
            <th>No Absen</th>
            <th>Nama</th>
            <?php foreach($mapel as $eachmapel):?>
                <th><?=$eachmapel['kodeMapel']?></th>
            <?php endforeach ?>
            <th>AVG</th>
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
    <br>
    <a href="createData.php">Input Siswa Baru</a>
</body>
</html>