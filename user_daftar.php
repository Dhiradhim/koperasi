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
                                $role = $_GET['role'];
                                $query = "SELECT u.role , a.* FROM anggota as a, users as u WHERE a.no_anggota=u.no_anggota AND role='$role'";
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Daftar <?=ucfirst($role)?></h2></center><br>
                            <a href="user_input.php?role=<?=$role?>"><button type="button" class="btn mb-1 btn-primary btn-sm">Tambah <?=ucfirst($role)?></button></a>
                            <a href="laporan_user_cetak.php?role=<?=$role?>" target="_blank"><button type="button" class="btn mb-1 btn-success btn-sm">Cetak Laporan</button></a><br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>No. Karyawan</th>
                                                <th>Nama Anggota</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>No. Hp</th>
                                                <th>Action</th>
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
                                                <td><?=$no_karyawan?></td>
                                                <td><?=$nama_anggota?></td>
                                                <td><?=$jk?></td>
                                                <td><?=$alamat?></td>
                                                <td><?=$nohp?></td>
                                                <td>
                                                <button type="button" class="btn mb-1 btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="user_edit.php?no_anggota=<?=$no_anggota?>&role=<?=$role?>">Edit</a> 
                                                    <a class="dropdown-item" href="delete_data.php?table=anggota&id=<?=$no_anggota?>" onclick="return confirm('Anda yakin akan menghapus Data ini?')">Delete</a>
                                                </td>
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
                                                <th>Nama Karyawan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>No. Hp</th>
                                                <th>Action</th>
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