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
        $query = $koneksi->query("SELECT * FROM tb_siswa 
        JOIN tb_wali ON tb_siswa.id = tb_wali.student_id 
        JOIN tb_kelas ON tb_siswa.class_id = tb_kelas.id_kelas 
        WHERE tb_siswa.id = '$id'");
        foreach ($query as $data):
        ?>
    <form action="" method="post" enctype="multipart/form-data">
      <!-- form-group -->
      <div class="form-group">
        <label for="detailSiswaNISN">NISN</label>
        <input name="nisn" id="detailSiswaNISN" type="text" placeholder="NISN" class="form-control"
          value="<?= $data['nisn'] ;?>" readonly>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailSiswaNama">Nama Siswa</label>
        <input name="nama" id="detailSiswaNama" type="text" placeholder="Nama Siswa" class="form-control"
          value="<?= $data['std_name'];?>" readonly>
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailSiswaWali">Orang Tua / Wali</label>
        <input name="wali" id="detailSiswaWali" type="text" placeholder="Orang Tua / Wali" class="form-control"
          value="<?= $data['parent_name'] ;?>" readonly>
      </div>
      <!-- /.form-group -->

      <div class="row">

        <div class="col-sm-6">

          <!-- form-group -->
          <div class="form-group">
            <label for="addkelas">Kategori Kelas</label>
            <input type="text" class="form-control" id="kelas" placeholder="Kategori Kelas"
              value="<?= $data['sub_class'] ;?>" readonly>
          </div>
          <!-- /.form-group -->

        </div>

        <div class="col-sm-6">

          <!-- form-group -->
          <div class="form-group">
            <label for="addnamaKelas">Nama Kelas</label>
            <input type="text" class="form-control" id="addnamaKelas" placeholder="Nama Kelas"
              value="<?= $data['class_name']?>" readonly>
          </div>
          <!-- /.form-group -->

        </div>

      </div>

      <!-- Alamat -->
      <div class="form-group">
        <label for="detailSiswaAlamat" class="col-form-label">Alamat</label>
        <textarea type="text" name="alamat" id="detailSiswaAlamat" class="form-control" placeholder="Alamat"
          readonly><?= $data['address'] ;?></textarea>
      </div>
      <!-- / Alamat -->

      <div class="row">

        <div class="col-sm-6">

          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaTelepon">Nomor HP Siswa</label>
            <input name="telepon" id="detailSiswaTelepon" type="text" class="form-control"
              placeholder="Nomer HP Yang Bisa Di Hubungi(Utamakan Nomer HP Orang Tua)"
              value="<?= $data['phone_number'] ;?>" readonly>
          </div>
          <!-- /.form-group -->

        </div>

        <div class="col-sm-6">

          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaTelepon">Nomor HP Wali</label>
            <input name="telepon" id="detailSiswaTelepon" type="text" class="form-control"
              placeholder="Nomer HP Yang Bisa Di Hubungi(Utamakan Nomer HP Orang Tua)"
              value="<?= $data['phone_numberwali'] ;?>" readonly>
          </div>
          <!-- /.form-group -->
        </div>
      </div>



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