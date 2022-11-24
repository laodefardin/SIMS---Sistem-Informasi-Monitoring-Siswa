<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Add Data Guru
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="guru-addproses.php" method="post" enctype="multipart/form-data">
      <input type="text" name="id" value="<?= $id ?>" hidden>
      <!-- form-group -->
      <div class="form-group">
        <label for="addGuruNIK">NIK</label>
        <input name="nik" id="addGuruNIK" type="text" placeholder="NIK" class="form-control">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="addGuruNama">Nama Guru</label>
        <input name="teacher_name" id="addGuruNama" type="text" placeholder="Nama Guru" class="form-control">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="addGuruMapel">Mata Pelajaran</label>
        <input name="subject" id="addGuruMapel" type="text" placeholder="Mata Pelajaran" class="form-control">
      </div>
      <!-- /.form-group -->


      <?php
      $koneksi->close();
      ?>
      <div class="form-group text-right">
        <button class="btn btn-danger btn-sm" type="reset" data-dismiss="modal"><i
            class="fa fa-undo"></i>&ensp;Reset</button>
        <button type="submit" class="btn btn-primary btn-sm ">Submit &ensp;<i class="fas fa-arrow-right"></i></button>
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