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
                                if ($session_id=='1'){ 
                                    $query = "SELECT distinct p.*, a.nama_anggota as nama FROM pinjaman as p, anggota as a WHERE p.no_anggota=a.no_anggota";
                                } else {
                                    $query = "SELECT distinct p.*, a.nama_anggota as nama FROM pinjaman as p, anggota as a WHERE p.no_anggota=a.no_anggota AND p.no_anggota='$session_id'";
                                }
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Daftar Pinjaman</h2></center><br>
                            <a href="pinjaman_input.php"><button type="button" class="btn mb-1 btn-primary btn-sm">Input Pinjaman</button></a><br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Pinjaman</th>
                                                <th>Tanggal</th>
                                                <th>Lama Bayar</th>
                                                <th>Jumlah Pinjaman</th>                                                
                                                <th>Jumlah Pembayaran</th>
                                                <th>Angsuran</th>
                                                <th>Status</th>
                                                <?php if ($session_id=='1'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
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
                                                <td><?=$jml_pinjaman2?></td>
                                                <td><?=$totalbayar?></td>
                                                <td><?=$angsuran_ke?> kali</td>
                                                <td><?=status($status)?></td>
                                                <?php if ($session_id=='1'){ ?>
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
                                            ?>
                                        <tfoot>
                                            <tr>
                                            <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Pinjaman</th>
                                                <th>Tanggal</th>
                                                <th>Lama Bayar</th>
                                                <th>Jumlah Pinjaman</th>                                                
                                                <th>Jumlah Pembayaran</th>
                                                <th>Angsuran</th>
                                                <th>Status</th>
                                                <?php if ($session_id=='1'){ ?>
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