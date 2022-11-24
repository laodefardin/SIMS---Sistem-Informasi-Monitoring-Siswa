<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Detail Data Guru
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <?php
        $id = $_POST['rowid'];
        $query = $koneksi->query("SELECT * FROM tb_guru
        WHERE id = '$id'");
        foreach ($query as $data):
        ?>
    <form action="" method="post" enctype="multipart/form-data">
      <!-- form-group -->
      <div class="form-group">
        <label for="detailGuruNIK">NIK</label>
        <input name="nik" id="detailGuruNIK" type="text" placeholder="NIK" class="form-control"
          value="<?= $data['nik'] ;?>" readonly>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailGuruNama">Nama Guru</label>
        <input name="teacher_name" id="detailGuruNama" type="text" placeholder="Nama Guru" class="form-control"
          value="<?= $data['teacher_name'] ;?>" readonly>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailGuruMapel">Mata Pelajaran</label>
        <input name="subject" id="detailGuruMapel" type="text" placeholder="Mata Pelajaran" class="form-control"
          value="<?= $data['subject'] ;?>" readonly>
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