<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
$id = $_GET['id'];

$sql = "SELECT * FROM tb_pengguna WHERE id = '$id'";
$result = $koneksi->query($sql);
$data = mysqli_fetch_array($result);
$level = $data['level'];

// $lokasi = $data['foto'];
if(empty($data['foto'])){
    $hapus = "DELETE FROM tb_pengguna WHERE id  = '$id'";
    $proses1 = $koneksi->query($hapus);
    
    if ($level == 'Administrator'){
        $_SESSION['pesan'] = 'Data Berhasil Di Hapus';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./user-administrator';</script>";
        die();
    }elseif($level == 'Wali Kelas'){
        $_SESSION['pesan'] = 'Data Berhasil Di Hapus';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./user-walikelas';</script>";
        die();
    }else{
        $_SESSION['pesan'] = 'Data Berhasil Di Hapus';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./user-orangtua-siswa';</script>";
        die();
    }

}else{
    $hapus_gbr = "../img/user/".$lokasi;
    unlink($hapus_gbr);
    
$hapus = "DELETE FROM tb_pengguna WHERE id  = '$id'";

$proses1 = $koneksi->query($hapus);

if ($level == 'Administrator'){
    $_SESSION['pesan'] = 'Data Berhasil Di Hapus';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./user-administrator';</script>";
    die();
}elseif($level == 'Wali Kelas'){
    $_SESSION['pesan'] = 'Data Berhasil Di Hapus';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./user-walikelas';</script>";
    die();
}else{
    $_SESSION['pesan'] = 'Data Berhasil Di Hapus';
    $_SESSION['status'] = 'success';
    echo "<script> document.location.href='./user-orangtua-siswa';</script>";
    die();
}
}
        