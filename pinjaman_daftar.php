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
                                if ($session_role=='admin' OR $session_role=='bendahara' OR $session_role=='kepala koperasi'){ 
                                    $query = "SELECT distinct p.*, a.nama_anggota as nama FROM pinjaman as p, anggota as a WHERE p.no_anggota=a.no_anggota";
                                } else {
                                    $query = "SELECT distinct p.*, a.nama_anggota as nama FROM pinjaman as p, anggota as a WHERE p.no_anggota=a.no_anggota AND p.no_anggota='$session_id'";
                                }
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Daftar Pinjaman</h2></center><br>
                            <?php
                            if ($session_role=='admin' OR $session_role=='bendahara' OR $session_role=='anggota'){ ?>
                            <a href="pinjaman_input.php"><button type="button" class="btn mb-1 btn-primary btn-sm">Input Pinjaman</button></a>
                            <?php } ?>
                            <a href="laporan_pinjaman_cetak.php" target="_blank"><button type="button" class="btn mb-1 btn-success btn-sm">Cetak Laporan</button></a><br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Pinjaman</th>
                                                <th>Tanggal</th>
                                                <th>Lama Pinjaman</th>
                                                <th>Bunga</th>
                                                <th>Jumlah Pinjaman</th>                                                
                                                <th>Jumlah Pembayaran</th>
                                                <th>Angsuran</th>
                                                <th>Status</th>
                                                <th>Status Pembayaran</th>
                                                <?php if ($session_role=='admin'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if (empty($data['no_anggota'])){
                                                ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td><?php if ($session_role=='admin'){ ?>                                                
                                                <td></td>                                                
                                                <?php  }
                                            } else {
                                            do { 
                                                $totalbayar=totalbayar($data['no_pinjaman']);
                                                $angsuran_ke=angsuran_ke($data['no_pinjaman']);
                                                foreach($data as $key=>$value) {$$key=$value;}
                                                $jml_pinjaman2 = rp($jml_pinjaman);
                                            ?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$no_anggota?></td>
                                                <td><?=$nama?></td>
                                                <td><?=kode_pinjam($no_pinjaman,$tgl_pinjaman)?></td>
                                                <td><?=$tgl_pinjaman?></td>
                                                <td><?=$lama_pinjaman?> bulan</td>
                                                <td><?=$bunga?>%</td>
                                                <td><?=$jml_pinjaman2?></td>
                                                <td><?=$totalbayar?></td>
                                                <td><?=$angsuran_ke?> kali</td>
                                                <td><?=status($status)?></td>
                                                <td><?=status_pinjaman($no_pinjaman)?></td>
                                                <?php if ($session_role=='admin'){ ?>
                                                <td>
                                                <button type="button" class="btn mb-1 btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="pinjaman_acc.php?no_pinjaman=<?=$no_pinjaman?>&action=acc">Accept</a> 
                                                    <a class="dropdown-item" href="pinjaman_acc.php?no_pinjaman=<?=$no_pinjaman?>&action=deny">Deny</a> 
                                                    <a class="dropdown-item" href="pinjaman_edit.php?no_pinjaman=<?=$no_pinjaman?>">Edit</a> 
                                                    <a class="dropdown-item" href="delete_data.php?table=pinjaman&id=<?=$no_pinjaman?>" onclick="return confirm('Anda yakin akan menghapus Data ini?')">Delete</a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php 
                                                $no++; 
                                                } 
                                                while ($data = mysqli_fetch_array($sql));
                                            }
                                            ?>
                                        <tfoot>
                                            <tr>
                                            <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Pinjaman</th>
                                                <th>Tanggal</th>
                                                <th>Lama Pinjaman</th>
                                                <th>Bunga</th>
                                                <th>Jumlah Pinjaman</th>                                                
                                                <th>Jumlah Pembayaran</th>
                                                <th>Angsuran</th>
                                                <th>Status</th>
                                                <th>Status Pembayaran</th>
                                                <?php if ($session_role=='admin'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
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