<?php
include '../koneksi.php';
session_start(); 
    $id = $_POST['id'];
    $sub_class = $_POST['sub_class'];
    $class_id = $_POST['class_id'];
    $student_id = $_POST['student_id'];
    $pelanggaran = $_POST['pelanggaran'];
    $note = $_POST['note'];
    $reported_on = $_POST['reported_on'];

    $img = $_FILES['foto']['name'];
    $gambar_baru = date('dYHiS').$img;

    if(empty($img)){
        $update = "UPDATE tb_pelanggaran SET student_id ='$student_id', class_id='$class_id', pelanggaran='$pelanggaran', note='$note', reported_on='$reported_on' WHERE id_pelanggaran = '".$id."' ";

        $sql = mysqli_query($koneksi, $update);

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./pelanggaran-edit?id=$id';</script>";
        die();  

    }else{
        $query = $koneksi->query("SELECT * FROM tb_pelanggaran WHERE id_pelanggaran = '$id' ");
        $data = mysqli_fetch_array($query);
        $lokasi = $data['foto'];
        $hapus_gbr = "./pelanggaran_img/".$lokasi;
        unlink($hapus_gbr);

        move_uploaded_file($_FILES['foto']['tmp_name'], './pelanggaran_img/'.$gambar_baru);

        $update = "UPDATE tb_pelanggaran SET student_id ='$student_id', class_id='$class_id', pelanggaran='$pelanggaran', note='$note', reported_on='$reported_on', foto='$gambar_baru' WHERE id_pelanggaran = '".$id."' ";

        $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./pelanggaran-edit?id=$id';</script>";
        die();
        
    }

    ?>