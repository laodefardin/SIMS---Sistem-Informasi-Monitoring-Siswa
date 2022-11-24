<?php
include '../koneksi.php';
session_start();
    // siswa
    $id = $_POST['id'];
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    
    //generate hashing / UBAH DATA NISN KE HASHING PASSWORD
    $password_sha1 = md5(sha1(md5($password)));

    $cek_user = mysqli_num_rows(mysqli_query($koneksi, "SELECT username FROM tb_pengguna WHERE username='$_POST[username]'"));
    if ($cek_user > 0 ){
        $_SESSION['pesan'] = 'Mohon maaf username sudah dipakai gunakan username yg lain';
        $_SESSION['status'] = 'warning';

        if ($level === 'Administrator'){
            echo "<script> document.location.href='./user-administrator';</script>";
            die();
        }elseif($level === 'Wali Kelas'){
            echo "<script> document.location.href='./user-walikelas';</script>";
            die();
        }else{
            echo "<script> document.location.href='./user-orangtua-siswa';</script>";
            die();
        }
    }else{
    $update = "UPDATE tb_pengguna SET full_name='$full_name', email='$email', username='$username', password='$password_sha1' WHERE id = '".$id."' ";

    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));


    if ($level === 'Administrator'){
        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./user-administrator';</script>";
        die();
    }elseif($level === 'Wali Kelas'){
        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./user-walikelas';</script>";
        die();
    }else{
        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./user-orangtua-siswa';</script>";
        die();
    }

    }    