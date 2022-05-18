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
            NIP IN('$NIP_login') AND password IN ('$pass_login')";

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

function update($data)
{
    global $database;

    $NIS = $data['submit'];
    $absen = $data['absen'];
    $nama = $data['nama'];
    $MTK_tugas = $data["MTK_Tugas"];
    $MTK_quiz = $data["MTK_Quiz"];
    $MTK_uts = $data["MTK_UTS"];
    $MTK_uas = $data["MTK_UAS"];
    $KIM_tugas = $data["KIM_Tugas"];
    $KIM_quiz = $data["KIM_Quiz"];
    $KIM_uts = $data["KIM_UTS"];
    $KIM_uas = $data["KIM_UAS"];
    $FIS_tugas = $data["FIS_Tugas"];
    $FIS_quiz = $data["FIS_Quiz"];
    $FIS_uts = $data["FIS_UTS"];
    $FIS_uas = $data["FIS_UAS"];
    $BIO_tugas = $data["BIO_Tugas"];
    $BIO_quiz = $data["BIO_Quiz"];
    $BIO_uts = $data["BIO_UTS"];
    $BIO_uas = $data["BIO_UAS"];
    
    mysqli_query($database, "UPDATE siswa 
        SET absen = '$absen', nama = '$nama'
        WHERE NIS = $NIS");

    mysqli_query($database, "UPDATE nilai
        SET nilaiTugas = '$MTK_tugas', nilaiQuiz = '$MTK_quiz', nilaiUTS = '$MTK_uts', nilaiUAS = '$MTK_uas'
        WHERE NIS = '$NIS' AND kodeMapel = 'MTK'");
    
    mysqli_query($database, "UPDATE nilai
        SET nilaiTugas = '$KIM_tugas', nilaiQuiz = '$KIM_quiz', nilaiUTS = '$KIM_uts', nilaiUAS = '$KIM_uas'
        WHERE NIS = '$NIS' AND kodeMapel = 'KIM'");

    mysqli_query($database, "UPDATE nilai
        SET nilaiTugas = '$FIS_tugas', nilaiQuiz = '$FIS_quiz', nilaiUTS = '$FIS_uts', nilaiUAS = '$FIS_uas'   
        WHERE NIS = '$NIS' AND kodeMapel = 'FIS'");
    
    mysqli_query($database, "UPDATE nilai
        SET nilaiTugas = '$BIO_tugas', nilaiQuiz = '$BIO_quiz', nilaiUTS = '$BIO_uts', nilaiUAS = '$BIO_uas'
        WHERE NIS = '$NIS' AND kodeMapel = 'BIO'");

    return 1;
}

function sortnilai($data){
    $sortby = $data['sortby'];
    $range1 = $data['range1'];
    $range2 = $data['range2'];
    $tipe = $data['tipe'];

    if ($tipe == 'DESC' || $tipe == NULL) {
        if(($range1 == NULL && $range2 == NULL) && $sortby != 'AVG'){
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN sumnilai sn ON s.NIS = sn.NIS
                WHERE sn.kodeMapel IN('$sortby')
                ORDER BY sn.AVG DESC");
            return $result;
        } else if(($range1 == NULL && $range2 == NULL) && $sortby == 'AVG') {
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN avgnilai an ON s.NIS = an.NIS
                ORDER BY an.AVGNilai DESC");
            return $result;
        } else if(($range1 != NULL || $range2 != NULL) && $sortby != 'AVG'){
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN sumnilai sn ON s.NIS = sn.NIS
                WHERE sn.AVG BETWEEN '$range1' AND '$range2'
                    AND sn.kodeMapel IN('$sortby')
                ORDER BY sn.AVG DESC");
            return $result;
        } else {
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN avgnilai an ON s.NIS = an.NIS
                WHERE an.AVGNilai BETWEEN '$range1' AND '$range2'
                ORDER BY an.AVGNilai DESC");
            return $result;
        }
    } else {
        if(($range1 == NULL && $range2 == NULL) && $sortby != 'AVG'){
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN sumnilai sn ON s.NIS = sn.NIS
                WHERE sn.kodeMapel IN('$sortby')
                ORDER BY sn.AVG ASC");
            return $result;
        } else if(($range1 == NULL && $range2 == NULL) && $sortby == 'AVG') {
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN avgnilai an ON s.NIS = an.NIS
                ORDER BY an.AVGNilai ASC");
            return $result;
        } else if(($range1 != NULL || $range2 != NULL) && $sortby != 'AVG'){
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN sumnilai sn ON s.NIS = sn.NIS
                WHERE sn.AVG BETWEEN '$range1' AND '$range2'
                    AND sn.kodeMapel IN('$sortby')
                ORDER BY sn.AVG ASC");
            return $result;
        } else {
            $result = query("SELECT s.NIS, s.absen, s.nama  FROM siswa s 
                JOIN guru g ON s.kodeKelas = g.kodeKelas 
                JOIN login l ON g.NIP = l.NIP
                JOIN avgnilai an ON s.NIS = an.NIS
                WHERE an.AVGNilai BETWEEN '$range1' AND '$range2'
                ORDER BY an.AVGNilai ASC");
            return $result;
        }
    }
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
