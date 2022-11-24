<?php
include '../koneksi.php';
session_start();
    
    $wali_name = $_POST['wali_name'];
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
            echo "<script> document.location.href='./user-walikelas';</script>";
    }else{

      $sql = "SELECT * FROM tb_guru WHERE id = '$wali_name'";
      $result = $koneksi->query($sql);
      $data = mysqli_fetch_assoc($result);
      $full_name = $data["teacher_name"];

        $query_user = "INSERT INTO tb_pengguna(student_id, full_name, email, username, password, level, foto) VALUES      
        ('$wali_name','$full_name','$email','$username','$password_sha1','$level','')";
    
        $sql = mysqli_query($koneksi, $query_user) or die(mysqli_error($koneksi));
            $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
            $_SESSION['status'] = 'success';
            echo "<script> document.location.href='./user-walikelas';</script>";        
    }