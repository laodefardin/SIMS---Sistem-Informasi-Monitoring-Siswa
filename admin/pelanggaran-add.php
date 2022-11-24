<?php
$halaman = 'Add Data Pelanggaran';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
?>

<!-- Main content -->
<section class="content ">
  <div class="container-fluid col-sm-8">
    <!-- Default box -->
    <div class="card card-outline card-danger">
      <div class="card-header">
        <h4 class="card-title " text-align="center"><strong><?= $halaman?></strong></h4>
        <a class="btn btn-secondary btn-sm float-right" href="pelanggaran">
          <i class="fas fa-arrow-left"></i>&ensp;Back
        </a>
      </div>
      <div class="card-body">
        <form action="pelanggaran-addproses.php" method="post" enctype="multipart/form-data">
          <div class="row ">
            <div class="col-md-6">
              <div class="row ">
                <div class="col-md-6">
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
                <div class="col-md-6">
                  <!-- form-group -->
                  <div class="form-group">
                    <label for="class_name">Nama Kelas</label>
                    <select id="class_name" name="class_id" class="form-control" style="width: 100%;">
                      <option value="">Pilih Kategori Kelas Terlebih Dahulu</option>
                      <?php
            $query = $koneksi->query("SELECT * FROM tb_kelas");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                      <option id="class_name" class="<?= $row['sub_class'].' '.$row['id_kelas'] ?>"
                        value="<?= $row['id_kelas']; ?>">
                        <?= $row['class_name']; ?></option>
                      <?php } ?>

                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
              </div>


              <!-- form-group -->
              <div class="form-group">
                <label for="name">Nama Siswa</label>
                <select id="name" name="student_id" class="form-control" style="width: 100%;">
                  <option value="">Pilih Nama Kelas Terlebih Dahulu</option>
                  <?php
            $query = $koneksi->query("SELECT * FROM tb_siswa");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                  <option id="name" class="<?= $row['class_id']; ?>" value="<?= $row['id']; ?>">
                    <?= $row['std_name']; ?></option>
                  <?php } ?>

                </select>
              </div>
              <!-- /.form-group -->

              <!-- form-group -->
              <div class="form-group">
                <label for="detailKelasWali">Pelanggaran</label>
                <input name="pelanggaran" id="pelanggaran" type="text" placeholder="Pelanggaran" class="form-control">
              </div>
              <!-- /.form-group -->

              <!-- Catatan -->
              <div class="form-group">
                <label for="catatan" class="col-form-label">Catatan</label>
                <textarea type="text" name="note" class="form-control" id="catatan"
                  placeholder="Catatan"></textarea>
              </div>
              <!-- / Catatan -->

              <!-- Di Laporankan Pada -->
              <div class="form-group">
                <label for="laporkanPada" class="col-form-label">Di Laporankan Pada</label>
                <input type="datetime-local" class="form-control" id="laporkanPada" placeholder="Di Laporankan Pada" name="reported_on">
              </div>
              <!-- / Di Laporankan Pada -->

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="foto">Ganti Foto</label>
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="customFile" accept="image/jpeg">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>

          </div>

      </div>
      <!-- /.row -->


      <?php
      $koneksi->close();
      ?>
      <div class="modal-footer">
        <div class="form-group text-right">
          <button type="submit" class="btn btn-warning btn-sm ">Update &ensp;<i class="fas fa-edit"></i></button>
        </div>
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