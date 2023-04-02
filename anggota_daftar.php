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
                                $query = "SELECT * FROM anggota WHERE no_anggota > 1";
                                $sql = mysqli_query($con, $query);
                                $data = mysqli_fetch_array($sql);
                            ?>
                            <!-- QUERY -->

                            <center><h2>Daftar Anggota</h2></center><br>
                            <a href="anggota_input.php"><button type="button" class="btn mb-1 btn-primary btn-sm">Tambah Anggota</button></a><br><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>No. Hp</th>
                                                <th>Action</th>
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
                                                <td><?=$jk?></td>
                                                <td><?=$alamat?></td>
                                                <td><?=$nohp?></td>
                                                <td>
                                                <button type="button" class="btn mb-1 btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="anggota_edit.php?no_anggota=<?=$no_anggota?>">Edit</a> 
                                                    <a class="dropdown-item" href="delete_data.php?table=anggota&id=<?=$no_anggota?>" onclick="return confirm('Anda yakin akan menghapus Data ini?')">Delete</a>
                                                </td>
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