<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="index.php" aria-expanded="false">
                            <i class="fa-solid fa-gauge"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label">Menu</li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="fa-solid fa-user"></i><span class="nav-text">Profil</span>
                        </a>
                    </li>
                    <?php if ($session_id=='1'){ ?>
                    <li>
                        <a href="anggota_daftar.php" aria-expanded="false">
                            <i class="fa-solid fa-users"></i><span class="nav-text">Anggota</span>
                        </a>
                    </li><?php } ?>
                    <li class="nav-label">Transaksi</li>
                    <li>
                        <a href="simpanan_daftar.php" aria-expanded="false">
                        <i class="fa-solid fa-vault"></i><span class="nav-text">Simpanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="pinjaman_daftar.php" aria-expanded="false">
                            <i class="fa-solid fa-hand-holding-dollar"></i><span class="nav-text">Pinjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="angsuran_daftar.php" aria-expanded="false">
                            <i class="fa-solid fa-money-bill-wave"></i><span class="nav-text">Pembayaran</span>
                        </a>
                    </li>
                    <li class="nav-label">Laporan</li>
                    <?php if ($session_id=='1'){ ?>
                        <li>
                        <a href="#" aria-expanded="false">
                            <i class="fa-solid fa-users"></i><span class="nav-text">Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="fa-solid fa-vault"></i><span class="nav-text">Simpanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="fa-solid fa-hand-holding-dollar"></i><span class="nav-text">Pinjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="fa-solid fa-money-bill-wave"></i><span class="nav-text">Pembayaran</span>
                        </a>
                    </li><?php } ?>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="fa-solid fa-file-invoice-dollar"></i><span class="nav-text">Laporan Keuangan</span>
                        </a>
                    </li>
                    <li class="nav-label">Logout</li>
                    <li>
                        <a href="logout.php" aria-expanded="false">
                            <i class="fa-solid fa-key"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->