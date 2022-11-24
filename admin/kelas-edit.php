<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Edit Data Kelas
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <?php
        $id = $_POST['rowid'];
        $query = $koneksi->query("SELECT * FROM tb_kelas 
        WHERE id_kelas = '$id'");
        foreach ($query as $data):
        ?>
    <form action="kelas-editproses.php" method="post" enctype="multipart/form-data">
      <input type="text" name="id" value="<?= $id ?>" hidden>
      <!-- form-group -->
      <div class="form-group">
        <label for="sub_class">Kategori Kelas</label>
        <select id="sub_class" name="sub_class" class="form-control select2" style="width: 100%;">
          <?php if($data['sub_class'] == 'XII') {
                        $output = '
                        <option value="I">Pilih Kategori Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII" selected>XII</option>
                        ';
                        }elseif($data['sub_class'] == 'XI'){
                        $output = '
                        <option value="I">Pilih Kategori Kelas</option>
                        <option value="X">X</option>
                        <option value="XI" selected>XI</option>
                        <option value="XII">XII</option>
                        ';
                        }else{
                        $output = '
                        <option value="I">Pilih Kategori Kelas</option>
                        <option value="X"  selected>X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                        ';
                        }
                        echo $output;
                        ?>
        </select>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="addKelasNama">Nama Kelas</label>
        <input name="class_name" id="class_name" type="text" placeholder="Contoh Nama Kelas : XII-RPL-1"
          class="form-control" value="<?= $data['class_name'] ;?>">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="addKelasWali">Wali Kelas</label>
        <select class="form-control select2" id="addKelasWali" name="wali_name">
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