<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Add Data Kelas
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="kelas-addproses.php" method="post" enctype="multipart/form-data">
      <input type="text" name="id" value="<?= $id ?>" hidden>
      <!-- form-group -->
      <div class="form-group">
        <label for="sub_class">Kategori Kelas</label>
        <select id="sub_class" name="sub_class" class="form-control select2" style="width: 100%;" required="">
          <option value="I" selected>Pilih Kategori Kelas</option>
          <option value="X">X</option>
          <option value="XI">XI</option>
          <option value="XII">XII</option>
        </select>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="addKelasNama">Nama Kelas</label>
        <input name="class_name" id="class_name" type="text" placeholder="Contoh Nama Kelas : XII-RPL-1"
          class="form-control" required="">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="addKelasWali">Wali Kelas</label>
        <select class="form-control select2" id="addKelasWali" name="wali_name" required="">
          <option value="" selected="selected">Pilih Wali Kelas</option>
          <?php 
        $guruAll = $koneksi->query("SELECT * FROM tb_guru");
        foreach ($guruAll as $guru) {
        
        if($data['wali_name'] == $guru['id'])
        {
          echo '<option value="'.$guru['id'].'" selected>'.$guru['teacher_name'].'</option>';
        }else{
        echo '<option value="'.$guru['id'].'">'.$guru['teacher_name'].'</option>';
        }
        };?>
        </select>
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