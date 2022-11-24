<?php
include '../koneksi.php';
session_start(); 
    // $id = $_POST['id'];
    // $sub_class = $_POST['sub_class'];
    $class_id = $_POST['class_id'];
    $student_id = $_POST['student_id'];
    $pelanggaran = $_POST['pelanggaran'];
    $note = $_POST['note'];
    $reported_on = $_POST['reported_on'];

    $img = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $tgl=date('d-m-Y');

    $gambar_baru = date('dYHiS').$img;
    $path = "./pelanggaran_img/".$gambar_baru;

    if(empty($img)){
      $query = 'INSERT INTO tb_pelanggaran (student_id, class_id, pelanggaran, note, reported_on, foto) VALUES ("'.$student_id.'","'.$class_id.'","'.$pelanggaran.'","'.$note.'","'.$reported_on.'", "")';

      $sql = mysqli_query($koneksi, $query);

      $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
      $_SESSION['status'] = 'success';
      echo "<script> document.location.href='./pelanggaran';</script>";
      die();  

    }else{
      if(move_uploaded_file($tmp, $path)){
        $query = 'INSERT INTO tb_pelanggaran (student_id, class_id, pelanggaran, note, reported_on, foto) VALUES ("'.$student_id.'","'.$class_id.'","'.$pelanggaran.'","'.$note.'","'.$reported_on.'", "'.$gambar_baru.'")';

        $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

        $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./pelanggaran';</script>";
        die();

      }
    }

    ?>