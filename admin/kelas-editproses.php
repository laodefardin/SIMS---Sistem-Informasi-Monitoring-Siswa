<?php
include '../koneksi.php';
session_start();
    $id = $_POST['id'];
    $sub_class = $_POST['sub_class'];
    $class_name = $_POST['class_name'];
    $wali_name = $_POST['wali_name'];

    $update = "UPDATE tb_kelas SET wali_name='$wali_name', class_name='$class_name', sub_class='$sub_class' WHERE id_kelas = '".$id."' ";

    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));

    $_SESSION['pesan'] = 'Data Berhasil Di Edit';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./kelas';</script>";
    die();
    