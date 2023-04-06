<?php
include ('head.php');
include ('sidebar.php');
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            <!-- QUERY -->
                            <?php
                                $no = 1;
                                $id = $_GET['id'];
                                if ($id=='all') {
                                    $query = "SELECT u.role , a.* FROM anggota as a, users as u WHERE a.no_anggota=u.no_anggota AND role='anggota'";
                                } else {
                                    $query = "SELECT * FROM anggota WHERE no_anggota='$id'";
                                }
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Laporan Keuangan</h2></center><br>
                            <a href="laporan_keuangan_cetak.php?id=<?=$id?>" target="_BLANK"><button type="button" class="btn mb-1 btn-primary btn-sm">Cetak Laporan</button></a><br><br>
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>No. Karyawan</th>
                                                <th>Nama Anggota</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Total Simpanan</th>
                                                <th>Total Pinjaman</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            do { 
                                                foreach($data as $key=>$value) {$$key=$value;}
                                            ?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$no_anggota?></td>
                                                <td><?=$no_karyawan?></td>
                                                <td><?=$nama_anggota?></td>
                                                <td><?=$jk?></td>
                                                <td><?=rp(jml_simpanan($no_anggota))?></td>
                                                <td><?=rp(jml_pinjaman($no_anggota))?></td>
                                            <?php 
                                                $no++; 
                                                } 
                                                while ($data = mysqli_fetch_array($sql));
                                            ?>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Total Simpanan</th>
                                                <th>Total Pinjaman</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
<?php
include ('footer.php');
?>
</body>

</html>