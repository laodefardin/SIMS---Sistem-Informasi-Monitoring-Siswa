<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Edit Data Guru
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
    <form action="guru-editproses.php" method="post" enctype="multipart/form-data">
      <input type="text" name="id" value="<?= $id ?>" hidden>
      <!-- form-group -->
      <div class="form-group">
        <label for="editGuruNIK">NIK</label>
        <input name="nik" id="editGuruNIK" type="text" placeholder="NIK" class="form-control"
          value="<?= $data['nik'] ;?>">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="editGuruNama">Nama Guru</label>
        <input name="teacher_name" id="editGuruNama" type="text" placeholder="Nama Guru" class="form-control"
          value="<?= $data['teacher_name'] ;?>">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="editGuruMapel">Mata Pelajaran</label>
        <input name="subject" id="editGuruMapel" type="text" placeholder="Mata Pelajaran" class="form-control"
          value="<?= $data['subject'] ;?>">
      </div>
      <!-- /.form-group -->

      <?php
      endforeach;
      $koneksi->close();
      ?>
      <div class="form-group text-right">
        <button type="submit" name="submit" class="btn btn-warning btn-sm ">Update &ensp;<i
            class="fas fa-edit"></i></button>
      </div>

    </form>
  </div>
</div>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>