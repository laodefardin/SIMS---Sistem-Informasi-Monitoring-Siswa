<?php 
$halaman = 'dashboard';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$quer = $koneksi->query("SELECT * FROM tb_website");
foreach ($quer as $data) : 
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-check"></i> SISTEM INFORMASI MONITORING SISWA</h5>
            <?= $data['school_name']?>
            <?php
                endforeach; 
                mysqli_free_result($quer);?>
        </div>

        
        <div class="row">

        <?php
        if ($level === 'Wali Kelas' OR $level === 'Orang Tua Wali'){ ?>
            <!-- JUMLAH SISWA -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_siswa 
              JOIN tb_kelas ON tb_siswa.class_id = tb_kelas.id_kelas 
              WHERE wali_name = '$id_student'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              // bebaskan memory
                mysqli_free_result($data);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="siswa" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- JUMLAH SISWA -->

            <!-- JUMLAH PRESTASI -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id_prestasi) as a FROM tb_prestasi JOIN tb_siswa ON tb_prestasi.student_id = tb_siswa.id JOIN tb_kelas ON tb_prestasi.class_id = tb_kelas.id_kelas WHERE wali_name = '$id_student'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              mysqli_free_result($data);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Prestasi Siswa <?= $data['class_name']?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="prestasi" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- JUMLAH PRESTASI -->

            <!-- JUMLAH PELANGGARAN -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id_pelanggaran) as a FROM tb_pelanggaran JOIN tb_siswa ON tb_pelanggaran.student_id = tb_siswa.id JOIN tb_kelas ON tb_pelanggaran.class_id = tb_kelas.id_kelas WHERE wali_name = '$id_student'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              mysqli_free_result($data);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Pelanggaran Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="pelanggaran" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- JUMLAH PELANGGARAN -->

        <?php }else{ ?>
            <!-- JUMLAH SISWA -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_siswa";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              // bebaskan memory
                mysqli_free_result($data);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="siswa" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- JUMLAH SISWA -->

            <!-- JUMLAH PRESTASI -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id_prestasi) as a FROM tb_prestasi";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              mysqli_free_result($data);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Prestasi Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="prestasi" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- JUMLAH PRESTASI -->

            <!-- JUMLAH PELANGGARAN -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id_pelanggaran) as a FROM tb_pelanggaran";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              mysqli_free_result($data);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Pelanggaran Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="pelanggaran" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- JUMLAH PELANGGARAN -->

            <!-- JUMLAH GURU -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gray-dark">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_guru";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              mysqli_free_result($data);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Guru</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>

                    </div>
                    <a href="guru" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- JUMLAH GURU -->
        <?php } ?>

        </div>


    </div>


    <!-- /.container-fluid -->
</div>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php";?>