<?php
$halaman = 'Add Data Siswa';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
?>

<?php
  //menampilkan pesan jika ada pesan
  if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
  $pesan = $_SESSION['pesan']; ?>
  
  <div id="flash-data" 
  data-flashdata="<?= $_SESSION['notif'];?>" 
  data-type="<?= $_SESSION['status']; ?>" 
  data-message="<?= $_SESSION['pesan']; ?>">
  </div>
  <?php }//mengatur session pesan menjadi kosong
  $_SESSION['pesan'] = '';
  unset($_SESSION['pesan']);
  unset($_SESSION['status']);
  ?>

<!-- Main content -->
<section class="content ">
  <div class="container-fluid col-sm-8">
    <!-- Default box -->
    <div class="card card-outline card-danger">
      <div class="card-header">
        <h4 class="card-title " text-align="center"><strong><?= $halaman?></strong></h4>
        <a class="btn btn-secondary btn-sm float-right" href="siswa">
          <i class="fas fa-arrow-left"></i>&ensp;Back
        </a>
      </div>
      <div class="card-body">
        <form action="siswa-prosesadd" method="post" enctype="multipart/form-data">
          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaNISN">NISN</label>
            <input name="nisn" id="detailSiswaNISN" type="text" placeholder="NISN" class="form-control" required="" value="<?= $nisn ?>">
          </div>
          <!-- /.form-group -->

          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaNama">Nama Siswa</label>
            <input name="std_name" id="detailSiswaNama" type="text" placeholder="Nama Siswa" class="form-control">
          </div>
          <!-- /.form-group -->

          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaWali">Orang Tua / Wali</label>
            <input name="parent_name" id="detailSiswaWali" type="text" placeholder="Orang Tua / Wali"
              class="form-control" value="<?= $parent_name ?>">
          </div>
          <!-- /.form-group -->

          <div class="row">
            <div class="col-sm-6">
              <!-- form-group -->
              <div class="form-group">
                <label for="sub_class">Kategori Kelas</label>
                <select id="sub_class" name="sub_class" class="form-control" style="width: 100%;" required="">
                  <option value="I" selected>Pilih Kategori Kelas</option>
                  <option value="X">10</option>
                  <option value="XI">11</option>
                  <option value="XII">12</option>
                </select>
              </div>
              <!-- /.form-group -->

            </div>

            <div class="col-sm-6">
              <!-- form-group -->
              <div class="form-group">
                <label for="class_name">Nama Kelas</label>
                <select id="class_name" name="class_name" class="form-control" style="width: 100%;" required="">
                  <option value="">Pilih Kategori Kelas Terlebih Dahulu</option>
                  <?php
            $query = $koneksi->query("SELECT * FROM tb_kelas");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                  <option id="class_name" class="<?= $row['sub_class']; ?>" value="<?= $row['id_kelas']; ?>">
                    <?= $row['class_name']; ?></option>
                  <?php } ?>

                </select>
              </div>
              <!-- /.form-group -->
            </div>
          </div>

          <!-- Alamat -->
          <div class="form-group">
            <label for="detailSiswaAlamat" class="col-form-label">Alamat</label>
            <textarea type="text" name="address" id="detailSiswaAlamat" class="form-control"
              placeholder="Alamat"><?= $address ?></textarea>
          </div>
          <!-- / Alamat -->

          <div class="row">

            <div class="col-sm-6">

              <!-- form-group -->
              <div class="form-group">
                <label for="detailSiswaTelepon">Nomor HP Siswa</label>
                <input name="phone_number" id="detailSiswaTelepon" type="text" class="form-control"
                  placeholder="Nomer HP Siswa Yang Bisa Di Hubungi" value="<?= $phone_number ?>">
              </div>
              <!-- /.form-group -->

            </div>

            <div class="col-sm-6">

              <!-- form-group -->
              <div class="form-group">
                <label for="detailWaliTelepon">Nomor HP Wali</label>
                <input name="phone_numberwali" id="detailWaliTelepon" type="text" class="form-control"
                  placeholder="Nomer HP  Orang Tua Yang Bisa Di Hubungi" value="<?= $phone_numberwali ?>">
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <?php
      $koneksi->close();
      ?>
          <div class="form-group text-right">
            <button class="btn btn-danger btn-sm" type="reset" data-dismiss="modal"><i
                class="fa fa-undo"></i>&ensp;Reset</button>

            <!-- <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Submit"> -->

            <button type="submit" name="submit" class="btn btn-primary btn-sm ">Submit &ensp;<i class="fas fa-arrow-right"></i></button> 
          </div>
        </form>

      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.Container Fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "global_footer.php"; ?>