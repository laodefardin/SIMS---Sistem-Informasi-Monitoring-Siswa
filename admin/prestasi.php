<?php
$halaman = 'List Semua Prestasi Siswa';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
?>
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <?php
    if ($level == 'Wali Kelas'){

    }else{ ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="card-body">
          <form action="prestasi" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cari Kelas</label>
              <div class="col-sm-10">
                <select name='qcari' class="form-control select2" style="width: 100%;" required="">
                  <option value="">Pilih Kategori Kelas</option>
                  <?php
                    $query = $koneksi->query("SELECT * FROM tb_kelas");
                    while ($row = mysqli_fetch_array($query)) {
                      $select =  $data['id_kelas'] == $_POST['qcari'] ? ' selected="selected"' : '';
                    ?>
                  <option value="<?= $row['id_kelas']; ?>">
                    <?= $row['class_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
        </div>

      </div>
      <div class="col-lg-6">
        <div class="card-body">
          <input class="btn btn-primary btn-sm" name="tambah" type="submit" value="Cari data">
          <a href='prestasi' class="btn btn-danger btn-sm">Refresh</i></a>
        </div>
      </div>
    </div>
    </form>
    <?php } ?>

    <div class="row">
      <div class="col-lg-12">
        <?php
  //menampilkan pesan jika ada pesan
  if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
  $pesan = $_SESSION['pesan']; ?>

        <div id="flash-data" data-flashdata="<?= $_SESSION['notif'];?>" data-type="<?= $_SESSION['status']; ?>"
          data-message="<?= $_SESSION['pesan']; ?>">
        </div>
        <?php }//mengatur session pesan menjadi kosong
  $_SESSION['pesan'] = '';
  unset($_SESSION['pesan']);
  unset($_SESSION['status']);
  ?>
        <div class="card card-outline card-danger">
          <div class="card-header">
            <h4 class="card-title text-bold"><?= $halaman ?> <?= $row['class_name'] ?></h4>
            <?php if ($level == 'Wali Kelas'){
            }else{ ?>
<a class="btn btn-sm btn-outline-danger float-right" href="prestasi-add">
              <i class="fas fa-plus"></i> Add Data
            </a>
            <?php } ?>
            <!-- <a data-id="Add Pelanggaran" href='#PelanggaranAdd' class='btn btn-sm btn-outline-danger float-right' id='custId'
              data-toggle='modal' data-id=""><i class='fa fa-plus'></i> Add Data</a> -->
          </div>

          <div class="card-body">

            <!-- <div class="input-group ">
              <input class="form-control col-sm-12" name="search" id="search" type="text"
                placeholder="Search NISN dan Nama" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-primary">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div> -->

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NISN</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Prestasi</th>
                  <th scope="col" style=" width: 15% " class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($level == 'Wali Kelas') {
                  $nomor_urut = 1;
                  $query = $koneksi->query("SELECT * FROM tb_prestasi JOIN tb_siswa ON tb_prestasi.student_id = tb_siswa.id JOIN tb_kelas ON tb_prestasi.class_id = tb_kelas.id_kelas WHERE wali_name = '$id_student' ");  

                }elseif($level == 'Administrator'){
                  $nomor_urut = 1;
                  $query = $koneksi->query("SELECT * FROM tb_prestasi JOIN tb_siswa ON tb_prestasi.student_id = tb_siswa.id JOIN tb_kelas ON tb_prestasi.class_id = tb_kelas.id_kelas");
                  
                  if (isset($_POST['qcari'])){
                    $qcari = $_POST['qcari'];
                    $query =  $koneksi->query("SELECT * FROM tb_prestasi JOIN tb_siswa ON tb_prestasi.student_id = tb_siswa.id JOIN tb_kelas ON tb_prestasi.class_id = tb_kelas.id_kelas WHERE tb_kelas.id_kelas = '$qcari' ");
                  }
                }
                foreach ($query as $data) : ?>
                <tr>
                  <td><?= $nomor_urut; ?></td>
                  <td><?= $data['nisn']?></td>
                  <td><?= $data['std_name']?></td>
                  <td><?= $data['class_name']?></td>
                  <td><?= $data['prestasi']?></td>
                  <td>
                  <?php if ($level == 'Wali Kelas') {
                    echo "<a  class='btn btn-sm btn-info' href='#Prestasidetail' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_prestasi']. ">Detail Data </a>";
                  }else{ ?> 

                    <?php echo "<a  class='btn btn-sm btn-info'  style='margin-right:10px; height:32px; width:32px;' href='#Prestasidetail' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_prestasi']. "><i class='fas fa-info'></i> </a>"; ?>

                    <!-- <?php echo "<a  class='btn btn-sm btn-warning'  style='margin-right:10px; height:32px; width:32px;' href='#Pelanggaranedit' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_prestasi'] . "><i class='fas fa-edit text-light'></i> </a>"; ?> -->

                    <a href="prestasi-edit?id=<?= $data['id_prestasi']; ?>"
                      style="margin-right:10px; height:32px; width:32px;" class="btn btn-warning btn-sm"
                      data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i
                        class="fas fa-edit text-light"></i></a>

                    <a href="prestasi-hapus?id=<?= $data['id_prestasi']; ?>"
                      style="margin-right:10px; height:32px; width:32px;" class="btn btn-danger btn-sm tombol-hapus"
                      data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i
                        class="fa fa-trash"></i></a>
                  <?php } ?>

                  </td>
                </tr>
                <?php
                                                    $nomor_urut++;
                                                endforeach; 
                                                mysqli_free_result($query);?>
              </tbody>
            </table>
          </div>

        </div>
        <!-- /.card -->


      </div>

      <!-- MODAL -->
      <div class="modal fadee" id="Prestasidetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="fetched-dataedit" style="width: 100%; height: 400px;"></div>
        </div>
      </div>

      <div class="modal fadee" id="Pelanggaranedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="fetched-dataedit" style="width: 100%; height: 400px;"></div>
        </div>
      </div>

      <div class="modal fadee" id="GuruAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="fetched-dataedit" style="width: 100%; height: 400px;"></div>
        </div>
      </div>



      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "global_footer.php"; ?>