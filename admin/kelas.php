<?php
$halaman = 'Data Semua Kelas';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$query = $koneksi->query("SELECT * FROM tb_kelas JOIN tb_guru ON tb_kelas.wali_name = tb_guru.id");
?>
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
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
        <div class="card card-outline card-danger">
          <div class="card-header">
            <h4 class="card-title text-bold"><?= $halaman ?></h4>
            <!-- <a class="btn btn-sm btn-outline-danger float-right" href="siswa-add">
              <i class="fas fa-plus"></i> Add Data
            </a> -->
            <a data-id="Add Kelas" href='#kelasAdd' class='btn btn-sm btn-outline-danger float-right' id='custId' data-toggle='modal'
                            data-id=""><i class='fa fa-plus'></i> Add Data</a>
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
                  <th scope="col">Kelas</th>
                  <th scope="col">Nama Kelas</th>
                  <th scope="col">Total Murid</th>
                  <th scope="col">Wali Kelas</th>
                  <th scope="col" style=" width: 15% " class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                        $nomor_urut = 1;
                        foreach ($query as $data) : ?>
                <tr>
                  <td><?= $nomor_urut; ?></td>
                  <td><?= $data['sub_class']?></td>
                  <td><?= $data['class_name']?></td>
                  <td>
                    <?php 
                    $id = $data['id_kelas']; 
                    $sql = "SELECT count(class_id) FROM tb_siswa WHERE class_id ='$id'";
                    $query = mysqli_query($koneksi, $sql);
                    while ($r = mysqli_fetch_array($query)){
                    echo $r['count(class_id)'];
                    }?>
                  </td>
                  <td><?= $data['teacher_name']?></td>
                  <td>
                    <?php echo "<a  class='btn btn-sm btn-info'  style='margin-right:10px; height:32px; width:32px;' href='#Kelasdetail' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_kelas']. "><i class='fas fa-info'></i> </a>"; ?>

                    <?php echo "<a  class='btn btn-sm btn-warning'  style='margin-right:10px; height:32px; width:32px;' href='#Kelasedit' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_kelas'] . "><i class='fas fa-edit text-light'></i> </a>"; ?>

                    <!-- <a href="siswa-edit?id=<?= $data['id']; ?>" style="margin-right:10px; height:32px; width:32px;"
                      class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title=""
                      data-original-title="Edit"><i class="fas fa-edit text-light"></i></a> -->

                    <a href="kelas-hapus?id=<?= $data['id_kelas']; ?>"
                      style="margin-right:10px; height:32px; width:32px;" class="btn btn-danger btn-sm tombol-hapus"
                      data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i
                        class="fa fa-trash"></i></a>
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
      <div class="modal fadee" id="Kelasdetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="fetched-dataedit" style="width: 100%; height: 400px;"></div>
        </div>
      </div>

      <div class="modal fadee" id="Kelasedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="fetched-dataedit" style="width: 100%; height: 400px;"></div>
        </div>
      </div>
      
      <div class="modal fadee" id="kelasAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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