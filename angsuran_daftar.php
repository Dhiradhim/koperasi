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
                                    $query = "SELECT a.*, an.nama_anggota FROM angsuran as a, anggota as an WHERE a.no_anggota=an.no_anggota";
                                } else {   
                                    $query = "SELECT a.*, an.nama_anggota FROM angsuran as a, anggota as an WHERE a.no_anggota=an.no_anggota AND a.no_anggota='$session_id'";
                                }
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Daftar Pembayaran</h2></center><br>
                            <?php if ($session_id=='1'){ ?>
                            <a href="angsuran_input.php"><button type="button" class="btn mb-1 btn-primary btn-sm">Tambah Pembayaran</button></a><br><br>
                            <?php } ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Pinjaman</th>
                                                <th>Tanggal Angsuran</th>
                                                <th>Jumlah Angsuran</th>
                                                <?php if ($session_id=='1'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
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
                                                <td><?=$nama_anggota?></td>
                                                <td><?=$no_pinjaman?></td>
                                                <td><?=$tgl_angsuran?></td>
                                                <td><?=rp($jml_angsuran)?></td>
                                                <?php if ($session_id=='1'){ ?>
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
                                            ?>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>No. Pinjaman</th>
                                                <th>Tanggal Angsuran</th>
                                                <th>Jumlah Angsuran</th>
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