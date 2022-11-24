<?php
include '../koneksi.php';
session_start();
    $sub_class = $_POST['sub_class'];
    $class_name = $_POST['class_name'];
    $wali_name = $_POST['wali_name'];
    
    $query = "INSERT INTO tb_kelas(wali_name, class_name, sub_class) VALUES ('$wali_name','$class_name','$sub_class')";
    $jalan = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    // $sql = "SELECT * FROM tb_guru WHERE id = '$wali_name' ";
    // $result = $koneksi->query($sql);
    // $data = mysqli_fetch_assoc($result);
    // $namawali = $data['teacher_name'];

    // $password_sha1 = md5(sha1(md5($namawali)));

    // $query_user = "INSERT INTO tb_pengguna (student_id, full_name, username, password, level) VALUES ('$wali_name','$namawali','$namawali','$password_sha1','Wali Kelas')";
    // $jalan2 = mysqli_query($koneksi, $query_user) or die(mysqli_error($koneksi));

    $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./kelas';</script>";
    die();
    