<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];
$hapussiswa = "DELETE FROM tb_siswa WHERE id  = '$id'";
$hapuswali = "DELETE FROM tb_wali WHERE student_id  = '$id'";
$hapususer = "DELETE FROM tb_pengguna WHERE student_id = '$id'";

$proses1 = $koneksi->query($hapussiswa);
$proses2 = $koneksi->query($hapuswali);
$proses3 = $koneksi->query($hapususer);
$_SESSION['pesan'] = 'Data Berhasil Di Hapus';
$_SESSION['status'] = 'success';
echo "<script> document.location.href='./siswa';</script>";
die();
