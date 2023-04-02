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
                                    $no_anggota = $_GET['no_anggota'];
                                    $query = "SELECT a.*, u.user_id FROM users as u, anggota as a WHERE a.no_anggota='$no_anggota'";
                                    $sql = mysqli_query($con, $query);
                                    $data = mysqli_fetch_array($sql);
                                    foreach($data as $key=>$value) {$$key=$value;}
                                ?>
                                <!-- QUERY -->
                                <center><h1>Edit Detail Anggota</h1></center>
                                <br><br>
                                <div class="basic-form">
                                    <form method="post" action="anggota_edit_save.php">
                                        <h4 class="card-title">User Account</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Username</label>
                                                <input type="text" disabled required class="form-control" name="user_id" placeholder="Username" value="<?=$user_id?>">
                                                <input type="text" hidden required class="form-control" name="no_anggota" placeholder="Username" value="<?=$no_anggota?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <br><br>
                                        <h4 class="card-title">Detail Anggota</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Nama Anggota</label>
                                                <input type="text" required class="form-control" name="nama_anggota" placeholder="Nama Lengkap" value="<?=$nama_anggota?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" required id="sel1" name="jk">
                                                <option <?php if ($jk=='Laki-laki'){ echo 'selected'; }?>value="Laki-laki">Laki-laki</option>
                                                <option <?php if ($jk=='Perempuan'){ echo 'selected'; }?>value="Perempuan">Perempuan</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Tempat Lahir</label>
                                                <input type="text" required class="form-control" name="tempat_lahir" placeholder="Contoh: Jakarta" value="<?=$tempat_lahir?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Lahir</label>
                                                <input type="text" required class="form-control" name="tgl_lahir" value="<?=$tgl_lahir?>" id="mdate">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>No Handphone</label>
                                                <input type="text" required class="form-control" name="nohp" placeholder="Contoh: 081XXXXXXXXX" value="<?=$nohp?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" required class="form-control" name="alamat" placeholder="Contoh: Jl. Bunga No. 14, Jakarta Pusat" value="<?=$alamat?>">
                                        </div>
                                </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                    <button onclick="window.history.back()" class="btn btn-danger">Kembali</button>
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