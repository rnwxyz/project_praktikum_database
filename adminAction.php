<?php

    require 'function.php';

    $id = $_GET['id'];
    $category = getCategory($id);
    if ($category == 1){
        $guru = readGuruSingle($id);
        $NIP = $guru[0]['NIP'];
        $nama = $guru[0]['nama'];
        $kodeKelas = $guru[0]['kodeKelas'];
        $alamat = $guru[0]['alamat'];
        $telepon = $guru[0]['telepon'];
        $password  = $guru[0]['password'];
        if(isset($_POST["submit"])){
            if (updateGuru($_POST) == 1) {
                echo "
                    <script>
                        alert('Data Guru Berhasil Diupdate');
                        document.location.href = 'admin.php';
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
    } else {
        $siswa = readSiswaSingle($id);
        $NIS = $siswa[0]['NIS'];
        $nama = $siswa[0]['nama'];
        $kodeKelas = $siswa[0]['kodeKelas'];
        $alamat = $siswa[0]['alamat'];
        $telepon = $siswa[0]['telepon'];
    }

    $admin = readAdmin();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Style CSS-->
    <link rel="stylesheet" href="style/header_style.css">

    <title>adminsiwali</title>
    </head>
    <body>
        <!-- header -->
        <div class="container bg-light">
            <div class="header">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="kelas container">
                            <div class="kode container">
                                <h1 class="navbar-brand" style="color: #2381B7;font-style: normal;font-weight: 900;font-size: 50px;line-height: 73px;display: flex;align-items: center;">Selamat Datang Admin<br>SI WALI</h1>
                            </div>
                        </div>   
                        <div class="gambar1 navbar-brand" >
                            <img src="asset/img/logosiwali.png" alt="logosiwali" height="120em">
                        </div>
                        <div class="gambar2 navbar-brand" >
                            <img src="asset/img/logosma1.png" alt="logosiwali" height="120em">
                        </div>
                    </div>
                </nav>
                <div class="text-end">
                    <div class="pe-5">
                        <div class="mb-3">
                            <a href="index.php"><button type="button" class="btn btn-warning">Logout</button></a>
                        </div>
                        <div class="pt-3 d-inline">
                            <a href="createData.php"><button type="button" class="btn btn-success">Tambah Siswa</button></a>
                        </div>
                        <div class="pt-3 d-inline">
                            <a href="createGuru.php"><button type="button" class="btn btn-success">Tambah Guru</button></a>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs mt-4">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.php">Kembali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="nilai.php">Edit Data</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end header -->

        <?php if($category == 1): ?>
            <div class="container bg-white" style="height: 24em;" >
                <div class="form text-center">
                    <form action="" method="POST" autocomplete="off" style="max-width: 600px;margin:auto" >
                        <div class="row g-2">
                            <div class="col-sm me-5">

                                <input type="text" name="id" value="<?=$id?>" hidden>

                                <label class="sr-only" for="NIP" ></label>
                                <input class="form-control form-control-sm" type="text" name="NIP" id="NIP" placeholder="NIP" value="<?= $NIP ?>" required autofocus>
            
                                <label class="sr-only" for="nama" ></label>
                                <input class="form-control form-control-sm" type="text" name="nama" id="nama" placeholder="Nama" value="<?= $nama ?>" required autofocus>
            
                                <label class="sr-only" for="alamat" ></label>
                                <input class="form-control form-control-sm" type="text" name="alamat" id="alamat" placeholder="Alamat" value="<?= $alamat ?>" required autofocus>
            
                                <label class="sr-only" for="telepon" ></label>
                                <input class="form-control form-control-sm" type="text" name="telepon" id="telepon" placeholder="No Telepon" value="<?= $telepon ?>" required autofocus>
                            </div>
                            <div class="col-sm">
                                <select class="form-select form-select-sm mt-4" aria-label=".form-select-sm example" name="kodeKelas">
                                    <option selected value="<?= $kodeKelas ?>">Default</option>
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
            
                                <label class="sr-only" for="password" ></label>
                                <input class="form-control form-control-sm" type="password" name="password" id="password" placeholder="password" value="<?= $password ?>" required autofocus>
            
                                <label class="sr-only" for="validation" ></label>
                                <input class="form-control form-control-sm" type="password" name="validation" id="validation" placeholder="Konfirmasi Password" value="<?= $password ?>" required autofocus>
            
                                <div class="mt-4 text-start">
                                    <button class="btn btn-lg btn-primary btn-sm" name="submit">Update</button> 
                                </div>
                            </div>
                        </div>
                    </form>
    
                    <!-- Logic Login or Back -->
                    <?php if ($admin == NULL):?>
                        <form action="index.php" autocomplete="off" style="max-width: 250px;margin:auto">
                            <div class="mt-3 text-start">
                                <button class="btn btn-lg btn-secondary btn-sm">Login</button> 
                            </div>
                        </form>
                    <?php endif ?>
                </div>
            </div>
        <?php else: ?>
        
        <?php endif ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
</html>