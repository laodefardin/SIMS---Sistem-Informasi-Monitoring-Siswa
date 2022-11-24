<?php
include '../koneksi.php';
include "global_header.php"; 
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Edit Data
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
        WHERE tb_siswa.id = '5'");
        foreach ($query as $data):
        ?>
    <form action="" method="post" enctype="multipart/form-data">
      <!-- form-group -->
      <div class="form-group">
        <label for="detailSiswaNISN">NISN</label>
        <input name="nisn" id="detailSiswaNISN" type="text" placeholder="NISN" class="form-control" value="<?= $data['nisn'] ?>">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailSiswaNama">Nama Siswa</label>
        <input name="nama" id="detailSiswaNama" type="text" placeholder="Nama Siswa" class="form-control" value="<?= $data['std_name'] ?>">
      </div>
      <!-- /.form-group -->

      <!-- form-group -->
      <div class="form-group">
        <label for="detailSiswaWali">Orang Tua / Wali</label>
        <input name="wali" id="detailSiswaWali" type="text" placeholder="Orang Tua / Wali" class="form-control" value="<?= $data['parent_name']?>">
      </div>
      <!-- /.form-group -->

      <div class="row">

        <div class="col-sm-6">

          <!-- form-group -->
          <div class="form-group">
            <label for="sub_class">Kategori Kelas</label>
            <select id="sub_class" name="sub_class" class="form-control" style="width: 100%;">
              <?php if($data['sub_class'] == 'XII') {
                        $output = '
                        <option value="I">Pilih Kategori Kelas</option>
                        <option value="X">10</option>
                        <option value="XI">11</option>
                        <option value="XII" selected>12</option>
                        ';
                        }elseif($data['sub_class'] == 'XI'){
                        $output = '
                        <option value="I">Pilih Kategori Kelas</option>
                        <option value="X">10</option>
                        <option value="XI" selected>11</option>
                        <option value="XII">12</option>
                        ';
                        }else{
                        $output = '
                        <option value="I">Pilih Kategori Kelas</option>
                        <option value="X"  selected>10</option>
                        <option value="XI">11</option>
                        <option value="XII">12</option>
                        ';
                        }
                        echo $output;
                        ?>
            </select>
          </div>
          <!-- /.form-group -->

        </div>

        <div class="col-sm-6">
          <!-- form-group -->
          <div class="form-group">
            <label for="class_name">Nama Kelas</label>
            <select id="class_name" name="class_name" class="form-control" style="width: 100%;">
              <option value="">Pilih Kategori Kelas Terlebih Dahulu</option>
              <?php
            if($data['class_id'] == $data['id_kelas']){ 
            ?>    
            <option id="class_name" class="<?= $data['sub_class']; ?>" value="<?= $data['id_kelas']?>"
              selected="selected"><?=$data['class_name']?></option>
            <?php } ?>

            <?php
            $query = $koneksi->query("SELECT * FROM tb_kelas");
            while ($row = mysqli_fetch_array($query)) {
            ?> 
            <option id="class_name" class="<?= $row['sub_class']; ?>" value="<?= $row['class_name']; ?>"><?= $row['class_name']; ?></option>
            <?php } ?>

            </select>
          </div>
          <!-- /.form-group -->

        </div>

      </div>

      <!-- Alamat -->
      <div class="form-group">
        <label for="detailSiswaAlamat" class="col-form-label">Alamat</label>
        <textarea type="text" name="alamat" id="detailSiswaAlamat" class="form-control" placeholder="Alamat"></textarea>
      </div>
      <!-- / Alamat -->

      <div class="row">

        <div class="col-sm-6">

          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaTelepon">Nomor HP Siswa</label>
            <input name="telepon" id="detailSiswaTelepon" type="text" class="form-control"
              placeholder="Nomer HP Siswa Yang Bisa Di Hubungi">
          </div>
          <!-- /.form-group -->

        </div>

        <div class="col-sm-6">

          <!-- form-group -->
          <div class="form-group">
            <label for="detailWaliTelepon">Nomor HP Wali</label>
            <input name="telepon" id="detailWaliTelepon" type="text" class="form-control"
              placeholder="Nomer HP  Orang Tua Yang Bisa Di Hubungi">
          </div>
          <!-- /.form-group -->
        </div>
      </div>



      <?php
      endforeach;
      $koneksi->close();
      ?>
      <div class="modal-footer">
        <input class="btn btn-primary" name="tambah" type="submit" value="Save changes">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
      </div>

    </form>
  </div>
</div>
<script src="../assets/js/jquery-1.10.2.min.js"></script>
<script src="../assets/js/jquery.chained.min.js"></script>
<script>
  $("#class_name").chained("#sub_class");
</script>