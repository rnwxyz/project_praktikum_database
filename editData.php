<?php

    require 'function.php';

    if(isset($_POST["submit"])){
        if (update($_POST) == 1) {
            echo "
                <script>
                    alert('Update Berhasil');
                    document.location.href = 'home.php';
                </script>
            ";
        }
    }
    $nis = $_GET['id'];
    $siswa = query("SELECT NIS, absen, nama FROM siswa WHERE NIS = '$nis'");
    $nilai = query("SELECT NIS, kodeMapel, nilaiTugas, nilaiQuiz, nilaiUTS, nilaiUAS FROM nilai WHERE NIS = '$nis' ORDER BY kodeMapel DESC");
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
<title>editnilai</title>
</head>
<body>
    <div class="header">
        <h1><?= "Kelas : $kelas"?></h1>
        <h2><?= "$namaGuru"?></h2>
    </div>
    <!-- Record data -->
    <h4><a href="home.php">Back</a></h4>
    <form action="" method="POST" autocomplete="off">
        <label for="nama">Nama Siswa : </label>
        <input type="text" name="nama" id="nama" value="<?= $siswa[0]['nama']?>" size="25" required>
        <br><br>
        <label for="absen">Absen Siswa : </label>
        <input type="text" name="absen" id="absen" value="<?= $siswa[0]['absen']?>" size="2" required>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0" >
            <tr>
                <th></th>
                <th>Tugas</th>
                <th>Quiz</th>
                <th>UTS</th>
                <th>UAS</th>
            </tr>

            <?php foreach($nilai as $eachnilai) : ?>
            <tr>
                <td><?= $eachnilai['kodeMapel']?></td>
                <td><input type="text" name="<?= $eachnilai['kodeMapel']?>_Tugas" value="<?= $eachnilai['nilaiTugas']?>" size="3" required></td>
                <td><input type="text" name="<?= $eachnilai['kodeMapel']?>_Quiz" value="<?= $eachnilai['nilaiQuiz']?>" size="3" required></td>
                <td><input type="text" name="<?= $eachnilai['kodeMapel']?>_UTS" value="<?= $eachnilai['nilaiUTS']?>" size="3" required></td>
                <td><input type="text" name="<?= $eachnilai['kodeMapel']?>_UAS" value="<?= $eachnilai['nilaiUAS']?>" size="3" required></td>
            </tr>
        <?php endforeach ?>
        </table>
        <br>
        <button type="submit" name="submit" value="<?= $siswa[0]['NIS']?>">Update</button>
    </form>
</body>
</html>