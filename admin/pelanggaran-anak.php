<?php
$halaman = 'Pelanggaran Siswa';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
?>
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

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-list-alt"></i>
              Pelanggaran Siswa
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body ">
            <table id="a" class="table table-bordered table-striped display nowrap" style="width:100%">
              <tbody>
                <?php
            $query = $koneksi->query("SELECT * FROM tb_siswa 
            JOIN tb_kelas ON tb_siswa.class_id = tb_kelas.id_kelas 
            JOIN tb_guru ON tb_kelas.wali_name = tb_guru.id
            WHERE tb_siswa.id = '$id_student'
            ");
            foreach ($query as $data) : 
            ?>
                <tr>
                  <th colspan="3">Data Pelanggaran Yang Telah Dilakukan Siswa:</th>
                </tr>
                <tr>
                  <td style="width: 200px;">NISN</td>
                  <td style="width: 20px;">:</td>
                  <td><?= $data['nisn'] ?></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><?= $data['std_name'] ?></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td>:</td>
                  <td><?= $data['class_name'] ?></td>
                </tr>
                <tr>
                  <td>WaliKelas</td>
                  <td>:</td>
                  <td><?= $data['teacher_name'] ?></td>
                </tr>
                <?php
$nomor_urut++;
endforeach; 
mysqli_free_result($query);?>
              </tbody>
            </table>


            <br>

            <table id="example2" class="table table-bordered table-striped display nowrap" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Pelanggaran</th>
                  <th scope="col">Catatan</th>
                  <th scope="col">Dilaporkan Pada</th>
                  <th scope="col" style=" width: 15% " class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
            $nomor_urut = 1;
            $query = $koneksi->query("SELECT * FROM tb_pelanggaran 
            JOIN tb_siswa ON tb_pelanggaran.student_id = tb_siswa.id 
            JOIN tb_kelas ON tb_pelanggaran.class_id = tb_kelas.id_kelas 
            JOIN tb_guru ON tb_kelas.wali_name = tb_guru.id
            WHERE tb_siswa.id = '$id_student'
            ");
            foreach ($query as $data) : 
            ?>
                <tr>
                  <td><?= $nomor_urut; ?></td>
                  <td><?= $data['pelanggaran']?></td>
                  <td><?= $data['note']?></td>
                  <td><?= $data['reported_on']?></td>
                  <td>
                    <?php echo "<a  class='btn btn-sm btn-info' href='#Pelanggarandetail' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id_pelanggaran']. ">Detail</a>"; ?>
                  </td>
                </tr>
                <?php
$nomor_urut++;
endforeach; 
mysqli_free_result($query);?>
              </tbody>
            </table>
          </div><!-- /.card-body -->
        </div>
      </div>

      <!-- MODAL -->
      <div class="modal fadee" id="Pelanggarandetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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