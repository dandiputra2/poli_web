<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <center>
            <span class="brand-text font-weight-light">POLIKLINIK</span>
        </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php
        require 'config/koneksi.php';
        if ($_SESSION['akses'] == 'admin') {
            $tampilData = array(
                'nama' => 'Admin'
            );
        } else if ($_SESSION['akses'] == 'dokter') {
            $getData = mysqli_query($mysqli, "SELECT * FROM dokter WHERE id = '$id_dokter'");
            $tampilData = mysqli_fetch_assoc($getData);
        } else if ($_SESSION['akses'] == 'pasien') {
            $getData = mysqli_query($mysqli, "SELECT * FROM pasien WHERE id = '$idPasien'");
            $tampilData = mysqli_fetch_assoc($getData);
        }
        $userName = htmlspecialchars($tampilData['nama'], ENT_QUOTES, 'UTF-8');
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                if ($_SESSION['akses'] == "admin") {
                    echo <<<HTML
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="assets/AdminLTE/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{$userName}</a>
                        </div>
                    </div>
                    <li class="nav-item">
                        <a href="tampilDashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilDokter.php" class="nav-link">
                            <i class="fas fa-solid fa-user-nurse nav-icon"></i>
                            <p>Dokter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilPoli.php" class="nav-link">
                            <i class="fas fa-solid fa-hospital nav-icon"></i>
                            <p>Poli</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilObat.php" class="nav-link ">
                            <i class="fas fa-solid fa-pills nav-icon"></i>
                            <p>Obat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilPasien.php" class="nav-link">
                            <i class="fas fa-solid fa-user nav-icon"></i>
                            <p>Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    HTML;
                } else if ($_SESSION['akses'] == "dokter") {
                    echo <<<HTML
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="assets/AdminLTE/dist/img/user7-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info d-flex justify-content-between align-items-center" style="width: 100%;">
                            <a href="#" class="d-block">{$userName}</a>
                            <span class="badge badge-warning">Dokter</span>
                        </div>
                    </div>
                    <li class="nav-item">
                        <a href="tampilDashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilJadwal.php" class="nav-link">
                            <i class="fas fa-notes-medical nav-icon"></i>
                            <p>Jadwal Periksa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilPeriksa.php" class="nav-link">
                            <i class="fas fa-stethoscope nav-icon"></i>
                            <p>Periksa Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilRiwayat.php" class="nav-link">
                            <i class="fas fa-receipt nav-icon"></i>
                            <p>Riwayat Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilProfil.php" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    HTML;
                }
                 else if ($_SESSION['akses'] == "pasien") {
                    $userName = htmlspecialchars($tampilData['nama'], ENT_QUOTES, 'UTF-8');
                    echo <<<HTML
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="assets/AdminLTE/dist/img/user7-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info d-flex justify-content-between align-items-center" style="width: 100%;">
                            <a href="#" class="d-block">{$userName}</a>
                            <span class="right badge badge-warning">Pasien</span>
                        </div>
                    </div>                    
                    <li class="nav-item">
                        <a href="tampilDashboard.php" class="nav-link ">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tampilDaftarPoli.php" class="nav-link">
                            <i class="fas fa-solid fa-hospital nav-icon"></i>
                            <p>Poli</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    HTML;
                }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

