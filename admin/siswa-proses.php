<?php
include '../koneksi.php';
session_start();
    // siswa
    $id = $_POST['id'];
    $nisn = $_POST['nisn'];
    $std_name = $_POST['std_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    

    $sub_class = $_POST['sub_class'];
    $class_id = $_POST['class_name'];
    
    $parent_name = $_POST['parent_name'];
    $phone_numberwali = $_POST['phone_numberwali'];

    $update = "UPDATE tb_siswa SET nisn='$nisn', std_name='$std_name', address='$address', phone_number='$phone_number', class_id='$class_id' WHERE id = '".$id."' ";
    $update1 = "UPDATE tb_wali SET parent_name='$parent_name', phone_numberwali='$phone_numberwali' WHERE student_id = '".$id."' ";

    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $sql = mysqli_query($koneksi, $update1) or die(mysqli_error($koneksi));

    $_SESSION['pesan'] = 'Data Berhasil Di Edit';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./siswa';</script>";
    die();
    