<?php
include '../koneksi.php';
?>

<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Detail Data Prestasi
    </h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
    <?php
        $id = $_POST['rowid'];
        $query = $koneksi->query("SELECT * FROM tb_prestasi JOIN tb_siswa ON tb_prestasi.student_id = tb_siswa.id JOIN tb_kelas ON tb_prestasi.class_id = tb_kelas.id_kelas
        WHERE tb_prestasi.id_prestasi = '$id'");
        foreach ($query as $data):
        ?>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="row ">
      <div class="col-md-6">

      <div class="row ">
        <div class="col-md-6">
          <!-- form-group -->
          <div class="form-group">
            <label for="kelas">Kategori Kelas</label>
            <?php if($data['sub_class'] == 'XII') {
                echo '<input type="text" class="form-control" id="kelas" placeholder="Kategori Kelas" value="12" readonly>';
                }elseif($data['sub_class'] == 'XI'){
                echo '<input type="text" class="form-control" id="kelas" placeholder="Kategori Kelas" value="11" readonly>';
                }else{
                echo '<input type="text" class="form-control" id="kelas" placeholder="Kategori Kelas" value="10" readonly>';
                };?>
          </div>
          <!-- /.form-group -->
        </div>
        <div class="col-md-6">
          <!-- form-group -->
          <div class="form-group">
            <label for="namaKelas">Nama Kelas</label>
            <input type="text" class="form-control" id="kelas" placeholder="Nama Kelas"
              value="<?= $data['class_name']?>" readonly>
          </div>
          <!-- /.form-group -->
        </div>
        </div>


        <!-- form-group -->
        <div class="form-group">
          <label for="detailKelasNama">Nama Siswa</label>
          <input name="std_name" id="detailKelasNama" type="text" placeholder="Contoh Nama Kelas : XII-RPL-1"
            class="form-control" value="<?= $data['std_name'] ;?>" readonly>
        </div>
        <!-- /.form-group -->

        <!-- form-group -->
        <div class="form-group">
          <label for="detailKelasWali">Nama Wali Kelas</label>
          <input name="wali_name" id="detailKelasWali" type="text" placeholder="Wali Kelas" class="form-control"
            value="<?= $data['wali_name'] ;?>" readonly>
        </div>
        <!-- /.form-group -->

        <!-- form-group -->
        <div class="form-group">
          <label for="detailKelasWali">Prestasi</label>
          <input name="prestasi" id="prestasi" type="text" placeholder="Prestasi" class="form-control"
            value="<?= $data['prestasi'] ;?>" readonly>
        </div>
        <!-- /.form-group -->

        <!-- Catatan -->
        <div class="form-group">
          <label for="catatan" class="col-form-label">Catatan</label>
          <textarea type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan"
            readonly><?= $data['note']?></textarea>
        </div>
        <!-- / Catatan -->

        <!-- Di Laporankan Pada -->
        <div class="form-group">
          <label for="laporkanPada" class="col-form-label">Di Laporankan Pada</label>
          <input type="text" class="form-control" id="laporkanPada" placeholder="Di Laporankan Pada"
            value="<?= date('d F Y H:i:s', strtotime($data['reported_on']))?>" readonly>
        </div>
        <!-- / Di Laporankan Pada -->

      </div>
      <div class="col-md-6">
        <!-- form-group -->
        <div class="form-group">
          <label for="detailKelasNama">Foto Prestasi</label> <br>
          <?php
          $foto = $data['foto'];
          if ($foto === ''){?>
          <img class="img-fluid" src="../img/no-image.png" alt="Photo">
          <?php }else{ ?>
          <img class="img-fluid" src="./prestasi_img/<?= $data['foto'] ?>" alt="Photo">
          <?php }?>
        </div>
        <!-- /.form-group -->
      </div>
  </div>

  </div>
      <!-- /.row -->


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