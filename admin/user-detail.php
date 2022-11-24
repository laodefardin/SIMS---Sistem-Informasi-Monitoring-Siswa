<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Detail Data Pengguna
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <?php
        $id = $_POST['rowid'];
        $query = $koneksi->query("SELECT * FROM tb_pengguna
        WHERE id = '$id'");
        foreach ($query as $data):
        ?>
    <form action="user-editproses.php" method="post" enctype="multipart/form-data">

      <!-- Fullname -->
      <div class="form-group">
        <label for="detailPenggunaFullname" class="col-form-label">Fullname</label>
        <input type="text" name="full_name" class="form-control" id="detailPenggunaFullname" placeholder="Fullname"
          value="<?= $data['full_name']?>" readonly />
      </div>
      <!-- / Fullname -->

      <!-- Fullname -->
      <div class="form-group">
        <label for="detailPenggunaEmail" class="col-form-label">Email</label>
        <input type="text" name="email" class="form-control" id="detailPenggunaEmail" placeholder="Email"
          value="<?= $data['email']; ?>" readonly />
      </div>
      <!-- / Fullname -->

      <!-- Username -->
      <div class="form-group">
        <label for="detailPenggunaUsername" class="col-form-label">Username</label>
        <input type="text" name="username" class="form-control" id="detailPenggunaUsername" placeholder="Username"
          value="<?= $data['username']?>" readonly />
      </div>
      <!-- / Username -->



      <!-- Level -->
      <div class="form-group">
        <label for="detailPenggunaLevel" class="col-form-label">Level</label>
        <input type="text" name="level" class="form-control" id="detailPenggunaLevel" placeholder="Username"
          value="<?= $data['level']?>" readonly />
      </div>
      <!-- / Level -->


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