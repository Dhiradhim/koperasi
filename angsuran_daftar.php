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
                                    $query = "SELECT a.*, an.nama_anggota, p.tgl_pinjaman FROM angsuran as a, anggota as an, pinjaman as p WHERE a.no_anggota=an.no_anggota AND p.no_pinjaman=a.no_pinjaman";
                                } else {   
                                    $query = "SELECT a.*, an.nama_anggota, p.tgl_pinjaman FROM angsuran as a, anggota as an, pinjaman as p WHERE a.no_anggota=an.no_anggota AND p.no_pinjaman=a.no_pinjaman AND a.no_anggota='$session_id'";
                                }
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Daftar Pembayaran</h2></center><br>
                            <?php if ($session_role=='admin' OR $session_role=='bendahara'){ ?>
                            <a href="angsuran_input.php"><button type="button" class="btn mb-1 btn-primary btn-sm">Tambah Pembayaran</button></a>
                            <?php } ?>
                            <a href="laporan_angsuran_cetak.php" target="_blank"><button type="button" class="btn mb-1 btn-success btn-sm">Cetak Laporan</button></a><br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Pinjaman</th>
                                                <th>No. Angsuran</th>
                                                <th>Tanggal Angsuran</th>
                                                <th>Angsuran Ke</th>
                                                <th>Jumlah Angsuran</th>
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
                                                <?php if ($session_role=='admin'){ ?>
                                                <td></td>                                         
                                                <?php  }
                                            } else {
                                                do { 
                                                foreach($data as $key=>$value) {$$key=$value;}
                                            ?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$no_anggota?></td>
                                                <td><?=$nama_anggota?></td>
                                                <td><?=kode_pinjam($no_pinjaman,$tgl_pinjaman)?></td>
                                                <td><?=kode_angsuran($id,$tgl_angsuran)?></td>
                                                <td><?=$tgl_angsuran?></td>
                                                <td><?=$angsuran_ke?></td>
                                                <td><?=rp($jml_angsuran)?></td>
                                                <?php if ($session_role=='admin'){ ?>
                                                <td>
                                                <button type="button" class="btn mb-1 btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="angsuran_edit.php?id=<?=$id?>">Edit</a> 
                                                    <a class="dropdown-item" href="delete_data.php?table=angsuran&id=<?=$id?>" onclick="return confirm('Anda yakin akan menghapus Data ini?')">Delete</a>
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
                                                <th>No. Angsuran</th>
                                                <th>Angsuran Ke</th>
                                                <th>Tanggal Angsuran</th>
                                                <th>Jumlah Angsuran</th>
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