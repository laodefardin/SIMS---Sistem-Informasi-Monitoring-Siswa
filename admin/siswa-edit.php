<?php
$halaman = 'Edit Data Siswa';
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
        <a class="btn btn-secondary btn-sm float-right" href="siswa">
          <i class="fas fa-arrow-left"></i>&ensp;Back
        </a>
      </div>
      <div class="card-body">
        <?php
        $id = $_GET['id'];
        $query = $koneksi->query("SELECT * FROM tb_siswa 
        JOIN tb_wali ON tb_siswa.id = tb_wali.student_id 
        JOIN tb_kelas ON tb_siswa.class_id = tb_kelas.id_kelas 
        WHERE tb_siswa.id = '$id'");
        foreach ($query as $data):
        ?>
        <form action="siswa-proses.php" method="post" enctype="multipart/form-data">
          <!-- form-group -->
          <input type="text" name="id" value="<?= $id ?>" hidden>
          <div class="form-group">
            <label for="detailSiswaNISN">NISN</label>
            <input name="nisn" id="detailSiswaNISN" type="text" placeholder="NISN" class="form-control"
              value="<?= $data['nisn'] ?>" readonly>
          </div>
          <!-- /.form-group -->

          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaNama">Nama Siswa</label>
            <input name="std_name" id="detailSiswaNama" type="text" placeholder="Nama Siswa" class="form-control"
              value="<?= $data['std_name'] ?>">
          </div>
          <!-- /.form-group -->

          <!-- form-group -->
          <div class="form-group">
            <label for="detailSiswaWali">Orang Tua / Wali</label>
            <input name="parent_name" id="detailSiswaWali" type="text" placeholder="Orang Tua / Wali" class="form-control"
              value="<?= $data['parent_name']?>">
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
              placeholder="Alamat"><?= $data['address'] ?></textarea>
          </div>
          <!-- / Alamat -->

          <div class="row">

            <div class="col-sm-6">

              <!-- form-group -->
              <div class="form-group">
                <label for="detailSiswaTelepon">Nomor HP Siswa</label>
                <input name="phone_number" id="detailSiswaTelepon" type="text" class="form-control"
                  placeholder="Nomer HP Siswa Yang Bisa Di Hubungi" value="<?= $data['phone_number'] ?>">
              </div>
              <!-- /.form-group -->

            </div>

            <div class="col-sm-6">

              <!-- form-group -->
              <div class="form-group">
                <label for="detailWaliTelepon">Nomor HP Wali</label>
                <input name="phone_numberwali" id="detailWaliTelepon" type="text" class="form-control"
                  placeholder="Nomer HP  Orang Tua Yang Bisa Di Hubungi" value="<?= $data['phone_numberwali'] ?>">
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <?php
      endforeach;
      $koneksi->close();
      ?>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-warning btn-sm ">Update &ensp;<i class="fas fa-edit"></i></button>
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