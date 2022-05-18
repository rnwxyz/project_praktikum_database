<?php

require 'function.php';

logout();

if(isset($_POST["submit"])){
    if (login($_POST) == 1) {
        echo "
            <script>
                alert('Login Berhasil');
                document.location.href = 'home.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Login Gagal !');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

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
    <form action="" method="POST" autocomplete="off">
        <table border="0" cellpadding="5" cellspacing="0" >
            <tr>
                <th><label for="NIP">NIP : </label></th>
                <td>: <input type="text" name="NIP" id="NIP" required></td>
            </tr>
            <tr>
                <th><label for="password">Password : </label></th>
                <td>: <input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <th><button type="submit" name="submit">Login</button></th>
            </tr>
        </table>
    </form>
</body>
</html>