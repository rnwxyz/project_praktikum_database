<?php

require 'function.php';

if(isset($_POST["submit"])){
    if (createGuru($_POST) == 1) {
        echo "
            <script>
                alert('Akun Berhasil Dibuat');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Password tidak valid');
            </script>
        ";
    }
}

$admin = readAdmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Si Wali (Sistem Wali Kelas)</title>
</head>
<body>
    <div class="header">
        <h1>SI-WALI</h1>
        <h2>Sistem Wali Kelas</h2>
    </div>
    <?php if ($admin != NULL):?>
        <h4><a href="admin.php">Back</a></h4>
    <?php endif ?>
    <form action="" method="POST" autocomplete="off">
        <table border="0" cellpadding="5" cellspacing="0" >
            <tr>
                <th><label for="NIP">NIP </label></th>
                <td>: <input type="text" name="NIP" id="NIP" required></td>
            </tr>
            <tr>
                <th><label for="nama">Nama </label></th>
                <td>: <input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <th><label for="kodeKelas">Kelas </label></th>
                <td>: <select name="kodeKelas" id="kodeKelas">
                        <option value="MIPA1">MIPA1</option>
                        <option value="MIPA2">MIPA2</option>
                        <option value="MIPA3">MIPA3</option>
                        <option value="IIS1">IIS1</option>
                        <option value="IIS2">IIS2</option>
                        <option value="IIS3">IIS3</option>
                        <option value="IBB1">IBB1</option>
                        <option value="IBB2">IBB2</option>
                        <option value="IBB3">IBB3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="alamat">Alamat </label></th>
                <td>: <input type="text" name="alamat" id="alamat" required></td>
            </tr>
            <tr>
                <th><label for="telepon">No Telepon </label></th>
                <td>: <input type="text" name="telepon" id="telepon" required></td>
            </tr>
            <tr>
                <th><label for="password">Password </label></th>
                <td>: <input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <th><label for="validation">Konfirmasi Password </label></th>
                <td>: <input type="password" name="validation" id="validation" required></td>
            </tr>
            <tr>
                <th><button type="submit" name="submit">Buat Akun</button></th>
            </tr>
        </table>
    </form>
    <?php if ($admin == NULL):?>
        <form action="index.php">
            <th><button type="submit" name="login">Login</button></th>
        </form>
    <?php endif ?>
</body>
</html>