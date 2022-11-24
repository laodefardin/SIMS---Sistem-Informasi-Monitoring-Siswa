<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Detail Data
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <?php
        $id = $_POST['rowid'];
        $query = $koneksi->query("SELECT * FROM tb_kelas JOIN tb_guru ON tb_kelas.wali_name = tb_guru.id
        WHERE id_kelas = '$id'");
        foreach ($query as $data):
        ?>
    <form action="" method="post" enctype="multipart/form-data">
      <!-- form-group -->
      <div class="form-group">
        <label for="detailKelasKelas">Kelas</label>
        <input name="sub_class" id="detailKelasKelas" type="text" placeholder="Kelas" class="form-control"
          value="<?= $data['sub_class'] ;?>" readonly>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailKelasNama">Nama Kelas</label>
        <input name="class_name" id="detailKelasNama" type="text" placeholder="Contoh Nama Kelas : XII-RPL-1"
          class="form-control" value="<?= $data['class_name'] ;?>" readonly>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailKelasWali">Wali Kelas</label>
        <input name="wali_name" id="detailKelasWali" type="text" placeholder="Wali Kelas" class="form-control"
          value="<?= $data['teacher_name'] ;?>" readonly>
      </div>
      <!-- /.form-group -->
      <?php
      endforeach;
      $koneksi->close();
      ?>
      <div class="modal-footer">
        <!-- <input class="btn btn-primary" name="tambah" type="submit" value="Save changes"> -->
        <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
      </div>

    </form>
  </div>
</div>