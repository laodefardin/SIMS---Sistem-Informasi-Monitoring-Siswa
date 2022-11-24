<?php
include '../koneksi.php';
session_start();
    // siswa
    $nisn = $_POST['nisn'];
    $std_name = $_POST['std_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    

    $sub_class = $_POST['sub_class'];
    $class_id = $_POST['class_name'];
    
    $parent_name = $_POST['parent_name'];
    $phone_numberwali = $_POST['phone_numberwali'];

    // melakukan pengecekan validasi pada nisn, karna nisn siswa tidak boleh sama
    $cek_nisn = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nisn = '$nisn' "));
    if ($cek_nisn > 0 ) {
        $_SESSION['pesan'] = 'Mohon maaf Nisn sudah diinput, gunakan NISN yang lain';
        $_SESSION['status'] = 'warning';
        echo "<script> document.location.href='./siswa-add';</script>";
    }else{
    // MEMBUAT DATA BARU DI TABEL SISWA
    $query_siswa = "INSERT INTO tb_siswa(nisn, std_name, class_id, address, phone_number) VALUES ('$nisn','$std_name','$class_id','$address','$phone_number')";
    $jalan = mysqli_query($koneksi, $query_siswa) or die(mysqli_error($koneksi));

    // SETELAH DATA BARU DI TABEL SISWA DIBUAT AMBIL ID SISWA DARI NISN SISWA YANG DIBUAT
    $sql = "SELECT * FROM tb_siswa WHERE nisn = '$nisn'";
    $result = $koneksi->query($sql);
    $data = mysqli_fetch_assoc($result);
    $student_id = $data["id"];


    //generate hashing / UBAH DATA NISN KE HASHING PASSWORD
    $password_sha1 = md5(sha1(md5($nisn)));
    // SETELAH INSERT SISWA DIBUAT, KEMUDIAN BUAT AKUN LOGIN USERNAME DAN PASSWORD UNTUK LOGIN ORANG TUA SISWA 
    // username dan password adalah nisn siswa
    $query_user = "INSERT INTO tb_pengguna(student_id, full_name, email, username, password, level, foto) VALUES ('$student_id','$parent_name','','$nisn','$password_sha1','Orang Tua Wali','')";
    $sqlUSER = mysqli_query($koneksi, $query_user) or die(mysqli_error($koneksi));
    
    
    // KEMUDIAN INSERT DATA WALI ORANG TUA SISWA DENGAN MENGAMBIL ID YANG TELAH DIBUAT
    $query_waliortu = "INSERT INTO tb_wali(student_id, parent_name, phone_numberwali) VALUES ('$student_id','$parent_name','$phone_numberwali')";  
    $sqljalan = mysqli_query($koneksi, $query_waliortu) or die(mysqli_error($koneksi));

    $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./siswa';</script>";
    die();
    
    }