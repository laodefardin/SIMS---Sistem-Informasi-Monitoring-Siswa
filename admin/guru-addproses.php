<?php
include '../koneksi.php';
session_start();
$nik = $_POST['nik'];
$teacher_name = $_POST['teacher_name'];
$subject = $_POST['subject'];
    
    $query = "INSERT INTO tb_guru(nik, teacher_name, subject) VALUES ('$nik','$teacher_name','$subject')";
    $jalan = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./guru';</script>";
    die();
    