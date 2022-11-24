<?php
$halaman = 'Edit Data Prestasi';
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
        <a class="btn btn-secondary btn-sm float-right" href="prestasi">
          <i class="fas fa-arrow-left"></i>&ensp;Back
        </a>
      </div>
      <div class="card-body">
        <?php
        $id = $_GET['id'];
        $query = $koneksi->query("SELECT * FROM tb_prestasi JOIN tb_siswa ON tb_prestasi.student_id = tb_siswa.id JOIN tb_kelas ON tb_prestasi.class_id = tb_kelas.id_kelas
        WHERE tb_prestasi.id_prestasi = '$id'");
        foreach ($query as $data):
        ?>
        <form action="prestasi-editproses.php" method="post" enctype="multipart/form-data">
          <div class="row ">
            <div class="col-md-6">
              <input type="text" name="id" value="<?= $id ?>" hidden>
              <div class="row ">
                <div class="col-md-6">
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
                <div class="col-md-6">
                  <!-- form-group -->
                  <div class="form-group">
                    <label for="class_name">Nama Kelas</label>
                    <select id="class_name" name="class_id" class="form-control" style="width: 100%;">
                      <option value="">Pilih Kategori Kelas Terlebih Dahulu</option>
                      <?php
            if($data['class_id'] == $data['id_kelas']){ 
            ?>
                      <option id="class_name" class="<?= $data['sub_class'].' '.$data['id_kelas'] ?>" value="<?= $data['id_kelas']?>"
                        selected="selected"><?=$data['class_name']?></option>
                      <?php } ?>

                      <?php
            $query = $koneksi->query("SELECT * FROM tb_kelas");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                      <option id="class_name" class="<?= $row['sub_class'].' '.$row['id_kelas'] ?>" value="<?= $row['id_kelas']; ?>">
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
            if($data['student_id'] == $data['id']){ 
            ?>
                      <option id="name" class="<?= $data['class_id']; ?>" value="<?= $data['student_id']?>"
                        selected="selected"><?=$data['std_name']?></option>
                      <?php } ?>

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
              <!-- <div class="form-group">
                <label for="detailKelasNama">Nama Siswa</label>
                <select id="id_siswa" name="student_id" class="form-control select2" style="width: 100%;">
                <?php
                $sql = $koneksi->query("SELECT * FROM tb_siswa");
                while ($row = mysqli_fetch_array($sql)) {
                  $select = $data['student_id'] == $row['id'] ? ' selected="selected"' : '';
                  echo '<option class='.$data['class_id'].' value="'.$row['id'].'"'.$select.'>'.$row['std_name'].'</option>';
                }
                ?>
                </select>
              </div> -->
              <!-- /.form-group -->

              <!-- form-group -->
              <div class="form-group">
                <label for="detailKelasWali">Prestasi</label>
                <input name="prestasi" id="prestasi" type="text" placeholder="Prestasi" class="form-control"
                  value="<?= $data['prestasi'] ;?>">
              </div>
              <!-- /.form-group -->

              <!-- Catatan -->
              <div class="form-group">
                <label for="catatan" class="col-form-label">Catatan</label>
                <textarea type="text" name="note" class="form-control" id="catatan"
                  placeholder="Catatan"><?= $data['note']?></textarea>
              </div>
              <!-- / Catatan -->

              <!-- Di Laporankan Pada -->
              <div class="form-group">
                <label for="laporkanPada" class="col-form-label">Di Laporankan Pada</label>
                <input type="datetime-local" class="form-control" id="laporkanPada" placeholder="Di Laporankan Pada"
                  value="<?= $data['reported_on']?>" name="reported_on">
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

              <div class="form-group">
                <label for="foto">Ganti Foto</label>
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="customFile" accept="image/png, image/gif, image/jpeg" />
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>

          </div>

      </div>
      <!-- /.row -->


      <?php
      endforeach;
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