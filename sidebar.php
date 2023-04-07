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
                        <a href="profil.php" aria-expanded="false">
                            <i class="fa-solid fa-user"></i><span class="nav-text">Profil</span>
                        </a>
                    </li>
                    <?php if ($session_role=='admin'){ ?>
                    
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-users"></i><span class="nav-text">User</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./user_daftar.php?role=admin">Administrator</a></li>
                            <li><a href="./user_daftar.php?role=bendahara">Bendahara</a></li>
                            <li><a href="./user_daftar.php?role=anggota">Anggota</a></li>
                        </ul>
                    </li><?php } 
                    if ($session_role=='admin' OR $session_role=='anggota'){?>
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
                    <?php } ?>
                    <li class="nav-label">Laporan</li>
                    
                    <li>
                        <a href="laporan_keuangan.php?id=<?php if($session_role=='admin' OR $session_role=='bendahara'){ echo 'all';} else { echo $session_id;} ?>" aria-expanded="false">
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