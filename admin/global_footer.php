<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y'); ?> <a href="">Sistem Informasi Monitoring Siswa</a>.</strong> All rights
  reserved.
  <div class="float-right d-none d-sm-inline-block">
    <?php
    foreach ($quer as $data) : 
    ?>
    <b><?= $data['school_name']?></b>
    
            <?php
                endforeach; 
                mysqli_free_result($quer);?>
  </div>
</footer>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/js/jquery.chained.min.js"></script>
<script>
  $("#class_name").chained("#sub_class");
</script>
<script>
  $("#name").chained("#class_name");
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/js/sweetalert/sweetalert2.all.min.js"></script>
<script src="../assets/js/myscript.js"></script>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<!-- <script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
<!-- <script src="../assets/plugins/chart.js/Chart.min.js"></script> -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- <script src="../assets/plugins/select2/js/select-script.php"></script> -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>
<!-- <script src="../assets/dist/js/pages/dashboard3.js"></script> -->
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- <script src="../assets/plugins/dropzone/min/dropzone.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>

<script>
    $(function () {
        $('#myTable').DataTable({
        "sDom": 'lrtip',
        "paging" : true,
        "responsive": true,
        "autoWidth": false,
        "autoWidth": false,
        "info": false,
        "ordering": true,
        "lengthChange": false,
        });   
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
        });
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 20,
        });
        $("#example3").DataTable({
            // "responsive": true,
            // "autoWidth": false,
            "pageLength": 10,
            "scrollX": true,
        });
        $('#example20').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
    window.setTimeout(function () {
        $(".hilang").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 5000);
</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script type="text/javascript">
$(document).ready(function () {
  $('#Siswadetail').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'siswa-detail.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});

$(document).ready(function () {
  $('#Siswaedit').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'siswa-edit.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
</script>


<script type="text/javascript">
$(document).ready(function () {
  $('#Kelasdetail').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'kelas-detail.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#Kelasedit').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'kelas-edit.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#kelasAdd').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'kelas-add.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function () {
  $('#Gurudetail').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'guru-detail.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#Guruedit').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'guru-edit.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#GuruAdd').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'guru-add.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
</script>


<script type="text/javascript">
$(document).ready(function () {
  $('#Pelanggarandetail').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'pelanggaran-detail.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#Pelanggaranedit').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'pelanggaran-edit.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#PelanggaranAdd').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'pelanggaran-add.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function () {
  $('#Prestasidetail').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'prestasi-detail.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#Prestasiedit').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'prestasi-edit.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#PrestasiAdd').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'prestasi-add.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function () {
  $('#Penggunadetail').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'user-detail.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#Penggunaedit').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'user-edit.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#Penggunaeditwali').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'user-editwali.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});
$(document).ready(function () {
  $('#UserAdd').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'user-add.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});

$(document).ready(function () {
  $('#PenggunaAddWalikelas').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    //menggunakan fungsi ajax untuk pengambilan data
    $.ajax({
      type: 'post',
      url: 'user-add-walikelas.php',
      data: 'rowid=' + rowid,
      success: function (data) {
        $('.fetched-dataedit').html(data); //menampilkan data ke dalam modal
      }
    });
  });
});

</script>

</body>
</html>