<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Add Data Pengguna Admin
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="user-addproseswalikelas.php" method="post" enctype="multipart/form-data">
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
    

      <!-- Fullname -->
      <div class="form-group">
        <label for="detailPenggunaEmail" class="col-form-label">Email</label>
        <input type="text" name="email" class="form-control" id="detailPenggunaEmail" placeholder="Email" />
        <small class="text-danger pl-3">Email Jika tidak ada, boleh di kosongkan.</small>
      </div>
      <!-- / Fullname -->

      <!-- Username -->
      <div class="form-group">
        <label for="detailPenggunaUsername" class="col-form-label">Username</label>
        <input type="text" name="username" class="form-control" id="detailPenggunaUsername" placeholder="Username" />
      </div>
      <!-- / Username -->

      <!-- Username -->
      <div class="form-group">
        <label for="editPenggunaUsername" class="col-form-label">Password</label>
        <input type="text" name="password" class="form-control" id="editPenggunaUsername" placeholder="Password"
          value="" />
        <!-- <p class="text-danger">*Catatan : Kosongkan Jika Tidak Diubah</p> -->
      </div>
      <!-- / Password -->

      <!-- Level -->
      <div class="form-group">
        <label for="detailPenggunaLevel" class="col-form-label">Level</label>
        <input type="text" name="level" class="form-control" id="detailPenggunaLevel" placeholder="Username"
          value="Wali Kelas" readonly />
      </div>
      <!-- / Level -->


      <?php
      $koneksi->close();
      ?>
      <div class="modal-footer">
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