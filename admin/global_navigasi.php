<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Main Menu</li>
        <?php
        if ($level == 'Orang Tua Wali') {?>

        <li class="nav-item has-treeview <?php if($halaman == 'Informasi Profile Siswa') echo" menu-open" ?>">
            <a href="profile-siswa" class="nav-link <?php if($halaman == 'Informasi Profile Siswa') echo"active" ?>">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Profil Siswa
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview <?php if($halaman == 'Prestasi Siswa') echo"menu-open" ?>">
            <a href="prestasi-anak" class="nav-link <?php if($halaman == 'Prestasi Siswa') echo"active" ?>">
                <i class="nav-icon far fa-address-card"></i>
                <p>
                    Prestasi Anak
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview <?php if($halaman == 'Pelanggaran Siswa') echo"menu-open" ?>">
            <a href="pelanggaran-anak" class="nav-link <?php if($halaman == 'Pelanggaran Siswa') echo"active" ?>">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Pelanggaran Anak
                </p>
            </a>
        </li>

        <li
            class="nav-item has-treeview <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'active'?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Pengaturan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul
                class="nav nav-treeview <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'menu-open'.' '.'style="display: block;"'?>">
                <li class="nav-item <?php if($halaman == 'Profile') echo 'menu-open'?>">
                    <a href="profile" class="nav-link <?php if($halaman == 'Profile') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </li>

        <?php }elseif ($level == 'Wali Kelas') {?>
        <li class="nav-item has-treeview menu-open">
            <a href="index" class="nav-link <?php if($halaman == 'dashboard') echo"active" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview <?php if($halaman == 'Data Semua Siswa') echo"menu-open" ?>">
            <a href="siswa" class="nav-link <?php if($halaman == 'Data Semua Siswa') echo"active" ?>">
                <i class="nav-icon far fa-address-book"></i>
                <p>
                    List Siswa
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview <?php if($halaman == 'List Semua Prestasi Siswa') echo"menu-open" ?>">
            <a href="prestasi" class="nav-link <?php if($halaman == 'List Semua Prestasi Siswa') echo"active" ?>">
                <i class="nav-icon far fa-address-card"></i>
                <p>
                    List Prestasi Siswa
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview <?php if($halaman == 'List Semua Pelanggaran') echo"menu-open" ?>">
            <a href="pelanggaran" class="nav-link <?php if($halaman == 'List Semua Pelanggaran') echo"active" ?>">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    List Pelanggaran Siswa
                </p>
            </a>
        </li>

        <li
            class="nav-item has-treeview <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'active'?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Pengaturan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul
                class="nav nav-treeview <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'menu-open'.' '.'style="display: block;"'?>">
                <li class="nav-item <?php if($halaman == 'Profile') echo 'menu-open'?>">
                    <a href="profile" class="nav-link <?php if($halaman == 'Profile') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </li>

        <?php }else{ ?>
        <li class="nav-item has-treeview menu-open">
            <a href="index" class="nav-link <?php if($halaman == 'dashboard') echo"active" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li
            class="nav-item has-treeview <?php if($halaman == 'List Semua Prestasi Siswa' OR $halaman == 'List Semua Pelanggaran' OR $halaman == 'Edit Data Pelanggaran' OR $halaman == 'Add Data Pelanggaran' OR $halaman == 'Edit Data Prestasi' OR $halaman == 'Add Data Prestasi') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'List Semua Prestasi Siswa' OR $halaman == 'List Semua Pelanggaran' OR $halaman == 'Edit Data Pelanggaran' OR $halaman == 'Add Data Pelanggaran' OR $halaman == 'Edit Data Prestasi' OR $halaman == 'Add Data Prestasi') echo "active" ?>">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Data Akademik
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="prestasi"
                        class="nav-link <?php if($halaman == 'List Semua Prestasi Siswa' OR $halaman == 'Edit Data Prestasi' OR $halaman == 'Add Data Prestasi') echo "active" ?>">
                        <i class="far fa-circle nav-icon-small" style="margin-left: 7px;"></i>
                        <p>Prestasi</p>
                    </a>
                    <a href="pelanggaran"
                        class="nav-link <?php if($halaman == 'List Semua Pelanggaran' OR $halaman == 'Edit Data Pelanggaran' OR $halaman == 'Add Data Pelanggaran') echo "active" ?>">
                        <i class="far fa-circle nav-icon-small" style="margin-left: 7px;"></i>
                        <p>Pelanggaran</p>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="nav-item has-treeview <?php if($halaman == 'Data Semua Guru' OR $halaman == 'Data Semua Kelas' OR $halaman == 'Data Semua Siswa' OR $halaman == 'Edit Data Siswa' OR $halaman == 'Add Data Siswa') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'Data Semua Guru' OR $halaman == 'Data Semua Kelas' OR $halaman == 'Data Semua Siswa' OR $halaman == 'Edit Data Siswa' OR $halaman == 'Add Data Siswa') echo "active" ?>">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                    Data Master
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="kelas" class="nav-link <?php if($halaman == 'Data Semua Kelas') echo "active" ?>">
                        <i class="far fa-circle nav-icon-small" style="margin-left: 7px;"></i>
                        <p>Kelas</p>
                    </a>
                    <a href="siswa"
                        class="nav-link <?php if($halaman == 'Data Semua Siswa' OR $halaman == 'Edit Data Siswa' OR $halaman == 'Add Data Siswa') echo "active" ?>">
                        <i class="far fa-circle nav-icon-small" style="margin-left: 7px;"></i>
                        <p>Siswa</p>
                    </a>
                    <a href="guru" class="nav-link <?php if($halaman == 'Data Semua Guru') echo "active" ?>">
                        <i class="far fa-circle nav-icon-small" style="margin-left: 7px;"></i>
                        <p>Guru</p>
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li class="nav-item">
            <a href="laporan" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li> -->

        <li
            class="nav-item has-treeview <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'active'?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Pengaturan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul
                class="nav nav-treeview <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa' OR $halaman == 'Profile') echo 'menu-open'.' '.'style="display: block;"'?>">
                <li class="nav-item <?php if($halaman == 'Profile') echo 'menu-open'?>">
                    <a href="profile" class="nav-link <?php if($halaman == 'Profile') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li
                    class="nav-item <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'Data Website') echo 'menu-open'?>">
                    <a href="website" class="nav-link <?php if($halaman == 'Data Website') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Website</p>
                    </a>
                </li>

                <li
                    class="nav-item <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa') echo 'menu-open'?>">
                    <a href="#"
                        class="nav-link <?php if($halaman == 'List Pengguna Admin' OR $halaman == 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Pengguna
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul
                        class="nav nav-treeview <?php if($halaman == 'List Pengguna Admin' OR $halaman === 'List Pengguna Walikelas' OR $halaman == 'List Pengguna OrangTua Siswa') echo 'menu-open'.' '.'style="display: block;"'?>">

                        <li class="nav-item">
                            <a href="user-administrator"
                                class="nav-link <?php if($halaman == 'List Pengguna Admin') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Administrator</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="user-walikelas"
                                class="nav-link <?php if($halaman == 'List Pengguna Walikelas') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Wali Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="user-orangtua-siswa"
                                class="nav-link <?php if($halaman == 'List Pengguna OrangTua Siswa') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Orang Tua Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <?php } ?>


        <!-- <li class="nav-header">LABELS</li> -->
        <li class="" style="border-bottom: 1px solid #4f5962;"></li>
        <li class="nav-item">
            <a href="../logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt mr-2"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>

</nav>
<!-- /.sidebar-menu -->

</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo ucfirst($halaman); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active"> <?php echo ucfirst($halaman); ?></li>
                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->