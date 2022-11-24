<?php
$halaman = 'Informasi Profile Siswa';
include "global_header.php"; 
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

<?php
// echo "SELECT * FROM tb_siswa 
// JOIN tb_kelas ON tb_siswa.class_id = tb_kelas.id_kelas 
// JOIN tb_pengguna ON tb_pengguna.student_id = tb_siswa.id
// JOIN tb_wali ON tb_wali.student_id = tb_siswa.id
// WHERE tb_siswa.id = '$id_student'";
$query = $koneksi->query("SELECT * FROM tb_siswa 
JOIN tb_kelas ON tb_siswa.class_id = tb_kelas.id_kelas 
JOIN tb_pengguna ON tb_pengguna.student_id = tb_siswa.id
JOIN tb_wali ON tb_wali.student_id = tb_siswa.id
WHERE tb_siswa.id = '$id_student'");
foreach ($query as $data):
?>
<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <!-- Default box -->
    <div class="card card-outline card-danger">
      <div class="card-body">
        <div class="row">
          <!-- baris 1 -->
          <div class="col-sm-2 col-md-2 col-lg-2 " align="center" style="margin-bottom: 25px">
            <?php
                $foto = $data['foto'];
                if ($foto===''){?>
            <img class="profile-user-img img-fluid" style="width: 100%;" src="../img/anonim.png"> 
          <?php } else { ?>
          <img class="profile-user-img img-fluid" style="width: 100%;" src="../img/user/<?= $data['foto']; ?>"
            alt="User profile picture">
          <?php }?>

        </div>

        <div class="col-md-5">
          <div class="box-body no-padding">
            <p class="lead"> <strong>Data Profile Siswa</strong></p>
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <td style="width: 200px;"><strong>NISN</strong></td>
                  <td><?= $data['nisn'] ?></td>
                </tr>
                <tr>
                  <td style="width: 200px;"><strong>Nama Lengkap</strong></td>
                  <td><?= $data['std_name'] ?></td>
                </tr>
                <tr>
                  <td style="width: 200px;"><strong>Kategori Kelas</strong></td>
                  <td><?= $data['sub_class'] ?> </td>
                </tr>
                <tr>
                  <td style="width: 200px;"><strong>Kelas Siswa</strong></td>
                  <td><?= $data['class_name'] ?> </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-5">
          <p class="lead">&nbsp; </p>
          <table class="table table-condensed">
            <tbody>
              <tr>
                <td style="width: 140px;"><strong>Alamat</strong></td>
                <td><?= $data['address'] ?></td>
              </tr>
              <tr>
                <td> <strong>Orang Tua/Wali</strong></td>
                <td><?= $data['parent_name'] ?></td>
              </tr>
              <tr>
                <td style="width: 200px;"><strong>No HP OrangTua/Wali</strong></td>
                <td><?= $data['phone_numberwali'] ?></td>
              </tr>
              <tr>
                <td><strong>No HP Siswa</strong></td>
                <td><?= $data['phone_number'] ?> </td>
              </tr>
            </tbody>
          </table>
        </div>

        </form>

      </div>
      <!-- /.card-body -->
    </div>

</section>
<!-- /.content -->
</div>


<?php
      endforeach;
      $koneksi->close();
      ?>
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>