<?php
include '../koneksi.php';
session_start();
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $teacher_name = $_POST['teacher_name'];
    $subject = $_POST['subject'];

    $update = "UPDATE tb_guru SET nik='$nik', teacher_name='$teacher_name', subject='$subject' WHERE id = '".$id."' ";

    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));

    $_SESSION['pesan'] = 'Data Berhasil Di Edit';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./guru';</script>";
    die();
    