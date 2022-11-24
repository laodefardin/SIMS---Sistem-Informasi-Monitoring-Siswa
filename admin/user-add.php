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
    <form action="user-addproses.php" method="post" enctype="multipart/form-data">
      <!-- Fullname -->
      <div class="form-group">
        <label for="detailPenggunaFullname" class="col-form-label">Fullname</label>
        <input type="text" name="fullname" class="form-control" id="detailPenggunaFullname" placeholder="Fullname" />
      </div>
      <!-- / Fullname -->

      <!-- Fullname -->
      <div class="form-group">
        <label for="detailPenggunaEmail" class="col-form-label">Email</label>
        <input type="text" name="email" class="form-control" id="detailPenggunaEmail" placeholder="Email" />
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
          value="Administrator" readonly />
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