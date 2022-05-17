<?php

//Koneksi ke database
$database = mysqli_connect("localhost", "root","", "siWali");

function query($query)
{
    global $database;
    $result = mysqli_query($database, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function login($data)
{
    global $database;
    $NIP_login = $data["NIP"];
    $pass_login = $data["password"];

    $query = "SELECT * FROM guru WHERE 
            NIP = '$NIP_login' AND password = '$pass_login'";

    $result = mysqli_query($database, $query);

    if (mysqli_num_rows($result) === 1) {
        $query = "INSERT INTO login(NIP, password) VALUES
            ('$NIP_login', '$pass_login')";

        mysqli_query($database, $query);

        return 1;
    } else {
        return 0;
    }
}

function createSiswa($data){
    global $database;
    $in_absen = $data['absen'];
    $in_nama = $data['nama'];
    $in_kodeKelas = $data['kodeKelas'];

    $query = "INSERT INTO siswa(absen, nama, kodeKelas) VALUES
        ('$in_absen', '$in_nama', '$in_kodeKelas')";

    if (mysqli_query($database, $query)) {
        return 1;
    } else {
        return 0;
    }
}

function readNilai($NIS)
{
    $nilai = query("SELECT * FROM sumnilai WHERE NIS = '$NIS';");
    return $nilai;
}

function readMapel($kodeKelas){
    $mapel = query("SELECT m.kodeMapel FROM matapelajaran m 
        JOIN kelas k ON m.jurusan = k.jurusan
        WHERE k.kodeKelas = '$kodeKelas'");
    return $mapel;
}

function readAVG($NIS)
{
    $AVG = query("SELECT * FROM avgnilai WHERE NIS = '$NIS';");
    return $AVG;
}

function update()
{

}

function delete($absen)
{
    global $database;

    mysqli_query($database, "DELETE FROM siswa WHERE absen = '$absen'");

    return 1;
}

function logout()
{
    global $database;

    mysqli_query($database, "DELETE FROM login WHERE 1");

    return 1;
}
