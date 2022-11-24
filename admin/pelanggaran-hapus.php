<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
$id = $_GET['id'];

$query = $koneksi->query("SELECT * FROM tb_pelanggaran WHERE id_pelanggaran = '$id' ");
        $data = mysqli_fetch_array($query);
        $lokasi = $data['foto'];
        $hapus_gbr = "./pelanggaran_img/".$lokasi;
        unlink($hapus_gbr);
        
$hapus = "DELETE FROM tb_pelanggaran WHERE id_pelanggaran  = '$id'";

$proses1 = $koneksi->query($hapus);
$_SESSION['pesan'] = 'Data Berhasil Di Hapus';
$_SESSION['status'] = 'success';
echo "<script> document.location.href='./pelanggaran';</script>";
die();
