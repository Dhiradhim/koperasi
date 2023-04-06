<?php
include ('head.php');
include ('sidebar.php');
if ($session_role=='admin' OR $session_role=='bendahara'){
// DASHBOARD ANGGOTA
$query_anggota = "SELECT COUNT(*) FROM anggota WHERE id > 1";
$sql_anggota = mysqli_query($con, $query_anggota);
$data_anggota = mysqli_fetch_array($sql_anggota);

// DASHBOARD SIMPANAN
$query_simpanan = "SELECT SUM(jml_simpanan) as jml FROM simpanan";
$sql_simpanan = mysqli_query($con, $query_simpanan);
$data_simpanan = mysqli_fetch_array($sql_simpanan);
$total_simpanan = $data_simpanan['jml'];

// DASHBOARD PINJAMAN
$query_pinjaman = "SELECT SUM(jml_pinjaman) as jml FROM pinjaman WHERE status='1'";
$sql_pinjaman = mysqli_query($con, $query_pinjaman);
$data_pinjaman = mysqli_fetch_array($sql_pinjaman);
$total_pinjaman = $data_pinjaman['jml'];

// DASHBOARD LUNAS/BELOM LUNAS
$query_pinjam = "SELECT no_pinjaman FROM pinjaman WHERE status='1'";
$sql_pinjam = mysqli_query($con, $query_pinjam);
$data_pinjam = mysqli_fetch_array($sql_pinjam);
$belum_lunas = 0;
$lunas = 0;
do{
    $no_pinjam = $data_pinjam['no_pinjaman'];
    $query_lunas = "SELECT no_pinjaman, jml_pinjaman, (SELECT SUM(jml_angsuran) as jml FROM angsuran WHERE no_pinjaman='$no_pinjam') as angsuran FROM pinjaman WHERE no_pinjaman='$no_pinjam'";
    $sql_lunas = mysqli_query($con, $query_lunas);
    $data_lunas = mysqli_fetch_array($sql_lunas);
    if (empty($data_lunas['jml_pinjaman'])){

    } else if ($data_lunas['jml_pinjaman']==$data_lunas['angsuran']){
        $lunas = $lunas + 1;
    } else {
        $belum_lunas = $belum_lunas + 1;
    }
} while ($data_pinjam = mysqli_fetch_array($sql_pinjam));
} else {
// DASHBOARD SIMPANAN
$query_simpanan = "SELECT SUM(jml_simpanan) as jml FROM simpanan WHERE no_anggota='$session_id'";
$sql_simpanan = mysqli_query($con, $query_simpanan);
$data_simpanan = mysqli_fetch_array($sql_simpanan);
$total_simpanan = $data_simpanan['jml'];

// DASHBOARD PINJAMAN
$query_pinjaman = "SELECT SUM(jml_pinjaman) as jml FROM pinjaman WHERE no_anggota='$session_id' AND status='1'";
$sql_pinjaman = mysqli_query($con, $query_pinjaman);
$data_pinjaman = mysqli_fetch_array($sql_pinjaman);
$total_pinjaman = $data_pinjaman['jml'];

// DASHBOARD ANGSURAN
$query_angsuran = "SELECT SUM(jml_angsuran) as jml FROM angsuran WHERE no_anggota='$session_id'";
$sql_angsuran = mysqli_query($con, $query_angsuran);
$data_angsuran = mysqli_fetch_array($sql_angsuran);
$total_angsuran = $data_angsuran['jml'];
}
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                </div>
            </div>
            <!-- row -->
           <?php if ($session_role=='admin' OR $session_role=='bendahara'){ ?> 
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Anggota</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$data_anggota['COUNT(*)']?></h2>
                                    <p class="text-white mb-0">orang</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Simpanan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=rp($total_simpanan)?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-vault"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Pinjaman</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=rp($total_pinjaman)?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pinjaman Sudah Lunas</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$lunas?></h2>
                                    <p class="text-white mb-0">pinjaman</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-5">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pinjaman Belum Lunas</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$belum_lunas?></h2>
                                    <p class="text-white mb-0">pinjaman</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
                <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Simpanan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=rp($total_simpanan)?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-vault"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Pinjaman</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=rp($total_pinjaman)?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Angsuran</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=rp($total_angsuran)?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
<?php
include ('footer.php');
?>
</body>

</html>