<?php
//buat koneksi ke mysql dari file config.php
if (isset($_POST["submit"])) {
  // form telah disubmit, proses data
  // ambil nilai form
$username = htmlentities(strip_tags(trim($_POST["username"])));
$password = htmlentities(strip_tags(trim($_POST["password"])));
include("koneksi.php");
session_start();
//filter dengan mysqli_real_escape_string
$username = $koneksi->escape_string($username);
$password = $koneksi->escape_string($password);

//generate hashing
$password_sha1 = md5(sha1(md5($password)));
//   $password_sha1 = sha1($password);

// cek apakah username dan password ada di tabel 
$query = "SELECT * FROM tb_pengguna WHERE username = '$username' AND password = '$password_sha1'";
$result = $koneksi->query($query);
$row = $result->num_rows;
$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE username = '$username'");
$akun = $sql->fetch_assoc();

  if ($row > 0 ){ // jika data ada
    $akun = $result->fetch_assoc();
     // bebaskan memory 
    mysqli_free_result($result);
    
      // tutup koneksi dengan database MySQL
    mysqli_close($koneksi);
    $_SESSION["username"] = $akun["username"];
    $_SESSION["full_name"] = $akun["full_name"];
    $_SESSION["level"] = $akun["level"];
    $_SESSION["id_user"] = $akun['id'];
    $_SESSION['foto'] = $akun['foto'];
    $_SESSION['student_id'] = $akun['student_id'];
    // $_SESSION['nis'] = $akun['nis'];
    // $_SESSION['id_anggota'] = $akun['id_anggota'];

    $level = $akun["level"];
    if($level == 'Administrator'){
      // echo $level;
      echo "<script> document.location.href='admin/index'; </script>";
    }elseif($level == 'Wali Kelas'){
      // echo $level;
        echo "<script> document.location.href='admin/index'; </script>";
    }else{
      echo "<script> document.location.href='admin/profile-siswa'; </script>";
    }


}else{
    $_SESSION['pesan'] = '<div class="alert alert-danger alert-dismissible">
    <h5> Alert!</h5>
    Username dan Password Tidak ditemukan
    </div>';
}
}
else{
  $username = "";
  $password = "";
}
include("koneksi.php");
$quer = $koneksi->query("SELECT * FROM tb_website");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login | Sistem Informasi Monitoring Siswa</title>

  <link href="assets/assets-login/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/assets-login/all.min.css">
  <link rel="stylesheet" href="assets/assets-login/css/style.css">

  <?php foreach ($quer as $data) : ?>
  <link rel="icon" href="./img/<?= $data['logo']?>" type="image/x-icon" />


  <!-- <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
</head>

<body>
  <div class="container-fluid form-container">
    <div class="container login-container">
      <div class="row">
        <div class="col-md-5 content-part">
          <h4 class="logo">Login Account</h4>

          <img src="img/login-banner.png" alt="">

          <h2>SIMS - Sistem Informasi Monitoring Siswa.</h2>
          <p>Don’t waste time on tedious manual tasks. Let Automation do it for you. Simplify workflows,
            reduce errors, and save time for solving more important problems.</p>
        </div>
        <div class="col-md-7 form-part">
          <div class="row">
            <!-- <p class="signinlink">Dont have an account <a href="index.html">Sign Up</a></p> -->

            <div class="col-lg-8 col-md-11 login formcol mx-auto">
              <h3>
                <b>Sign IN</b>
                <br>
                <span class="display-6" style="font-size: 20px;"> Sistem Informasi Monitoring Siswa </span>
                <br>
                <div class="lead" style="font-size: 20px;">
                <?= $data['school_name']?>
                </div>
              </h3>
              <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo $pesan = $_SESSION['pesan'];
                    
                }
                //mengatur session pesan menjadi kosong
                $_SESSION['pesan'] = '';
              ?>
              <form action="" method="post">
                <div class="form-floating mb-3">
                  <input name="username" type="username" class="form-control" id="floatingInput"
                    placeholder="Enter Email Address" value="<?= $username ?>">
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                  <input name="password" type="password" class="form-control" id="floatingPassword"
                    placeholder="Password" value="<?= $password ?>">
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                  <input type="submit" name="submit" value="Log In" class="btn btn-block btn-danger">
                  <!-- <button class="btn btn-primary">Login</button> -->
                </div>
                </form>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</body>

</html