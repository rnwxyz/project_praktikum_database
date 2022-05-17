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
    <ul>
        <form action="" method="POST">
            <li>
                <label for="NIP">NIP : </label>
                <input type="text" name="NIP" id="NIP" required>
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
        </form>
    </ul>
</body>
</html>