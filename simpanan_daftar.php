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
                                if ($session_role=='admin' OR $session_role=='bendahara'){
                                    $query = "SELECT distinct s.*, a.nama_anggota as nama FROM simpanan as s, anggota as a WHERE s.no_anggota=a.no_anggota";
                                } else {
                                    $query = "SELECT distinct s.*, a.nama_anggota as nama FROM simpanan as s, anggota as a WHERE s.no_anggota=a.no_anggota AND s.no_anggota='$session_id'";
                                }
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Daftar simpanan</h2></center><br>
                            <?php if ($session_role=='admin' OR $session_role=='bendahara'){ ?>
                            <a href="simpanan_input.php"><button type="button" class="btn mb-1 btn-primary btn-sm">Input simpanan</button></a>
                            <?php } ?>
                            <a href="laporan_simpanan_cetak.php" target="_blank"><button type="button" class="btn mb-1 btn-success btn-sm">Cetak Laporan</button></a><br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Simpanan</th>
                                                <th>Tanggal Simpanan</th>
                                                <th>Jumlah Simpanan</th> 
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
                                                <?php if ($session_role=='admin'){ ?>
                                                <td></td>                                             
                                                <?php  }
                                            } else {
                                                do { 
                                                foreach($data as $key=>$value) {$$key=$value;}
                                                $jml_simpanan2 = rp($jml_simpanan);
                                            ?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$no_anggota?></td>
                                                <td><?=$nama?></td>
                                                <td><?=kode_simpan($id,$tgl_simpanan)?></td>
                                                <td><?=$tgl_simpanan?></td>
                                                <td><?=$jml_simpanan2?></td>
                                                <?php if ($session_role=='admin'){ ?>
                                                <td>
                                                <button type="button" class="btn mb-1 btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="simpanan_edit.php?id=<?=$id?>">Edit</a> 
                                                    <a class="dropdown-item" href="delete_data.php?table=simpanan&id=<?=$id?>" onclick="return confirm('Anda yakin akan menghapus Data ini?')">Delete</a>
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
                                                <th>No. Simpanan</th>
                                                <th>Tanggal Simpanan</th>
                                                <th>Jumlah Simpanan</th>
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